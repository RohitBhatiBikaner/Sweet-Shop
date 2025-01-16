<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\media;
use App\Models\price;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
    }
    // public function listing()
    // {
    //     //

    //     return view("product.listing");
        
    // }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
        return view("product.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->name=trim($request->name);
        $request->validate([
            'name'=>'min:3|max:40|required', 
           'main_image'=>'image|required', //for validate image and name
           'other_image.*'=>'nullable|mimetypes:video/mp4,video/avi,video/mpeg,image/jpeg,image/png',
        ]);
       $fileimage=time()."_main_".$request->main_image->getClientOriginalName();//for save image
       $request->main_image->move("./images",$fileimage);//for move image in public folder
        $productinfo=[
            'name'=>$request->name,
            'flavour'=>$request->flavour,
            'description'=>$request->description,
            'main_image'=>$fileimage  //store info in a array
        ];
        
    //    $product_id=product::create($productinfo); 
        $productobject= product::create($productinfo);
        $n= count($request->price['madewith']);
        for($i=0;$i<$n;$i++){
            $priceinfo=[
                'product_id'=> $productobject->id,
                'madewith'=>$request->price['madewith'][$i],
                'weight'=>$request->price['weight'][$i],
                'weight_type'=>$request->price['weight_type'][$i],
                'price'=>$request->price['price'][$i],
            ];
            Price::create($priceinfo);
        }
    //     $n=count($request->other_image);
    //     for($i=1;$i<$n;$i++){
    //     $fileimage=time()."_other_".($request->other_image->getClientOriginalName());//for save image
    //     $tpy=$request->other_image[$i]->getClientMimeType();
    //     $request->other_image[$i]->move("./images",$fileimage);//for move image in public folder
    //     $ofile=[
    //         'product_id'=>$productobject->id,
    //         'filepath'=>$fileimage,
    //         'file_type'=>substr($tpy,0,strpos($tpy,'/'))
    //     ];
    //     media::create($ofile);
    // }
    // }
    $n = count($request->other_image);
for ($i = 0; $i < $n; $i++) {
    // Get the file object
    $file = $request->other_image[$i];

    // Ensure $file is an instance of UploadedFile
    if ($file && $file instanceof \Illuminate\Http\UploadedFile) {
        $fileimage = time() . "_other_" . $file->getClientOriginalName(); // Generate file name
        $tpy = $file->getClientMimeType(); // Get file MIME type

        // Move the file to the 'images' directory
        $file->move("./images", $fileimage);

        // Prepare data for the Media model
        $ofile = [
            'product_id' => $productobject->id,
            'file_path' => $fileimage,
            'file_type' => substr($tpy, 0, strpos($tpy, '/')),
        ];

        // Save to the Media model
        media::create($ofile);
    }}
}

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
        // dd($product['media']);
        return view ("product.show",['info'=>$product]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        //
    }
    public function listt(){
        $data=product::with(['price','media'])->get();
        // $info=product::with(['price','media'])->find(10); 2nd method fetch data
        // dd($info);
        return view("product.listing",compact('data'));
    }
    // public function cart(){
    // }

public function submitOrder(Request $request)
{
    dd($request);
    $orders = $request->input('order');
    // Process the orders (store in database, send email, etc.)
    return redirect()->back()->with('success', 'Order submitted successfully!');
}
}

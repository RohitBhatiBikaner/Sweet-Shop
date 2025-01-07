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
        //
        $request->validate([
            'name'=>'min:3|max:40' 
        ]);
        $productinfo=[
            'name'=>$request->name,
            'flavour'=>$request->flavour,
            'description'=>$request->description,
            'main_image'=>""
        ];
       $product_id=product::create($productinfo);
        // dd($product_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
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
}

@extends('layouts.app')
@section('content')
<div class="container border">
    <div class="alert text-primary h2 text-center text-decoration-underline">
        Product Form
    </div>
<div class="mb-3">
    <label for="name">Product Name:</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Product Name" value="Soan Papdi">
</div>
<div class="mb-3">
    <label for="flavour">Product Flavour :</label>
    <input type="text" class="form-control" name="name" id="flavour" placeholder="Enter Flavour" list="sug" >
    <datalist id="sug" > 
        <option value="Almond & Pistachio">
        <option value="Chocolate">
        <option value="Coconut">
        <option value="Elaichi">
        <option value="Orange">
        <option value="Rose">
    </datalist>
</div>
<div id="main">
<div class="row mb-3" id="child_1">
    <div class="col-6">
        <label for="weight">Weight</label>
        <div class="input-group mb-3">
            <input type="number" class="form-control" name="weight[]" placeholder="Weight">
            <select name="weight_type[]" id="button-addon2">
                <option>Gm</option>
                <option>Kg</option>
            </select>
        </div>
    </div>
    <div class="col-6">
        <label for="price">Price</label>
        <div class="input-group mb-3">
        <input type="number" name="price[]" placeholder="Price" class="form-control">
        <span class="input-group-text">₹</span>
    </div>
    </div>

</div>
    
</div>
<div>
    <input type="hidden" id="tot" value="1">
    <button class="btn btn-success" type="button" onclick="cClone()">PUSH</button>
    <button class="btn btn-danger" type="button" onclick="rClone()">POP</button>
    
</div>
<div class="mb-3">
    <label for="main_image" class="form-label">Image :</label>
    <input type="file" class="form-control" id="maine_image" name="main_image" accept="image/*" >
</div>
<div class="mb-3">
    <label for="other_image" class="form-label"> other Images / video :</label>
    <input type="file" class="form-control" id="other" multiple name="other_image[]" accept="image/*,video/-" >
</div>
<div class="mb-3">
    <label for="description" class="form-label">Product Description :</label>
    <textarea name="description" placeholder="Product Description" id="description" cols="30" rows="10"></textarea>
</div>
</div>
<script>
    function cClone(){
        tot.value=parseInt(tot.value)+1;
      let obj=child_1.cloneNode(true);
        obj.id="child_"+tot.value;
        main.appendChild(obj);
    }
    function rClone(){
        if(Number(tot.value)>1){
            let obj=document.getElementById('child_'+tot.value);
         main.removeChild(obj);
         tot.value=parseInt(tot.value)-1; 
        
        }else{
            alert("You can`t Delete it");
        }
    }
</script>
@endsection
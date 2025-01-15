@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Display</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-image {
            position: relative;
            width: 100%;
            height: auto;
            overflow: hidden;
            cursor: zoom-in;
        }
        .product-image img {
            width: 100%;
            transition: transform 0.3s ease;
        }
        .product-image.zoomed img {
            transform: scale(2);
            cursor: zoom-out;
        }
        .thumbnail {
            max-width: 80px;
            margin-right: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="product-image" id="mainImageContainer">
                <img id="mainImage" src="/images/{{$info['main_image']}}" alt="Main Product Image">
            </div>
        
            <div class="d-flex mt-3">
                @foreach ($info['media'] as $image)
                    <img 
                        src="/images/{{$image['file_path']}}" 
                        alt="Thumbnail Image" 
                        class="thumbnail" 
                        onclick="changeImage('/images/{{$image->file_path}}')">
                @endforeach
            </div>
        </div>
        <div class="col-md-6">
            <h2>{{$info['name']}}</h2>
            @foreach ($info['price'] as $price)
                <p class="text-muted">Weight: {{$price['weight']}}</p>
            @endforeach
            <p>{{$info['Description']}}</p>
            <button class="btn btn-primary btn-lg">Add to Cart</button>
        </div>
    </div>
</div>

<script>
    const mainImageContainer = document.getElementById('mainImageContainer');
    const mainImage = document.getElementById('mainImage');

    mainImageContainer.addEventListener('click', () => {
        mainImageContainer.classList.toggle('zoomed');
    });

    function changeImage(src) {
        mainImage.src = src;
        mainImageContainer.classList.remove('zoomed');
    }
</script>
</body>
</html>
@endsection

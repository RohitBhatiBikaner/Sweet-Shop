@extends('layouts.app')
@section('content')
    <style>
        body {
            background-color: #f8f9fa;
        }
        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .product-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
        .product-card img {
            width: 100%; /* Ensures the image spans the card width */
    height: 200px; /* Fixed height for uniformity */
    object-fit:contain; /* Ensures the image covers the area without distortion */
    object-position: center; /* Centers the image within the defined dimensions */
    border-radius: 5px; /* Optional: adds rounded corners to the image */

        }
        .product-price {
            font-weight: bold;
            color: #28a745;
        }
        .btn-custom {
            background-color: #007bff;
            color: #fff;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            color: #fff;
        }
        .small{
            font-size: 0.85em;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h1 class="text-center mb-4">Our Products</h1>
        <div class="row g-4">
            <!-- Product Card -->
            @foreach ($data as $info  )
                
            
            <div class="col-md-4 col-sm-6">
                <div class="card product-card">
                    <img src="/images/{{$info['main_image']}}" class="img-fluid" alt="Product 1">
                    <div class="card-body text-center">
                        <h5 class="card-title text-primary">{{$info['name']}}(<b class="small text-success" >{{$info['flavour']}}</b>)</h5>
                        <p class="product-price"></p>
                        <p class="card-text text-success">{{$info['Description']}}</p>
                        <a href="/product/{{$info['id']}}" class="btn btn-warning">View Details</a>
                    </div>
                </div>
            </div>
            
            @endforeach
        </div>
    </div>

  @endsection 
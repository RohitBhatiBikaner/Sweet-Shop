@extends('layouts.base')

@section('content')
    <!-- Hero Section with Image Slider -->
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="https://via.placeholder.com/1920x400/FFCC00/FFFFFF?text=Welcome+to+Sweet+Shop" class="d-block w-100" alt="Sweet Shop Image 1">
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="https://via.placeholder.com/1920x400/FF9999/FFFFFF?text=Delicious+Chocolate+Cake" class="d-block w-100" alt="Sweet Shop Image 2">
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="https://via.placeholder.com/1920x400/FF6666/FFFFFF?text=Freshly+Baked+Cupcakes" class="d-block w-100" alt="Sweet Shop Image 3">
            </div>
        </div>
        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container mt-5">
        <h1 class="display-4 text-primary">Welcome to Sweet Shop</h1>
        <p class="lead">The best place for your favorite sweets and treats!</p>
        <a href="#" class="btn btn-danger btn-lg">Shop Now</a>
    </div>

    <hr class="my-5">

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="https://via.placeholder.com/350x250?text=Sweet+Item" class="card-img-top" alt="Sweet Item">
                <div class="card-body">
                    <h5 class="card-title">Chocolate Cake</h5>
                    <p class="card-text">Rich and creamy chocolate cake topped with chocolate frosting.</p>
                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="https://via.placeholder.com/350x250?text=Sweet+Item" class="card-img-top" alt="Sweet Item">
                <div class="card-body">
                    <h5 class="card-title">Cupcakes</h5>
                    <p class="card-text">Delicious and soft cupcakes with vanilla icing and sprinkles.</p>
                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="https://via.placeholder.com/350x250?text=Sweet+Item" class="card-img-top" alt="Sweet Item">
                <div class="card-body">
                    <h5 class="card-title">Lollipops</h5>
                    <p class="card-text">Bright and colorful lollipops for every sweet tooth!</p>
                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>
        </div>
    </div>
@endsection

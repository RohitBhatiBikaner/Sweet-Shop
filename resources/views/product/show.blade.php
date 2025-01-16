@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Product Display</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-image {
            position: relative;
            width: 100%;
            max-height: 500px;
            overflow: hidden;
            cursor: zoom-in;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
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

        .price-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin: 10px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .price-card:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            transform: translateY(-2px);
            transition: all 0.3s ease;
        }

        .price-title {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .madewith-vegetable {
            color: green;
        }

        .madewith-desi {
            color: orange;
        }

        .quantity-input {
            max-width: 100px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <!-- Product Name and Flavour -->
        <div class="row mb-4">
            <div class="col-md-12 text-center">
                <h1 class="product-title">{{ $info['name'] }}</h1>
                <h4><b>Flavour:</b> {{ $info['flavour'] }}</h4>
            </div>
        </div>

        <form method="POST" action="{{ route('submitOrder') }}">
            @csrf <!-- Laravel CSRF token -->
            <div class="row">
                <!-- Product Image Section -->
                <div class="col-md-6">
                    <div class="product-image" id="mainImageContainer">
                        <img id="mainImage" src="/images/{{ $info['main_image'] }}" alt="Main Product Image">
                    </div>

                    <div class="d-flex md-6 mt-3">
                        @foreach ($info['media'] as $image)
                            @if (!empty($image['file_path']) && $image['file_type'] == 'image')
                                <img src="/images/{{ $image['file_path'] }}" alt="Thumbnail Image" class="thumbnail"
                                    onclick="changeImage('/images/{{ $image['file_path'] }}')">
                            @endif
                            @if (!empty($image['file_path']) && $image['file_type'] == 'video')
                                <video class="thumbnail" onclick="changeVideo('{{ $image['file_path'] }}')" muted>
                                    <source src="/images/{{ $image['file_path'] }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Left Section: Vegetable Oil -->
                <div class="col-md-3">
                    <h3 class="text-success">Vegetable Oil</h3>
                    @foreach ($info['price'] as $price)
                        @if (strtolower($price['madewith']) === 'vegetable oil')
                            <div class="price-card">
                                <p class="price-title madewith-vegetable">{{ $price['madewith'] }}</p>
                                <p><b>Weight:</b> {{ $price['weight'] }} {{ $price['weight_type'] }}</p>
                                <p><b>Price:</b> ₹{{ $price['price'] }}</p>
                                <p>{{ $price['Description'] }}</p>
                                <!-- Quantity Input -->
                                <div class="form-group">
                                    <label for="quantity-vegetable-{{ $loop->index }}">Quantity:</label>
                                    <input type="number" id="quantity-vegetable-{{ $loop->index }}"
                                        name="order[vegetable][{{ $loop->index }}][quantity]"
                                        class="form-control quantity-input" min="1" placeholder="Enter Qty">
                                    <input type="hidden" name="order[vegetable][{{ $loop->index }}][weight]"
                                        value="{{ $price['weight'] }}">
                                    <input type="hidden" name="order[vegetable][{{ $loop->index }}][price]"
                                        value="{{ $price['price'] }}">
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Right Section: Desi Ghee -->
                <div class="col-md-3">
                    <h3 class="text-warning">Desi Ghee</h3>
                    @foreach ($info['price'] as $price)
                        @if (strtolower($price['madewith']) === 'desi ghee')
                            <div class="price-card">
                                <p class="price-title madewith-desi">{{ $price['madewith'] }}</p>
                                <p><b>Weight:</b> {{ $price['weight'] }} {{ $price['weight_type'] }}</p>
                                <p><b>Price:</b> ₹{{ $price['price'] }}</p>
                                <p>{{ $price['Description'] }}</p>
                                <!-- Quantity Input -->
                                <div class="form-group">
                                    <label for="quantity-desi-{{ $loop->index }}">Quantity:</label>
                                    <input type="number" id="quantity-desi-{{ $loop->index }}"
                                        name="order[desi][{{ $loop->index }}][quantity]"
                                        class="form-control quantity-input" min="1" placeholder="Enter Qty">
                                    <input type="hidden" name="order[desi][{{ $loop->index }}][weight]"
                                        value="{{ $price['weight'] }}">
                                    <input type="hidden" name="order[desi][{{ $loop->index }}][price]"
                                        value="{{ $price['price'] }}">
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Submit Button -->
            <div class="row mt-4">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit Order</button>
                </div>
            </div>
        </form>
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

        function changeVideo(videoSrc) {
            const mainImageContainer = document.getElementById('mainImageContainer');

            mainImageContainer.innerHTML = '';

            const videoElement = document.createElement('video');
            videoElement.src = `/images/${videoSrc}`;
            videoElement.controls = true;
            videoElement.autoplay = true;
            videoElement.muted = true;
            videoElement.style.width = '100%';
            videoElement.style.height = '100%';

            videoElement.addEventListener('ended', () => {
                showMainImage();
            });

            mainImageContainer.appendChild(videoElement);
        }
    </script>
</body>

</html>
@endsection

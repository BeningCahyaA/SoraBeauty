<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Sora Beauty - E-Commerce Kecantikan' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
    {{ $style ?? '' }}
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f9f9f9;
        }

        .category-card, .product-card {
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
            border-radius: 10px;
            overflow: hidden;
        }

        .category-card:hover, .product-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(255, 133, 162, 0.3);
            border: 1px solid rgba(255, 182, 193, 0.5);
        }

        .category-img, .product-img {
            height: 150px;
            object-fit: cover;
        }

        .card-body {
            padding: 1rem;
        }

        .card-title {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            color: #5e2042; /* Dark pink for better contrast */
        }

        .card-text {
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            color: #666;
        }

        .btn-sm {
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
        }

        .rating {
            color: #ffc107;
            font-size: 0.9rem;
        }

        .footer {
            background: linear-gradient(135deg, #ff85a2 0%, #ffb6c1 100%);
            color: white;
        }

        .footer a {
            color: white;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 576px) {
            .cart-img {
                width: 60px;
                height: 60px;
            }

            .cart-item-name {
                font-size: 0.9rem;
            }

            .cart-item-price,
            .cart-item-subtotal {
                font-size: 0.8rem;
            }

            .quantity-input {
                width: 50px;
            }
        }
    </style>
</head>

<body>
    <x-navbar></x-navbar>
    <div class="container-fluid py-4">
        {{ $slot }}
    </div>
    <footer class="footer pt-4 mt-5">
        <div class="container p-3">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <h5 class="mb-3">E-Commerce Kecantikan</h5>
                    <p class="small">Belanja mudah, cepat, dan aman di toko online kami. Temukan produk favorit Anda dengan harga terbaik.</p>
                </div>
                <div class="col-md-3 mb-3">
                    <h6 class="mb-3">Navigasi</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Beranda</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Produk</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Kategori</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-3">
                    <h6 class="mb-3">Kontak Kami</h6>
                    <ul class="list-unstyled small">
                        <li><i class="bi bi-envelope"></i> info@ecommerce.com</li>
                        <li><i class="bi bi-telephone"></i> +62 856 6100 994</li>
                        <li><i class="bi bi-geo-alt"></i> Tegal, Indonesia</li>
                    </ul>
                </div>
            </div>
            <hr style="background-color: rgba(255,255,255,0.2);">
            <div class="text-center pb-3">
                <small>(c) {{ date('Y') }} E-Commerce. All rights reserved.</small>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>

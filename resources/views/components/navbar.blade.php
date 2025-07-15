<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sora Beauty - Produk Kecantikan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #ff85a2;
            --secondary-color: #f7d6e0;
            --accent-color: #ffb6c1;
            --dark-color: #5e2042;
            --light-color: #fff9fb;
        }

        body {
            font-family: 'Montserrat', sans-serif;
        }

        .beauty-navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%) !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 10px 0;
        }

        .brand-logo {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 28px;
            color: white;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
        }

        .brand-logo i {
            margin-right: 10px;
            font-size: 24px;
        }

        .nav-link {
            font-weight: 500;
            color: white !important;
            margin: 0 8px;
            padding: 8px 15px !important;
            border-radius: 20px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .nav-link.active {
            background-color: rgba(255, 255, 255, 0.3);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 5px;
            left: 50%;
            transform: translateX(-50%);
            background-color: white;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 60%;
        }

        .btn-beauty {
            border-radius: 20px;
            padding: 8px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-login {
            background-color: transparent;
            border: 2px solid white;
            color: white;
        }

        .btn-login:hover {
            background-color: white;
            color: var(--primary-color);
        }

        .btn-register {
            background-color: white;
            color: var(--primary-color);
            border: 2px solid white;
        }

        .btn-beauty i {
            margin-right: 5px;
        }

        .btn-register:hover {
            background-color: transparent;
            color: white;
        }

        .cart-icon:hover {
            transform: scale(1.1);
            transition: transform 0.2s ease;
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: #5e2042;
        }

        .dropdown-menu {
            border-radius: 10px;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-top: 10px !important;
        }

        .dropdown-item {
            padding: 8px 20px;
            transition: all 0.2s ease;
        }

        .dropdown-item:hover {
            background-color: var(--secondary-color);
            color: var(--dark-color);
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 8px;
            border: 2px solid white;
        }

        @media (max-width: 992px) {
            .navbar-collapse {
                padding: 20px 0;
                background-color: var(--primary-color);
                border-radius: 10px;
                margin-top: 10px;
            }

            .nav-link {
                margin: 5px 0;
            }

            .btn-group {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }

            .btn-beauty {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg beauty-navbar">
        <div class="container">
            <a class="navbar-brand brand-logo" href="/">
                <i class="fas fa-heart"></i>Sora Beauty
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-expanded="false">
                <span class="navbar-toggler-icon" style="color: white;">
                    <i class="fas fa-bars"></i>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/categories">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/products">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/treatments">Perawatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tips">Tips Kecantikan</a>
                    </li>
                </ul>

                <!-- <div class="cart-icon me-3">
                    <i class="fas fa-shopping-bag fa-lg" style="color: white;"></i>
                    <span class="cart-count">0</span>
                </div>
                ======= -->
                <a href="{{ route('cart.index') }}" class="cart-icon me-3 text-decoration-none">
                    <i class="fas fa-shopping-bag fa-lg" style="color: white;"></i>
                    <span class="cart-count">{{ auth()->guard('customer')->check() ? count(session('cart') ?? []) : 0 }}</span>
                </a>

                @if(auth()->guard('customer')->check())
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/20efa19e-4344-4883-aca1-79145f85900a.png" alt="Foto profil user" class="user-avatar">
                        <span>{{ Auth::guard('customer')->user()->name }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profil Saya</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-heart me-2"></i>Favorite</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-history me-2"></i>Riwayat Order</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('customer.logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
                @else
                <a class="btn btn-outline-light btn-beauty btn-login me-2" href="{{ route('customer.login') }}">
                    <i class="fas fa-sign-in-alt me-1"></i> Login
                </a>
                <a class="btn btn-light btn-beauty btn-register" href="{{ route('customer.register') }}">
                    <i class="fas fa-user-plus me-1"></i> Register
                </a>
                @endif
            </div>
        </div>
        </div>
    </nav>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animasi untuk navbar link
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });

            link.addEventListener('mouseleave', function() {
                this.style.transform = '';
            });
        });

        // Smooth scroll untuk semua link
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Update cart count (simulasi)
        setInterval(function() {
            document.querySelector('.cart-count').style.transform = 'scale(1.1)';
            setTimeout(function() {
                document.querySelector('.cart-count').style.transform = '';
            }, 300);
        }, 5000);
    </script>
</body>

</html>
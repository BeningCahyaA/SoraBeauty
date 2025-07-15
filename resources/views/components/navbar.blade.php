<!-- Modern Beauty Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <!-- Brand Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <div class="brand-logo-container me-2">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="20" cy="20" r="18" fill="url(#gradient1)" />
                    <path d="M12 20C12 15.6 15.6 12 20 12C24.4 12 28 15.6 28 20C28 24.4 24.4 28 20 28C15.6 28 12 24.4 12 20Z" fill="white" fill-opacity="0.8" />
                    <defs>
                        <linearGradient id="gradient1" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#ff6b6b" />
                            <stop offset="100%" style="stop-color:#4ecdc4" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <span class="brand-text">Sora Beauty</span>
        </a>

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler border-0 custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link nav-link-modern {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-modern {{ request()->is('products*') ? 'active' : '' }}" href="{{ url('/products') }}">
                        Products
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-modern {{ request()->is('categories*') ? 'active' : '' }}" href="{{ url('/categories') }}">
                        Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-modern {{ request()->is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">
                        Contact
                    </a>
                </li>
            </ul>

            <!-- Right Side Navigation -->
            <ul class="navbar-nav ms-auto align-items-center">
                <!-- Search -->
                <li class="nav-item me-3">
                    <div class="search-container">
                        <form class="d-flex" action="{{ route('search') }}" method="GET">
                            <div class="input-group search-input-group">
                                <input type="text" class="form-control search-input" placeholder="Search products..." name="q" value="{{ request('q') }}">
                                <button class="btn btn-search" type="submit">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <path d="m21 21-4.35-4.35"></path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Cart -->
                <li class="nav-item me-3">
                    <a href="{{ route('cart.index') }}" class="nav-link position-relative cart-link">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        <span class="cart-badge">3</span>
                    </a>
                </li>

                <!-- Authentication Links -->
                @guest
                <li class="nav-item me-2">
                    <a class="btn btn-outline-primary btn-auth" href="{{ route('customer.login') }}">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-1">
                            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                            <polyline points="10,17 15,12 10,7"></polyline>
                            <line x1="15" y1="12" x2="3" y2="12"></line>
                        </svg>
                        Login
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary btn-auth" href="{{ route('customer.register') }}">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-1">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        Register
                    </a>
                </li>
                @else
                <!-- User Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle user-dropdown" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                        <div class="user-avatar">
                            <img src="{{ Auth::user()->avatar ?? 'https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/2091e695636919.5eb96c04456ac.jpg=' . strtoupper(substr(Auth::user()->name, 0, 1)) }}"
                                alt="{{ Auth::user()->name }}" class="rounded-circle">
                        </div>
                        <span class="user-name">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end user-dropdown-menu">
                        <li>
                            <h6 class="dropdown-header">{{ Auth::user()->name }}</h6>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-2">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16,17 21,12 16,7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<style>
    /* Navbar Styles */
    .navbar {
        backdrop-filter: blur(10px);
        background-color: rgba(255, 255, 255, 0.95) !important;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        padding: 0.8rem 0;
    }

    .brand-text {
        font-size: 1.5rem;
        font-weight: 700;
        background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .nav-link-modern {
        font-weight: 500;
        color: #333 !important;
        padding: 0.5rem 1rem !important;
        border-radius: 25px;
        transition: all 0.3s ease;
        position: relative;
    }

    .nav-link-modern:hover {
        background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
        color: white !important;
        transform: translateY(-2px);
    }

    .nav-link-modern.active {
        background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
        color: white !important;
    }

    /* Search Styles */
    .search-container {
        position: relative;
    }

    .search-input-group {
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .search-input {
        border: none;
        padding: 0.5rem 1rem;
        background: #f8f9fa;
        border-radius: 25px 0 0 25px;
        width: 250px;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        box-shadow: none;
        background: white;
        outline: none;
    }

    .btn-search {
        background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
        border: none;
        padding: 0.5rem 1rem;
        color: white;
        border-radius: 0 25px 25px 0;
        transition: all 0.3s ease;
    }

    .btn-search:hover {
        background: linear-gradient(135deg, #ff5252, #26a69a);
        color: white;
    }

    /* Cart Styles */
    .cart-link {
        position: relative;
        padding: 0.5rem !important;
        border-radius: 50%;
        background: #f8f9fa;
        color: #333 !important;
        transition: all 0.3s ease;
    }

    .cart-link:hover {
        background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
        color: white !important;
        transform: translateY(-2px);
    }

    .cart-badge {
        position: absolute;
        top: -5px;
        right: -5px;
        background: #ff6b6b;
        color: white;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.75rem;
        font-weight: bold;
    }

    /* Auth Buttons */
    .btn-auth {
        border-radius: 25px;
        padding: 0.5rem 1.5rem;
        font-weight: 500;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        border: 2px solid transparent;
    }

    .btn-outline-primary.btn-auth {
        border-color: #ff6b6b;
        color: #ff6b6b;
    }

    .btn-outline-primary.btn-auth:hover {
        background: #ff6b6b;
        color: white;
        transform: translateY(-2px);
    }

    .btn-primary.btn-auth {
        background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
        border: none;
    }

    .btn-primary.btn-auth:hover {
        background: linear-gradient(135deg, #ff5252, #26a69a);
        transform: translateY(-2px);
    }

    /* User Dropdown */
    .user-dropdown {
        display: flex;
        align-items: center;
        padding: 0.5rem 1rem !important;
        border-radius: 25px;
        background: #f8f9fa;
        color: #333 !important;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .user-dropdown:hover {
        background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
        color: white !important;
    }

    .user-avatar {
        width: 35px;
        height: 35px;
        margin-right: 0.5rem;
        border-radius: 50%;
        overflow: hidden;
        border: 2px solid white;
    }

    .user-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .user-name {
        font-weight: 500;
        font-size: 0.9rem;
    }

    .user-dropdown-menu {
        border: none;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border-radius: 15px;
        padding: 0.5rem 0;
        min-width: 200px;
    }

    .user-dropdown-menu .dropdown-item {
        padding: 0.7rem 1.5rem;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
    }

    .user-dropdown-menu .dropdown-item:hover {
        background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
        color: white;
    }

    .user-dropdown-menu .dropdown-item.text-danger:hover {
        background: #dc3545;
        color: white;
    }

    /* Mobile Responsiveness */
    @media (max-width: 991px) {
        .search-input {
            width: 200px;
        }

        .navbar-nav {
            padding: 1rem 0;
        }

        .nav-item {
            margin: 0.2rem 0;
        }

        .btn-auth {
            width: 100%;
            justify-content: center;
            margin: 0.2rem 0;
        }
    }

    @media (max-width: 768px) {
        .search-input {
            width: 150px;
        }

        .user-name {
            display: none;
        }

        .brand-text {
            font-size: 1.2rem;
        }
    }

    /* Custom Toggler */
    .custom-toggler {
        border: none;
        padding: 0.5rem;
        border-radius: 8px;
        background: #f8f9fa;
    }

    .custom-toggler:focus {
        box-shadow: none;
    }

    /* Smooth Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .navbar-collapse {
        animation: fadeIn 0.3s ease;
    }

    /* Notification Badge Animation */
    .cart-badge {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }

        100% {
            transform: scale(1);
        }
    }
</style>
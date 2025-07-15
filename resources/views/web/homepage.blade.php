<x-layout>
    <x-slot name="title">Homepage</x-slot>
    
    <!-- Hero Section -->
    <section class="hero-section position-relative overflow-hidden">
        <div class="hero-bg"></div>
        <div class="container py-5">
            <div class="row align-items-center min-vh-75">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="hero-title display-4 fw-bold mb-4">
                            Get Glow With<br>
                            <span class="text-gradient">Sora Beauty</span>
                        </h1>
                        
                        <!-- Product Showcase -->
                        <div class="product-showcase d-flex align-items-center mb-4">
                            <div class="product-image-container me-4">
                                <img src="https://bedakhalal.org/wp-content/uploads/2024/10/review-skincare-terbaik-di-indonesia.jpg" 
                                     alt="Beauty Product" class="product-image">
                            </div>
                            <div class="product-info">
                                <div class="rating mb-2">
                                    <span class="stars">★★★★★</span>
                                    <span class="rating-text ms-2">52 Reviews</span>
                                </div>
                                <div class="price mb-3">
                                    <span class="current-price">$49.99</span>
                                </div>
                                <div class="quantity-controls d-flex align-items-center mb-3">
                                    <button class="btn btn-outline-secondary btn-sm me-2">-</button>
                                    <span class="quantity mx-2">1</span>
                                    <button class="btn btn-outline-secondary btn-sm me-3">+</button>
                                    <button class="btn btn-warning btn-cart">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Features -->
                        <div class="features-list">
                            <div class="feature-item">
                                <div class="feature-icon">🚚</div>
                                <div class="feature-text">
                                    <strong>Free 2 Day</strong><br>
                                    <small>Shipping</small>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">💰</div>
                                <div class="feature-text">
                                    <strong>Money Back</strong><br>
                                    <small>Guarantee</small>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">🔄</div>
                                <div class="feature-text">
                                    <strong>Free Returns</strong><br>
                                    <small>in 30 Day</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="hero-image-container text-center">
                        <div class="floating-elements">
                            <div class="floating-circle circle-1"></div>
                            <div class="floating-circle circle-2"></div>
                            <div class="floating-circle circle-3"></div>
                        </div>
                        <img src="https://koreanbeautypoint.com/wp-content/uploads/2023/10/71Eu8gbtOBL._SL1500_.jpg" 
                             alt="Beautiful Woman" class="hero-image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories-section py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="section-title">Kategori Product</h3>
                <a href="{{ URL::to('/categories') }}" class="btn btn-outline-primary btn-sm">
                    Lihat Semua Kategori
                </a>
            </div>
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3">
                @foreach($categories as $category)
                <div class="col">
                    <a href="{{ URL::to('/category/'.$category->slug) }}" class="card text-decoration-none category-card-modern">
                        <div class="card h-100 border-0 shadow-sm category-hover">
                            <div class="card-body text-center py-4">
                                <div class="category-icon-container mx-auto mb-3">
                                    <img src="{{ $category->image }}" alt="{{ $category->name }}" class="category-icon">
                                </div>
                                <h6 class="card-title mb-2 text-dark">{{ $category->name }}</h6>
                                <p class="card-text text-muted small">{{ $category->description }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="products-section py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h3 class="section-title">Before Buy This Well</h3>
                <p class="text-muted">Discover our premium beauty products</p>
            </div>
            <div class="row">
                @forelse($products as $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="product-card-modern h-100">
                        <div class="product-image-wrapper">
                            <img src="{{ $product->image_url ? $product->image_url : 'https://via.placeholder.com/300x300?text=Product' }}" 
                                 class="product-image" alt="{{ $product->name }}">
                        </div>
                        <div class="product-info-card">
                            <div class="rating mb-2">
                                <span class="stars">★★★★★</span>
                                <span class="rating-text ms-2">45 Reviews</span>
                            </div>
                            <div class="price mb-3">
                                <span class="current-price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            </div>
                            <h5 class="product-title mb-3">{{ $product->name }}</h5>
                            <div class="product-actions">
                                <a href="{{ route('product.show', $product->slug) }}" 
                                   class="btn btn-primary btn-modern">Lihat Detail</a>
                                <button class="btn btn-outline-secondary btn-cart-icon">🛒</button>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <h5>Belum ada produk tersedia</h5>
                        <p class="mb-0">Produk akan segera hadir. Tetap pantau untuk update terbaru!</p>
                    </div>
                </div>
                @endforelse
            </div>
            
            @if($products->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $products->links('vendor.pagination.bootstrap-5') }}
            </div>
            @endif
        </div>
    </section>

    <style>
        /* Hero Section Styles */
        .hero-section {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 50%, #fecfef 100%);
            opacity: 0.1;
            z-index: -1;
        }

        .hero-title {
            color: #333;
            line-height: 1.2;
        }

        .text-gradient {
            background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .product-showcase {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            padding: 2rem;
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .product-image-container {
            position: relative;
        }

        .product-image {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .stars {
            color: #ffc107;
            font-size: 1.1rem;
        }

        .rating-text {
            color: #666;
            font-size: 0.9rem;
        }

        .current-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ff6b6b;
        }

        .btn-cart {
            background: #ffc107;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-cart:hover {
            background: #ffb300;
            transform: translateY(-2px);
        }

        .features-list {
            display: flex;
            gap: 2rem;
            margin-top: 2rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .feature-icon {
            font-size: 1.5rem;
            background: rgba(255, 255, 255, 0.8);
            padding: 0.5rem;
            border-radius: 50%;
        }

        .feature-text {
            font-size: 0.9rem;
            color: #666;
        }

        /* Hero Image Styles */
        .hero-image-container {
            position: relative;
        }

        .hero-image {
            width: 100%;
            max-width: 400px;
            height: auto;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
        }

        .floating-circle {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(45deg, #ff9a9e, #fecfef);
            opacity: 0.3;
            animation: float 6s ease-in-out infinite;
        }

        .circle-1 {
            width: 60px;
            height: 60px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .circle-2 {
            width: 80px;
            height: 80px;
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }

        .circle-3 {
            width: 40px;
            height: 40px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Trusted Brands */
        .trusted-brands {
            background: #f8f9fa;
        }

        .brand-logo {
            font-weight: 600;
            color: #666;
            font-size: 1.1rem;
            text-align: center;
            padding: 1rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        /* Categories */
        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 1rem;
        }

        .category-card-modern {
            transition: all 0.3s ease;
        }

        .category-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
        }

        .category-icon-container {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #ff9a9e, #fecfef);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .category-icon {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }

        /* Products */
        .product-card-modern {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .product-card-modern:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .product-image-wrapper {
            position: relative;
            height: 250px;
            overflow: hidden;
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-card-modern:hover .product-image {
            transform: scale(1.05);
        }

        .product-info-card {
            padding: 1.5rem;
        }

        .product-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 1rem;
        }

        .product-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .btn-modern {
            border-radius: 25px;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
            border: none;
            transition: all 0.3s ease;
        }

        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-cart-icon {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .features-list {
                flex-direction: column;
                gap: 1rem;
            }
            
            .product-showcase {
                padding: 1rem;
            }
            
            .brands-carousel {
                flex-direction: column;
                gap: 1rem;
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-content > * {
            animation: fadeInUp 0.8s ease-out;
        }

        .hero-content > *:nth-child(1) { animation-delay: 0.1s; }
        .hero-content > *:nth-child(2) { animation-delay: 0.2s; }
        .hero-content > *:nth-child(3) { animation-delay: 0.3s; }
    </style>
</x-layout>
<x-layout>
    <x-slot name="title">Products</x-slot>

    <!-- Hero Section -->
    <section class="products-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="hero-title">Discover Our <span class="text-gradient">Beauty Collection</span></h1>
                    <p class="hero-subtitle">Premium skincare and beauty products crafted for your perfect glow</p>
                </div>
                <div class="col-lg-6">
                    <div class="hero-search-container">
                        <form action="{{ url()->current() }}" method="GET" class="modern-search-form">
                            <div class="search-input-wrapper">
                                <input type="text" name="search" class="form-control modern-search-input" 
                                       placeholder="Search for beauty products..." value="{{ request('search') }}">
                                <button type="submit" class="btn btn-search-modern">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <path d="m21 21-4.35-4.35"></path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Filters Section -->
    <section class="filters-section">
        <div class="container">
            <div class="filters-container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2 class="products-title">Our Products</h2>
                        <p class="products-subtitle">{{ $products->total() }} products found</p>
                    </div>
                    <div class="col-md-6">
                        <div class="filter-controls">
                            <div class="dropdown">
                                <button class="btn btn-filter dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-2">
                                        <polygon points="22,3 2,3 10,12.46 10,19 14,21 14,12.46"></polygon>
                                    </svg>
                                    Filter & Sort
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Price: Low to High</a></li>
                                    <li><a class="dropdown-item" href="#">Price: High to Low</a></li>
                                    <li><a class="dropdown-item" href="#">Newest First</a></li>
                                    <li><a class="dropdown-item" href="#">Most Popular</a></li>
                                </ul>
                            </div>
                            <div class="view-toggle">
                                <button class="btn btn-view-toggle active" data-view="grid">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <rect x="3" y="3" width="7" height="7"></rect>
                                        <rect x="14" y="3" width="7" height="7"></rect>
                                        <rect x="14" y="14" width="7" height="7"></rect>
                                        <rect x="3" y="14" width="7" height="7"></rect>
                                    </svg>
                                </button>
                                <button class="btn btn-view-toggle" data-view="list">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <line x1="8" y1="6" x2="21" y2="6"></line>
                                        <line x1="8" y1="12" x2="21" y2="12"></line>
                                        <line x1="8" y1="18" x2="21" y2="18"></line>
                                        <line x1="3" y1="6" x2="3.01" y2="6"></line>
                                        <line x1="3" y1="12" x2="3.01" y2="12"></line>
                                        <line x1="3" y1="18" x2="3.01" y2="18"></line>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Alert -->
    @if(session('success'))
    <div class="container">
        <div class="alert alert-success alert-dismissible fade show modern-alert" role="alert">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-2">
                <polyline points="20,6 9,17 4,12"></polyline>
            </svg>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <!-- Products Grid -->
    <section class="products-grid">
        <div class="container">
            <div class="row products-container" id="products-container">
                @forelse($products as $product)
                <div class="col-xl-3 col-lg-4 col-md-6 mb-4 product-item">
                    <div class="product-card-modern h-100">
                        <div class="product-image-container">
                            <img src="{{ $product->image_url ? $product->image_url : 'https://via.placeholder.com/300x300?text=No+Image' }}" 
                                 class="product-image" alt="{{ $product->name }}">
                            <div class="product-overlay">
                                <div class="product-actions">
                                    <button class="btn btn-action btn-wishlist" title="Add to Wishlist">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                        </svg>
                                    </button>
                                    <button class="btn btn-action btn-quick-view" title="Quick View">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="product-badge">New</div>
                        </div>
                        <div class="product-info">
                            <div class="product-rating">
                                <div class="stars">
                                    <span class="star filled">★</span>
                                    <span class="star filled">★</span>
                                    <span class="star filled">★</span>
                                    <span class="star filled">★</span>
                                    <span class="star">★</span>
                                </div>
                                <span class="rating-count">({{ rand(10, 100) }})</span>
                            </div>
                            <h5 class="product-title">{{ $product->name }}</h5>
                            <p class="product-description">{{ Str::limit($product->description, 60) }}</p>
                            <div class="product-price">
                                <span class="current-price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                @if(rand(0, 1))
                                <span class="original-price">Rp {{ number_format($product->price * 1.2, 0, ',', '.') }}</span>
                                @endif
                            </div>
                            <div class="product-buttons">
                                <button class="btn btn-cart-add">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-2">
                                        <circle cx="9" cy="21" r="1"></circle>
                                        <circle cx="20" cy="21" r="1"></circle>
                                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                    </svg>
                                    Add to Cart
                                </button>
                                <a href="{{ route('product.show', $product->slug) }}" class="btn btn-view-details">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="empty-state">
                        <div class="empty-icon">
                            <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M16 16s-1.5-2-4-2-4 2-4 2"></path>
                                <line x1="9" y1="9" x2="9.01" y2="9"></line>
                                <line x1="15" y1="9" x2="15.01" y2="9"></line>
                            </svg>
                        </div>
                        <h3>No Products Found</h3>
                        <p>Sorry, we couldn't find any products matching your search criteria.</p>
                        <a href="{{ url('/products') }}" class="btn btn-primary">View All Products</a>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($products->hasPages())
            <div class="pagination-container">
                {{ $products->appends(request()->query())->links('vendor.pagination.simple-bootstrap-5') }}
            </div>
            @endif
        </div>
    </section>

    <style>
        /* Hero Section */
        .products-hero {
            background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 50%, #fecfef 100%);
            padding: 4rem 0;
            position: relative;
            overflow: hidden;
        }

        .products-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .text-gradient {
            background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 2rem;
        }

        .hero-search-container {
            position: relative;
        }

        .modern-search-form {
            position: relative;
        }

        .search-input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
            background: white;
            border-radius: 50px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .modern-search-input {
            border: none;
            padding: 1rem 1.5rem;
            font-size: 1.1rem;
            background: transparent;
            flex: 1;
            outline: none;
        }

        .modern-search-input:focus {
            box-shadow: none;
        }

        .btn-search-modern {
            background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
            border: none;
            padding: 1rem 1.5rem;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .btn-search-modern:hover {
            background: linear-gradient(135deg, #ff5252, #26a69a);
            transform: scale(1.05);
        }

        /* Filters Section */
        .filters-section {
            padding: 2rem 0;
            background: #f8f9fa;
        }

        .products-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .products-subtitle {
            color: #666;
            font-size: 1.1rem;
        }

        .filter-controls {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            align-items: center;
        }

        .btn-filter {
            background: white;
            border: 2px solid #e9ecef;
            padding: 0.7rem 1.5rem;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-filter:hover {
            border-color: #ff6b6b;
            color: #ff6b6b;
        }

        .view-toggle {
            display: flex;
            background: white;
            border-radius: 25px;
            padding: 0.2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-view-toggle {
            background: transparent;
            border: none;
            padding: 0.5rem;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .btn-view-toggle.active {
            background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
            color: white;
        }

        /* Products Grid */
        .products-grid {
            padding: 3rem 0;
        }

        .product-card-modern {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            position: relative;
        }

        .product-card-modern:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .product-image-container {
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
            transform: scale(1.1);
        }

        .product-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .product-card-modern:hover .product-overlay {
            opacity: 1;
        }

        .product-actions {
            display: flex;
            gap: 1rem;
        }

        .btn-action {
            background: white;
            border: none;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
            transition: all 0.3s ease;
            transform: translateY(20px);
        }

        .product-card-modern:hover .btn-action {
            transform: translateY(0);
        }

        .btn-action:hover {
            background: #ff6b6b;
            color: white;
        }

        .product-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: #ff6b6b;
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 2;
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-rating {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .stars {
            display: flex;
            gap: 0.1rem;
        }

        .star {
            color: #ddd;
            font-size: 1rem;
        }

        .star.filled {
            color: #ffc107;
        }

        .rating-count {
            color: #666;
            font-size: 0.9rem;
        }

        .product-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }

        .product-description {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            line-height: 1.4;
        }

        .product-price {
            margin-bottom: 1rem;
        }

        .current-price {
            font-size: 1.3rem;
            font-weight: 700;
            color: #ff6b6b;
        }

        .original-price {
            font-size: 1rem;
            color: #999;
            text-decoration: line-through;
            margin-left: 0.5rem;
        }

        .product-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn-cart-add {
            background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
            border: none;
            color: white;
            padding: 0.7rem 1rem;
            border-radius: 25px;
            font-weight: 600;
            flex: 1;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-cart-add:hover {
            background: linear-gradient(135deg, #ff5252, #26a69a);
            transform: translateY(-2px);
        }

        .btn-view-details {
            background: transparent;
            border: 2px solid #ff6b6b;
            color: #ff6b6b;
            padding: 0.7rem 1rem;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-view-details:hover {
            background: #ff6b6b;
            color: white;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
        }

        .empty-icon {
            color: #ddd;
            margin-bottom: 2rem;
        }

        .empty-state h3 {
            color: #333;
            margin-bottom: 1rem;
        }

        .empty-state p {
            color: #666;
            margin-bottom: 2rem;
        }

        /* Modern Alert */
        .modern-alert {
            border-radius: 15px;
            border: none;
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* Pagination */
        .pagination-container {
            margin-top: 3rem;
            display: flex;
            justify-content: center;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }

            .products-title {
                font-size: 2rem;
            }

            .filter-controls {
                flex-direction: column;
                gap: 1rem;
                margin-top: 1rem;
            }

            .product-buttons {
                flex-direction: column;
            }

            .btn-cart-add, .btn-view-details {
                width: 100%;
            }
        }

        /* Animation */
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

        .product-item {
            animation: fadeInUp 0.6s ease-out;
        }

        .product-item:nth-child(1) { animation-delay: 0.1s; }
        .product-item:nth-child(2) { animation-delay: 0.2s; }
        .product-item:nth-child(3) { animation-delay: 0.3s; }
        .product-item:nth-child(4) { animation-delay: 0.4s; }
    </style>

    <script>
        // View Toggle Functionality
        document.querySelectorAll('.btn-view-toggle').forEach(button => {
            button.addEventListener('click', function() {
                const view = this.dataset.view;
                const container = document.getElementById('products-container');
                
                // Remove active class from all buttons
                document.querySelectorAll('.btn-view-toggle').forEach(btn => btn.classList.remove('active'));
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Toggle view classes
                if (view === 'list') {
                    container.classList.add('list-view');
                    container.classList.remove('grid-view');
                } else {
                    container.classList.add('grid-view');
                    container.classList.remove('list-view');
                }
            });
        });

        // Add to Cart Animation
        document.querySelectorAll('.btn-cart-add').forEach(button => {
            button.addEventListener('click', function() {
                const original = this.innerHTML;
                this.innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20,6 9,17 4,12"></polyline></svg> Added!';
                this.style.background = '#28a745';
                
                setTimeout(() => {
                    this.innerHTML = original;
                    this.style.background = '';
                }, 2000);
            });
        });

        // Wishlist Toggle
        document.querySelectorAll('.btn-wishlist').forEach(button => {
            button.addEventListener('click', function() {
                this.classList.toggle('active');
                const svg = this.querySelector('svg');
                if (this.classList.contains('active')) {
                    svg.style.fill = '#ff6b6b';
                    svg.style.stroke = '#ff6b6b';
                } else {
                    svg.style.fill = 'none';
                    svg.style.stroke = 'currentColor';
                }
            });
        });
    </script>
</x-layout>
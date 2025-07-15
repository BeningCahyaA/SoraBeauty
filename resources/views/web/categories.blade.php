<x-layout>
    <x-slot name="title">Categories</x-slot>

    <!-- Hero Section -->
    <section class="categories-hero">
        <div class="container">
            <h1 class="hero-title">Explore Our <span class="text-gradient">Categories</span></h1>
            <p class="hero-subtitle">Find the perfect category for your needs</p>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories-section">
        <div class="container py-3">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 style="font-size: 1.5rem;">Kategori Produk</h3>
            </div>
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3">
                @foreach($categories as $category)
                <div class="col">
                    <a href="{{ URL::to('/category/'.$category->slug) }}" class="card text-decoration-none">
                        <div class="card category-card text-center h-100 py-3 border-0 shadow-sm">
                            <div class="mx-auto mb-2"
                                style="width:64px;height:64px;display:flex;align-items:center;justify-content:center;background:#f8f9fa;border-radius:50%;">
                                <img src="{{ asset('storage/'.$category->image) }}" alt="{{ $category->name }}" style="width:36px;height:36px;object-fit:contain;">
                            </div>
                            <div class="card-body p-2">
                                <h6 class="card-title mb-1 text-dark">{{ $category->name }}</h6>
                                <p class="card-text text-muted small text-truncate">{{ $category->description }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center w-100 mt-4">
                {{ $categories->links('vendor.pagination.simple-bootstrap-5') }}
            </div>
        </div>
    </section>

    <style>
        /* Hero Section */
        .categories-hero {
            background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 50%, #fecfef 100%);
            padding: 4rem 0;
            text-align: center;
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 1rem;
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

        /* Categories Section */
        .category-card {
            transition: transform 0.3s ease;
        }

        .category-card:hover {
            transform: scale(1.05);
        }
    </style>
</x-layout>

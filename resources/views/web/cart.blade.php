<x-layout>
    <x-slot name="title">Keranjang Belanja</x-slot>

    <!-- Hero Section -->
    <section class="cart-hero">
        <div class="container">
            <h1 class="hero-title">Keranjang Belanja</h1>
            <p class="hero-subtitle">Periksa item yang telah Anda pilih sebelum melanjutkan ke pembayaran</p>
        </div>
    </section>

    <!-- Success Alert -->
    @if(session('success'))
    <div class="container mt-4">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <div class="container my-5">
        @if($cart && count($cart->items))
        <div class="row">
            <!-- Cart Items -->
            <div class="col-lg-8">
                <div class="card mb-3">
                    <div class="card-body p-3">
                        @forelse($cart->items as $item)
                        @if($item->itemable)
                        <div class="cart-item d-flex align-items-center mb-3 border-bottom pb-3">
                            <img src="{{ $item->itemable->image_url ?? 'https://via.placeholder.com/80?text=Product' }}" class="cart-img me-3 rounded" alt="{{ $item->itemable->name }}">
                            <div class="flex-grow-1">
                                <h5 class="cart-item-name mb-1">{{ $item->itemable->name }}</h5>
                                <p class="cart-item-price mb-0 text-muted">Rp.{{ number_format($item->itemable->price, 0, ',', '.') }}</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-inline-flex me-2">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" name="action" value="decrease" class="btn btn-outline-secondary btn-sm" {{ $item->quantity <= 1 ? 'disabled' : '' }}>-</button>
                                    <input type="text" name="quantity" value="{{ $item->quantity }}" class="form-control form-control-sm text-center mx-1" style="width: 50px;" readonly>
                                    <button type="submit" name="action" value="increase" class="btn btn-outline-secondary btn-sm">+</button>
                                </form>
                                <span class="cart-item-subtotal mb-0 me-3 fw-semibold">Rp.{{ number_format($item->itemable->price * $item->quantity, 0, ',', '.') }}</span>
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST" onsubmit="return confirm('Hapus item ini dari keranjang?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus"><i class="bi bi-trash"></i> Hapus</button>
                                </form>
                            </div>
                        </div>
                        @endif
                        @empty
                        <div class="alert alert-info">
                            Keranjang belanja Anda kosong.
                        </div>
                        @endforelse
                    </div>
                </div>
                <a href="{{ URL::to('/products') }}" class="btn btn-outline-primary mt-2"><i class="bi bi-arrow-left"></i> Lanjut Belanja</a>
            </div>

            <!-- Order Summary -->
            <div class="col-lg-4">
                <div class="card p-3">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Ringkasan Pesanan</h5>
                        <div class="d-flex justify-content-between total-section mb-2">
                            <span>Subtotal</span>
                            <span>Rp.{{ number_format($cart->calculatedPriceByQuantity(), 0, ',', '.') }}</span>
                        </div>
                        <div class="d-flex justify-content-between total-section fw-bold">
                            <span>Total</span>
                            <span>Rp.{{ number_format($cart->calculatedPriceByQuantity(), 0, ',', '.') }}</span>
                        </div>
                        <a href="{{ route('checkout.index') }}" class="btn btn-primary w-100 mt-3">Lanjut ke Pembayaran</a>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="alert alert-info">
            Keranjang belanja Anda kosong.
        </div>
        @endif
    </div>

    <style>
        /* Hero Section */
        .cart-hero {
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

        .hero-subtitle {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 2rem;
        }

        /* Cart Item Styles */
        .cart-item {
            transition: background-color 0.3s;
        }

        .cart-item:hover {
            background-color: #f8f9fa;
        }

        .cart-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
        }

        .total-section {
            font-size: 1.1rem;
        }

        .btn-outline-primary {
            border-color: #007bff;
            color: #007bff;
        }

        .btn-outline-primary:hover {
            background-color: #007bff;
            color: white;
        }
    </style>
</x-layout>

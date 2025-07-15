<x-layout>
    <x-slot name="title">Pembayaran</x-slot>

    <!-- Hero Section -->
    <section class="checkout-hero">
        <div class="container">
            <h1 class="hero-title">Pembayaran</h1>
            <p class="hero-subtitle">Silakan lengkapi informasi di bawah ini untuk menyelesaikan pembelian Anda.</p>
        </div>
    </section>

    <div class="container my-5">
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Nomor HP</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="total" class="form-label">Total Harga</label>
                <input type="text"
                    class="form-control"
                    id="total"
                    name="total"
                    value="Rp.{{ number_format($total, 0, ',', '.') }}"
                    readonly>
            </div>
            <button type="submit" class="btn btn-primary">Checkout</button>
        </form>
    </div>

    <style>
        /* Hero Section */
        .checkout-hero {
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

        /* Form Styles */
        .form-label {
            font-weight: 600;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</x-layout>

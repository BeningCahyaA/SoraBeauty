<x-layout>
    <x-slot name="title">Pembayaran</x-slot>
    <div class="container my-5">
        <h1 class="mb-4">Pembayaran</h1>
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
</x-layout>
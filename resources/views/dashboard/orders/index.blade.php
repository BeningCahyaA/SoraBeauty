<x-dashboard-layout>
    <x-slot name="title">Daftar Pesanan</x-slot>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table align-middle">
        <thead class="table-light">
            <tr>
                <th>#</th><th>Pelanggan</th><th>Produk</th><th>Total</th>
                <th>Status</th><th>Resi</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr x-data="{ s: '{{ $order->status }}' }">
                <td>{{ $order->id }}</td>
                <td>{{ $order->customer->name }}<br>
                    <small class="text-muted">{{ $order->customer->phone }}</small>
                </td>
                <td>
                    @foreach($order->items as $it)
                        <div>{{ $it->product->name }} x{{ $it->quantity }}</div>
                    @endforeach
                </td>
                <td>Rp {{ number_format($order->total,0,',','.') }}</td>

                {{-- form update --}}
                <form method="POST" action="{{ route('orders.update',$order) }}">
                    @csrf @method('PATCH')

                    <td>
                        <select name="status" class="form-select form-select-sm"
                                x-model="s" @change="$refs.save.click()">
                            <option value="diterima">Pesanan Diterima</option>
                            <option value="diproses">Sedang Diproses</option>
                            <option value="dikirim">Sedang Dikirim</option>
                        </select>
                    </td>

                    <td>
                        <template x-if="s==='dikirim'">
                            <input name="tracking_number"
                                   class="form-control form-control-sm"
                                   placeholder="Nomor Resi"
                                   value="{{ $order->tracking_number }}">
                        </template>
                    </td>

                    <td>
                        <button class="btn btn-primary btn-sm" type="submit" x-ref="save">
                            Simpan
                        </button>
                    </td>
                </form>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $orders->links('vendor.pagination.bootstrap-5') }}
</x-dashboard-layout>

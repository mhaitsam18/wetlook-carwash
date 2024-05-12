<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:style></x-slot:style>
    <div class="account_dashboard">
        <div class="container">
            <h4>Detail Pesanan</h4>
            <a href="#" id="btnBack" class="btn btn-secondary m-1">Kembali</a>
            @if ($booking && $booking->order)
                <div class="row mb-3">
                    <div class="col-lg-4">
                        <li>Total Harga: Rp.{{ number_format($booking->order->total_price, 2, ',', '.') }}</li>
                        <li>Status Pemesanan: {{ $booking->order->status }}</li>
                        <li>Catatan Pelanggan: {{ $booking->order->customer_records }}</li>
                    </div>
                    <div class="col-lg-4">
                        <li>Tanggal Cuci: {{ $carbon->parse($booking->date)->isoFormat('LL') }}</li>
                        <li>Waktu: {{ $booking->time }}</li>
                        <li>Tanggal Booking: {{ $carbon->parse($booking->created_at)->isoFormat('LL') }}</li>
                        <li>Status Booking: {{ $booking->status }}</li>
                    </div>
                    <div class="col-lg-4">
                        <li>Plat Kendaraan: {{ $booking->vehicle->plate_number }}</li>
                        <li>Merek: {{ $booking->vehicle->make }}</li>
                        <li>Model: {{ $booking->vehicle->model }}</li>
                        <li>Warna: {{ $booking->vehicle->colour }}</li>
                    </div>
                </div>
            @endif
            <div class="table_page table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Produk / Jasa</th>
                            <th>Item</th>
                            <th>Jumlah</th>
                            <th>Harga satuan</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="min-width: 40px;">1</td>
                            <td>{{ $booking->package->name }}</td>
                            <td>{!! $booking->package->description !!}</td>
                            <td>1</td>
                            <td>Rp.{{ number_format($booking->package->price, 2, ',', '.') }}</td>
                            <td class="text-right">Rp.{{ number_format($booking->package->price, 2, ',', '.') }}</td>
                        </tr>
                        @if ($booking && $booking->order && $booking->order->details->count() > 0)
                            @foreach ($booking->order->details as $detail)
                                <tr>
                                    <td>{{ $loop->iteration + 1 }}</td>
                                    <td>{{ $detail->product->name }}</td>
                                    <td>{{ $detail->item }}</td>
                                    <td>{{ $detail->quantity }}</td>
                                    <td>Rp.{{ number_format($detail->price, 2, ',', '.') }}</td>
                                    <td>Rp.{{ number_format($detail->sub_total_price, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5" class="text-right">Total: </th>
                            <th class="text-right p-2">
                                Rp.{{ number_format($booking->order->total_price, 2, ',', '.') }}
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div> <!-- ...:::: End Customer Login Section :::... -->
    <x-slot:script>
        <script>
            $(document).ready(function() {
                $('#image').on('change', function() {
                    const file = $(this).prop('files')[0];
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        $('.img-preview').attr('src', e.target.result);
                    };

                    reader.readAsDataURL(file);
                });
            });
            document.getElementById('btnBack').addEventListener('click', function() {
                window.history.back();
            });
        </script>
    </x-slot:script>
    <x-slot:modal></x-slot:modal>
</x-layout>

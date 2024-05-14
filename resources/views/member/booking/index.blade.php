<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:style></x-slot:style>
    <div class="account_dashboard">
        <div class="container">

            <h4>Bookingan Saya</h4>
            <a href="/member/booking/create" class="btn btn-danger btn-sm mb-3">Booking</a>
            <div class="table_page table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Paket</th>
                            <th>Kendaraan</th>
                            <th>Tanggal Cuci</th>
                            <th>Waktu</th>
                            <th>Status</th>
                            <th>Waktu Pemesanan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td style="min-width: 40px;">{{ $loop->iteration }}</td>
                                <td>{{ $booking->package->name }}</td>
                                <td>{{ $booking->vehicle->model }}</td>
                                <td>{{ $carbon->parse($booking->date)->isoFormat('LL') }}</td>
                                <td>{{ $booking->time }}</td>
                                <td>{{ $booking->status }}</td>
                                <td>{{ $carbon->parse($booking->created_at)->isoFormat('LL') }}</td>
                                <td>
                                    <a href="/member/booking/{{ $booking->id }}"
                                        class="btn btn-sm btn-primary">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- ...:::: End Customer Login Section :::... -->
    <x-slot:script></x-slot:script>
    <x-slot:modal></x-slot:modal>
</x-layout>

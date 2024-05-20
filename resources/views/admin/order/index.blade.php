<x-admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:style></x-slot:style>
    {{-- <x-slot:headers>
        @foreach ($headers as $header)
            <li class="breadcrumb-item"><a href="{{ $header['href'] }}">{{ $header['slot'] }}</a></li>
        @endforeach
    </x-slot:headers> --}}
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">
            <!-- Top Selling -->
            <div class="col-12">
                <div class="card top-selling overflow-auto">
                    {{-- <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div> --}}

                    <div class="card-body pb-0">
                        <h5 class="card-title">Tabel {{ $title }}</h5>

                        <a href="/admin/order/create" class="btn btn-sm btn-primary d-inline m-1"><i
                                class="bi bi-plus"></i>
                            Tambah</a>

                        <table class="table table-hover table-responsive datatable" id="example1">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Member</th>
                                    <th scope="col">Nama Paket</th>
                                    <th scope="col">Tanggal yang dipesan</th>
                                    <th scope="col">Waktu</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Catatan Pelanggan</th>
                                    <th scope="col">Total Harga</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $badge = 'primary';
                                @endphp
                                @foreach ($orders as $order)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $order->booking->member->user->name }}</td>
                                        <td>{{ $order->booking->package->name }}</td>
                                        <td>{{ $carbon->parse($order->booking->date)->isoFormat('LL') }}</td>
                                        <td>{{ $order->booking->time }}</td>
                                        @php
                                            if ($order->status == 'pending') {
                                                $badge = 'warning';
                                            } elseif ($order->status == 'confirmed') {
                                                $badge = 'primary';
                                            } elseif ($order->status == 'cancelled') {
                                                $badge = 'danger';
                                            } elseif ($order->status == 'completed') {
                                                $badge = 'success';
                                            }
                                        @endphp
                                        <td><span class="badge text-bg-{{ $badge }}">{{ $order->status }}</span>
                                        </td>
                                        <td>{{ $order->customer_records }}</td>
                                        <td>Rp.{{ number_format($order->total_price, 2, ',', '.') }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="/admin/order/{{ $order->id }}/detail"
                                                    class="btn btn-sm btn-info d-inline m-1"><i class="bi bi-eye"></i>
                                                    Detail</a>
                                                <a href="/admin/order/{{ $order->id }}/payment"
                                                    class="btn btn-sm btn-warning d-inline m-1"><i
                                                        class="bi bi-cash"></i>
                                                    Pembayaran</a>
                                                <a href="/admin/order/{{ $order->id }}/edit"
                                                    class="btn btn-sm btn-success d-inline m-1"><i
                                                        class="bi bi-pencil-square"></i>
                                                    Sunting</a>
                                                <form action="/admin/order/{{ $order->id }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                                    <button type="submit"
                                                        class="btn btn-sm btn-danger d-inline m-1 tombol-hapus"><i
                                                            class="bi bi-trash"></i> Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div><!-- End Top Selling -->

        </div>
    </div><!-- End Left side columns -->
    <x-slot:script></x-slot:script>
    <x-slot:modal></x-slot:modal>
</x-admin-layout>

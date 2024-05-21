<x-admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:style></x-slot:style>
    <x-slot:headers>
        @foreach ($headers as $header)
            <li class="breadcrumb-item"><a href="{{ $header['href'] }}">{{ $header['slot'] }}</a></li>
        @endforeach
    </x-slot:headers>
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
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <h5 class="card-title">{{ $title }}
                                    <a href="javascript:window.history.back();"
                                        class="btn btn-sm btn-secondary float-end">Kembali</a>
                                </h5>
                            </div>
                            @isset($booking->vehicle)
                                @if ($booking->vehicle->image)
                                    <div class="col-lg-3">
                                        <img src="{{ $booking->vehicle->image ? asset('storage/' . $booking->vehicle->image) : '/assets/img/not-found.jpg' }}"
                                            alt="Profile" style="max-width: 280px;" class="my-3">
                                    </div>
                                @endif
                            @endisset
                            <div class="col-lg-3">
                                <h6 class="card-title">Detail Reservasi</h6>
                                <div class="mb-3">
                                    <div class="row mb-1">
                                        <div class="col-lg-5 col-md-4 label ">Nama Member</div>
                                        <div class="col-lg-7 col-md-8">
                                            {{ $booking->member->user->name ?? $booking->name }}</div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-5 col-md-4 label">Paket</div>
                                        <div class="col-lg-7 col-md-8">{{ $booking->package->name }}</div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-5 col-md-4 label">Tanggal pemesanan</div>
                                        <div class="col-lg-7 col-md-8">
                                            {{ $carbon->parse($booking->created_at)->isoFormat('LL') }}</div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-5 col-md-4 label">Tanggal reservasi</div>
                                        <div class="col-lg-7 col-md-8">
                                            {{ $carbon->parse($booking->date)->isoFormat('LL') }}</div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-5 col-md-4 label">Waktu</div>
                                        <div class="col-lg-7 col-md-8">
                                            {{ $carbon->parse($booking->time)->format('h:i A') }}</div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-5 col-md-4 label">Status Booking</div>
                                        <div class="col-lg-7 col-md-8">{{ $booking->status }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <h6 class="card-title">Detail Kendaraan</h6>
                                <div class="mb-3">
                                    <div class="row mb-1">
                                        <div class="col-lg-5 col-md-4 label ">Plat Nomor</div>
                                        <div class="col-lg-7 col-md-8">{{ $booking->vehicle->plate_number }}</div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-5 col-md-4 label ">Tipe</div>
                                        <div class="col-lg-7 col-md-8">
                                            {{ $booking->vehicle->type == 'car' ? 'Mobil' : 'Motor' }}</div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-5 col-md-4 label ">Merek</div>
                                        <div class="col-lg-7 col-md-8">
                                            {{ $booking->vehicle->make }}</div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-5 col-md-4 label ">Model</div>
                                        <div class="col-lg-7 col-md-8">
                                            {{ $booking->vehicle->model }}</div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-5 col-md-4 label ">Warna</div>
                                        <div class="col-lg-7 col-md-8">
                                            {{ $booking->vehicle->colour }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <h6 class="card-title">Detail Pemesanan</h6>
                                <div class="mb-3">
                                    <div class="row mb-1">
                                        <div class="col-lg-5 col-md-4 label">Status Pemesanan</div>
                                        <div class="col-lg-7 col-md-8">{{ $booking->order->status }}</div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-5 col-md-4 label">Catatan Pelanggan</div>
                                        <div class="col-lg-7 col-md-8">{{ $booking->order->customer_records }}</div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-5 col-md-4 label">Total Pemesanan</div>
                                        <div class="col-lg-7 col-md-8">
                                            Rp.{{ number_format($booking->order->total_price, 2, ',', '.') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5 class="card-title">Detail Pesanan</h5>

                        <a href="/admin/order/{{ $booking->order->id }}/detail/create"
                            class="btn btn-sm btn-primary d-inline m-1"><i class="bi bi-plus"></i>
                            Tambah</a>
                        <table class="table table-hover table-responsive datatable" id="example1">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Gambar Produk</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Item</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">SubTotal</th>
                                    @if ($booking->status == 'pending' || $booking->status == 'confirmation')
                                        <th scope="col">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <a href="/admin/package/{{ $booking->package->id }}">
                                            <img src="/assets/img/not-found.jpg">
                                        </a>
                                    </td>
                                    <td>
                                        <a
                                            href="/admin/package/{{ $booking->package->id }}">{{ $booking->package->name }}</a>
                                    </td>
                                    <td>{!! $booking->package->description !!}</td>
                                    <td>1</td>
                                    <td>Rp.{{ number_format($booking->package->price, 2, ',', '.') }}</td>
                                    <td>Rp.{{ number_format($booking->package->price, 2, ',', '.') }}</td>
                                    @if ($booking->status == 'pending' || $booking->status == 'confirmation')
                                        <td>
                                            <a href="/admin/booking/{{ $booking->id }}/edit"
                                                class="btn btn-sm btn-success d-inline m-1"><i
                                                    class="bi bi-pencil-square"></i>
                                                Sunting</a>
                                        </td>
                                    @endif
                                </tr>
                                @foreach ($booking->order->details as $detail)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration + 1 }}</th>
                                        <td>
                                            <a href="/admin/product/{{ $detail->product_id }}">
                                                <img src="{{ $detail->product->image ? asset('storage/' . $detail->product->image) : '/assets/img/not-found.jpg' }}"
                                                    alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/admin/product/{{ $detail->product_id }}"
                                                class="text-primary fw-bold">
                                                {{ $detail->product->name }}
                                            </a>
                                        </td>
                                        <td>{{ $detail->item }}</td>
                                        <td>{{ $detail->quantity }}</td>
                                        <td>Rp.{{ number_format($detail->price, 2, ',', '.') }}</td>
                                        <td>Rp.{{ number_format($detail->sub_total_price, 2, ',', '.') }}</td>
                                        @if ($booking->status == 'pending' || $booking->status == 'confirmation')
                                            <td>
                                                <div class="d-flex">
                                                    <form
                                                        action="/admin/order/{{ $detail->order_id }}/detail/{{ $detail->id }}/add"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-sm btn-success d-inline m-1">
                                                            <i class="bi bi-plus"></i>
                                                        </button>
                                                    </form>
                                                    <form
                                                        action="/admin/order/{{ $detail->order_id }}/detail/{{ $detail->id }}/decrease"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-sm btn-warning d-inline m-1">
                                                            <i class="bi bi-dash"></i>
                                                        </button>
                                                    </form>
                                                    <form
                                                        action="/admin/order/{{ $detail->order_id }}/detail/{{ $detail->id }}"
                                                        method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                            value="{{ $detail->id }}">
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger d-inline m-1 tombol-hapus"><i
                                                                class="bi bi-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="6" class="text-right">Total: </th>
                                    <th class="text-right p-2">
                                        Rp.{{ number_format($booking->order->total_price, 2, ',', '.') }}
                                    </th>
                                    @if ($booking->status == 'confirmation' || $booking->status == 'pending')
                                        <td>
                                            <form action="/admin/order/{{ $booking->order->id }}/checkout"
                                                method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-cart"></i> Checkout
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            </tfoot>
                        </table>

                    </div>

                </div>
            </div><!-- End Top Selling -->

        </div>
    </div><!-- End Left side columns -->
    <x-slot:script></x-slot:script>
    <x-slot:modal></x-slot:modal>
</x-admin-layout>

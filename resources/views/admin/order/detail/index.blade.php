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

                        <a href="/admin/order/{{ $order->id }}/detail/create"
                            class="btn btn-sm btn-primary d-inline m-1"><i class="bi bi-plus"></i>
                            Tambah</a>

                        <table class="table table-hover table-responsive datatable" id="example1">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Produk / Jasa</th>
                                    <th scope="col">item / barang</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Harga satuan</th>
                                    <th scope="col">Sub Total</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $order->booking->package->name }}</td>
                                    <td>{!! $order->booking->package->description !!}</td>
                                    <td>1</td>
                                    <td>Rp.{{ number_format($order->booking->package->price, 2, ',', '.') }}</td>
                                    <td>Rp.{{ number_format($order->booking->package->price, 2, ',', '.') }}</td>
                                    <td></td>
                                </tr>
                                @foreach ($order->details as $detail)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration + 1 }}</th>
                                        <td>
                                            <a href="/admin/product/{{ $detail->product_id }}"
                                                class="text-primary fw-bold">{{ $detail->product->name }}</a>
                                        </td>
                                        <td><a href="/admin/order/{{ $detail->order_id }}/detail/{{ $detail->id }}"
                                                class="fw-bold">{{ $detail->item }}</a></td>
                                        <td>{{ $detail->jumlah }}</td>
                                        <td>Rp.{{ number_format($detail->price, 2, ',', '.') }}</td>
                                        <td>Rp.{{ number_format($detail->sub_total_price, 2, ',', '.') }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="/admin/detail/{{ $detail->id }}/edit"
                                                    class="btn btn-sm btn-success d-inline m-1"><i
                                                        class="bi bi-pencil-square"></i>
                                                    Sunting</a>
                                                <form action="/admin/detail/{{ $detail->id }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $detail->id }}">
                                                    <button type="submit"
                                                        class="btn btn-sm btn-danger d-inline m-1 tombol-hapus"><i
                                                            class="bi bi-trash"></i> Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5">Total</th>
                                    <th>Rp.{{ number_format($order->details->sum('sub_total_price') + $order->booking->package->price, 2, ',', '.') }}
                                    </th>
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
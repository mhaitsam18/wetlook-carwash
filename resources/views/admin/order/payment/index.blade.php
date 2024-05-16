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

                        <a href="/admin/order/{{ $order->id }}/payment/create"
                            class="btn btn-sm btn-primary d-inline m-1"><i class="bi bi-plus"></i>
                            Tambah</a>

                        <table class="table table-hover table-responsive datatable" id="example1">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Bukti</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->payments as $payment)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration + 1 }}</th>
                                        <td>
                                            <a href="{{ asset('storage/' . $payment->evidance) }}"><img
                                                    src="{{ asset('storage/' . $payment->evidance) }}"
                                                    alt=""></a>
                                        </td>
                                        <td><a
                                                href="/admin/product/{{ $payment->id }}">Rp.{{ number_format($payment->amount, 2, ',', '.') }}</a>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="/admin/payment/{{ $payment->id }}/edit"
                                                    class="btn btn-sm btn-success d-inline m-1"><i
                                                        class="bi bi-pencil-square"></i>
                                                    Sunting</a>
                                                <form action="/admin/payment/{{ $payment->id }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $payment->id }}">
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
                                    <th>Rp.{{ number_format($order->payments->sum('amount')) }}
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

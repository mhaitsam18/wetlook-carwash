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
                        <div class="col-lg-12 col-md-12">
                            <h5 class="card-title">{{ $title }}
                                <a href="javascript:window.history.back();"
                                    class="btn btn-sm btn-secondary float-end">Kembali</a>
                            </h5>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <div class="row mb-1">
                                    <div class="col-lg-5 col-md-4 label">Item</div>
                                    <div class="col-lg-7 col-md-8">{{ $detail->product->name ?? $detail->item }}</div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-5 col-md-4 label">Jumlah</div>
                                    <div class="col-lg-7 col-md-8">{{ $detail->quantity }}</div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-5 col-md-4 label">Harga</div>
                                    <div class="col-lg-7 col-md-8">
                                        Rp.{{ number_format($detail->price, 2, ',', '.') }}</div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-5 col-md-4 label">Sub Total</div>
                                    <div class="col-lg-7 col-md-8">
                                        Rp.{{ number_format($detail->sub_total_price, 2, ',', '.') }}</div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div><!-- End Top Selling -->

        </div>
    </div><!-- End Left side columns -->
    <x-slot:script></x-slot:script>
    <x-slot:modal></x-slot:modal>
</x-admin-layout>

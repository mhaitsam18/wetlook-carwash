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
                            <div class="col-lg-6">
                                <h5 class="card-title">Detail {{ $title }}
                                    <a href="javascript:window.history.back();"
                                        class="btn btn-sm btn-secondary float-end">Kembali</a>
                                </h5>
                                <div class="mb-3">
                                    <div class="row mb-1">
                                        <div class="col-lg-3 col-md-4 label ">Nama Paket</div>
                                        <div class="col-lg-9 col-md-8">{{ $package->name }}</div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3 col-md-4 label">Tipe Ruang</div>
                                        <div class="col-lg-9 col-md-8">{{ $package->room->type }}</div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3 col-md-4 label ">Durasi</div>
                                        <div class="col-lg-9 col-md-8">{{ $package->duration }} Jam</div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3 col-md-4 label ">Harga</div>
                                        <div class="col-lg-9 col-md-8">
                                            Rp.{{ number_format($package->price, 2, ',', '.') }}
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3 col-md-4 label ">Deskripsi</div>
                                        <div class="col-lg-9 col-md-8">{!! $package->description !!}</div>
                                    </div>
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

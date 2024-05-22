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
                            <div class="col-lg-4">
                                <h5 class="card-title">Form {{ $title }}</h5>
                            </div>
                            <div class="col-lg-8">

                            </div>
                            <form class="row" action="/admin/order/{{ $order->id }}/payment" method="post"
                                enctype="multipart/form-data">
                                <div class="col-lg-6">
                                    @csrf
                                    <input type="hidden" name="order_id" id="order_id" value="{{ $order->id }}">
                                    <div class="row mb-3">
                                        <label for="amount" class="col-md-4 col-lg-3 col-form-label">Jumlah</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="amount" type="number"
                                                class="form-control @error('amount') is-invalid @enderror"
                                                id="amount" value="{{ old('amount', $order->total_price) }}">
                                            @error('amount')
                                                <div class="text-danger fs-6">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="evidence" class="col-md-4 col-lg-3 col-form-label">Bukti
                                            Pembayaran</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="evidence" type="file"
                                                class="form-control @error('evidence') is-invalid @enderror"
                                                id="evidence" value="{{ old('evidence') }}">
                                            @error('evidence')
                                                <div class="text-danger fs-6">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-center mb-3">
                                        <a href="javascript:window.history.back();"
                                            class="btn btn-secondary">Kembali</a>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form><!-- End Profile Edit Form -->
                        </div>

                    </div>

                </div>
            </div><!-- End Top Selling -->

        </div>
    </div><!-- End Left side columns -->
    <x-slot:script></x-slot:script>
    <x-slot:modal></x-slot:modal>
</x-admin-layout>

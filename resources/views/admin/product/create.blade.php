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
                        <h5 class="card-title">Form {{ $title }}</h5>
                        <form class="row" action="/admin/product" method="post" enctype="multipart/form-data">
                            <div class="col-lg-6 mb-3">
                                @csrf
                                <div class="row mb-3">
                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Gambar</label>
                                    <div class="col-md-8 col-lg-9">
                                        <img src="/assets/img/not-found.jpg" alt="Gambar" style="max-width: 200px;"
                                            class="img-preview">
                                        @error('image')
                                            <div class="text-danger fs-6">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div class="pt-2">
                                            <label for="image" class="btn btn-primary btn-sm"
                                                title="Upload new profile image">
                                                <i class="bi bi-upload"></i>
                                            </label>
                                            <input type="file" id="image" name="image"
                                                class="form-control @error('image') is-invalid @enderror"
                                                style="display: none;">
                                            <button type="button" id="removeImage" class="btn btn-danger btn-sm"
                                                title="Remove my profile image">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="type" class="col-md-4 col-lg-3 col-form-label">Paket</label>
                                    <div class="col-md-8 col-lg-9">
                                        <select name="room_id"
                                            class="form-select @error('room_id') is-invalid @enderror" id="room_id">
                                            <option selected value="">Semua Paket</option>
                                            @foreach ($packages as $package)
                                                <option value="{{ $package->id }}" @selected($package->id == old('package_id'))>
                                                    {{ $package->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="text-primary fs-6">
                                            hanya dipilih jika produk / jasa merupakan bagian dari paket tertentu
                                        </div>
                                        @error('room_id')
                                            <div class="text-danger fs-6">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-lg-3 col-form-label">Nama Produk / Barang
                                        /
                                        Jasa</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" id="name"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <div class="text-danger fs-6">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="type" class="col-md-4 col-lg-3 col-form-label">Tipe</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="type" type="text"
                                            class="form-control @error('type') is-invalid @enderror" id="type"
                                            value="{{ old('type') }}">
                                        @error('type')
                                            <div class="text-danger fs-6">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="price" class="col-md-4 col-lg-3 col-form-label">Harga</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="price" type="number"
                                            class="form-control @error('price') is-invalid @enderror" id="price"
                                            value="{{ old('price') }}">
                                        @error('price')
                                            <div class="text-danger fs-6">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-center mb-3">
                                    <a href="javascript:window.history.back();" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea name="description" class="tinymce-editor form-control @error('description') is-invalid @enderror"
                                    id="description">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-danger fs-6">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </form><!-- End Profile Edit Form -->

                    </div>

                </div>
            </div><!-- End Top Selling -->

        </div>
    </div><!-- End Left side columns -->
    <x-slot:script>
        <script src="assets/vendor/tinymce/tinymce.min.js"></script>
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
            $(document).ready(function() {
                $('#removeImage').on('click', function() {
                    $('.img-preview').attr('src', '/assets/img/not-found.jpg');
                    $('#image').val('');
                });
            });
        </script>
    </x-slot:script>
    <x-slot:modal></x-slot:modal>
</x-admin-layout>

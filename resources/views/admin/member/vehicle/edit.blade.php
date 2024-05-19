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
                        <form action="/admin/member/{{ $vehicle->member_id }}/vehicle/{{ $vehicle->id }}" method="post"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <input type="hidden" name="id" value="{{ old('id', $vehicle->id) }}">
                            <div class="row mb-3">
                                <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Gambar</label>
                                <div class="col-md-8 col-lg-9">
                                    <img src="{{ $vehicle->image ? asset('storage/' . $vehicle->image) : '/assets/img/not-found.jpg' }}"
                                        alt="Profile" style="max-width: 200px;" class="img-preview">
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
                                <label for="plate_number" class="col-md-4 col-lg-3 col-form-label">Plat Nomor</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="plate_number" type="text"
                                        class="form-control @error('plate_number') is-invalid @enderror"
                                        id="plate_number" value="{{ old('plate_number', $vehicle->plate_number) }}">
                                    @error('plate_number')
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
                                        value="{{ old('type', $vehicle->type) }}">
                                    @error('type')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="make" class="col-md-4 col-lg-3 col-form-label">Merek</label>
                                <div class="col-md-8 col-lg-9">
                                    <input make="make" type="text"
                                        class="form-control @error('make') is-invalid @enderror" id="make"
                                        value="{{ old('make', $vehicle->make) }}">
                                    @error('make')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="model" class="col-md-4 col-lg-3 col-form-label">Model</label>
                                <div class="col-md-8 col-lg-9">
                                    <input model="model" type="text"
                                        class="form-control @error('model') is-invalid @enderror" id="model"
                                        value="{{ old('model', $vehicle->model) }}">
                                    @error('model')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="colour" class="col-md-4 col-lg-3 col-form-label">Warna</label>
                                <div class="col-md-8 col-lg-9">
                                    <input colour="colour" type="text"
                                        class="form-control @error('colour') is-invalid @enderror" id="colour"
                                        value="{{ old('colour', $vehicle->colour) }}">
                                    @error('colour')
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
                        </form><!-- End Profile Edit Form -->

                    </div>

                </div>
            </div><!-- End Top Selling -->

        </div>
    </div><!-- End Left side columns -->
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

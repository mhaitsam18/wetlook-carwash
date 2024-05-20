<x-admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:style>
    </x-slot:style>
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
                            <form class="row" action="/admin/package/{{ $package->id }}" method="post"
                                enctype="multipart/form-data">
                                <div class="col-lg-6">
                                    @method('put')
                                    @csrf
                                    <input type="hidden" name="id" value="{{ old('id', $package->id) }}">
                                    <div class="row mb-3">
                                        <label for="room_id" class="col-md-4 col-lg-3 col-form-label">Tipe Slot/Ruang
                                            Cuci</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select name="room_id"
                                                class="form-select @error('room_id') is-invalid @enderror"
                                                id="room_id">
                                                <option selected disabled value="">Pilih Ruang</option>
                                                @foreach ($rooms as $room)
                                                    <option value="{{ $room->id }}" @selected($room->id == old('room_id', $package->room_id))>
                                                        {{ $room->type }}</option>
                                                @endforeach
                                            </select>
                                            @error('room_id')
                                                <div class="text-danger fs-6">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-lg-3 col-form-label">Nama
                                            Paket</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                value="{{ old('name', $package->name) }}">
                                            @error('name')
                                                <div class="text-danger fs-6">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="duration" class="col-md-4 col-lg-3 col-form-label">Durasi
                                            (jam)</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="duration" type="number"
                                                class="form-control @error('duration') is-invalid @enderror"
                                                id="duration" value="{{ old('duration', $package->duration) }}">
                                            @error('duration')
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
                                                value="{{ old('price', $package->price) }}">
                                            @error('price')
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
                                <div class="col-lg-6 mb-3">
                                    <label for="description" class="form-label">Deskripsi</label>
                                    <textarea name="description" class="tinymce-editor form-control @error('description') is-invalid @enderror"
                                        id="description">{{ old('description', $package->description) }}</textarea>
                                    @error('description')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </form><!-- End Profile Edit Form -->
                        </div>

                    </div>

                </div>
            </div><!-- End Top Selling -->

        </div>
    </div><!-- End Left side columns -->
    <x-slot:script>
        <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    </x-slot:script>
    <x-slot:modal></x-slot:modal>
</x-admin-layout>

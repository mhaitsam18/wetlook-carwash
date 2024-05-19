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
                        <form action="/admin/member/{{ $member->id }}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <input type="hidden" name="id" value="{{ old('id', $member->user->id) }}">
                            <div class="row mb-3">
                                <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto Profil</label>
                                <div class="col-md-8 col-lg-9">
                                    <img src="{{ asset('storage/' . $member->user->photo) }}" alt="Profile"
                                        style="max-width: 200px;" class="img-preview">
                                    @error('photo')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="pt-2">
                                        <label for="photo" class="btn btn-primary btn-sm"
                                            title="Upload new profile image">
                                            <i class="bi bi-upload"></i>
                                        </label>
                                        <input type="file" id="photo" name="photo"
                                            class="form-control @error('photo') is-invalid @enderror"
                                            style="display: none;">
                                        <button type="button" id="removeImage" class="btn btn-danger btn-sm"
                                            title="Remove my profile image">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                        value="{{ old('name', $member->user->name) }}">
                                    @error('name')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror" id="username"
                                        value="{{ old('username', $member->user->username) }}">
                                    @error('username')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        value="{{ old('email', $member->user->email) }}">
                                    @error('email')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone_number" class="col-md-4 col-lg-3 col-form-label">Nomor Ponsel</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="phone_number" type="text"
                                        class="form-control @error('phone_number') is-invalid @enderror"
                                        id="phone_number" value="{{ old('phone_number', $member->phone_number) }}">
                                    @error('phone_number')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="address" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                <div class="col-md-8 col-lg-9">
                                    <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="address">{{ old('address', $member->address) }}</textarea>
                                    @error('address')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-lg-3 col-form-label">Kata Sandi Baru</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="password" class="form-control" name="password" id="password">
                                    <div class="text-primary fs-6">
                                        Kosongkan jika tidak ada perubahan
                                    </div>
                                    @error('password')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">Konfirmasi
                                    Kata Sandi</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="password" class="form-control" name="password_confirmation"
                                        id="password_confirmation">
                                    @error('password_confirmation')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center mb-3">
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
                $('#photo').on('change', function() {
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
                    $('#photo').val('');
                });
            });
        </script>
    </x-slot:script>
    <x-slot:modal></x-slot:modal>
</x-admin-layout>

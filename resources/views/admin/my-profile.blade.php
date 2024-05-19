<x-admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:style></x-slot:style>
    {{-- <x-slot:headers>
        @foreach ($headers as $header)
            <li class="breadcrumb-item"><a href="{{ $header['href'] }}">{{ $header['slot'] }}</a></li>
        @endforeach
    </x-slot:headers> --}}
    <!-- Left side columns -->
    <div class="col-xl-4">

        <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="Profile" class="rounded-circle w-20"
                    style="max-width: 150px;">
                <h2>{{ auth()->user()->name }}</h2>
                <h3>{{ auth()->user()->role }}</h3>
                {{-- <div class="social-links mt-2">
                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div> --}}
            </div>
        </div>

    </div>

    <div class="col-xl-8">

        <div class="card">
            <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">
                    @php
                        $profileActive = '';
                        $editActive = '';
                        $passwordActive = '';

                        if ($errors->any()) {
                            if (
                                $errors->has('name') ||
                                $errors->has('username') ||
                                $errors->has('email') ||
                                $errors->has('photo')
                            ) {
                                $editActive = true;
                            } elseif (
                                $errors->has('password') ||
                                $errors->has('current_password') ||
                                $errors->has('password_confirmation')
                            ) {
                                $passwordActive = true;
                            } else {
                                $profileActive = true;
                            }
                        } else {
                            $profileActive = true;
                        }
                    @endphp

                    <li class="nav-item">
                        <button class="nav-link {{ $profileActive ? 'active' : '' }}" data-bs-toggle="tab"
                            data-bs-target="#profile-overview">Ringkasan</button>
                    </li>

                    <li class="nav-item">
                        <button class="nav-link {{ $editActive ? 'active' : '' }}" data-bs-toggle="tab"
                            data-bs-target="#profile-edit">Sunting Profil</button>
                    </li>

                    <li class="nav-item">
                        <button class="nav-link {{ $passwordActive ? 'active' : '' }}" data-bs-toggle="tab"
                            data-bs-target="#profile-change-password">Ganti Kata Sandi</button>
                    </li>

                </ul>
                <div class="tab-content pt-2">

                    <div class="tab-pane fade  {{ $profileActive ? 'show active' : '' }} profile-overview"
                        id="profile-overview">
                        <h5 class="card-title">Tentang</h5>
                        <p class="small fst-italic">Tidak Tersedia</p>

                        <h5 class="card-title">Detail Profil</h5>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                            <div class="col-lg-9 col-md-8">{{ auth()->user()->name }}</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Perusahaan</div>
                            <div class="col-lg-9 col-md-8">Wetlook Carwash</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Username</div>
                            <div class="col-lg-9 col-md-8">{{ auth()->user()->username }}</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Email</div>
                            <div class="col-lg-9 col-md-8">{{ auth()->user()->email }}</div>
                        </div>

                    </div>

                    <div class="tab-pane fade {{ $editActive ? 'show active' : '' }} profile-edit pt-3"
                        id="profile-edit">

                        <!-- Profile Edit Form -->
                        <form action="/admin/my-profile/{{ $profile->id }}" method="post"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <input type="hidden" name="id" value="{{ old('id', $profile->id) }}">
                            <div class="row mb-3">
                                <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto Profil</label>
                                <div class="col-md-8 col-lg-9">
                                    <img src="{{ asset('storage/' . $profile->photo) }}" alt="Profile"
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
                                        value="{{ old('name', $profile->name) }}">
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
                                        value="{{ old('username', $profile->username) }}">
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
                                        value="{{ old('email', $profile->email) }}">
                                    @error('email')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form><!-- End Profile Edit Form -->

                    </div>


                    <div class="tab-pane fade {{ $passwordActive ? 'show active' : '' }} pt-3"
                        id="profile-change-password">
                        <!-- Change Password Form -->
                        <form action="/admin/change-password/{{ $profile->id }}" method="post"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <input type="hidden" name="id" value="{{ old('id', $profile->id) }}">
                            <div class="row mb-3">
                                <label for="current_password" class="col-md-4 col-lg-3 col-form-label">Kata Sandi Saat
                                    Ini</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="password" class="form-control" name="current_password"
                                        id="current_password">
                                    @error('current_password')
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
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>

                    </div>

                </div><!-- End Bordered Tabs -->

            </div>
        </div>

    </div>
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

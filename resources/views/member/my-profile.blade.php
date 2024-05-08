<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <x-slot:style></x-slot:style>
    <!-- ...:::: Start Account Dashboard Section:::... -->
    <div class="account_dashboard">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button" data-aos="fade-up" data-aos-delay="0">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li><a href="#my-profile" data-toggle="tab"
                                    class="nav-link @if (!session()->get('form')) active @endif">Profil Saya</a>
                            </li>
                            <li><a href="#change-password" data-toggle="tab"
                                    class="nav-link @if (session()->get('form')) active @endif">Ganti Kata
                                    Sandi</a></li>
                            <li><a href="#my-vehicle" data-toggle="tab" class="nav-link">Kendaraan saya</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">
                        <div class="tab-pane fade @if (!session()->get('form')) show active @endif" id="my-profile">
                            <h3>Profil Saya </h3>
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                        <form action="/my-profile/{{ $profile->member->id }}" method="post"
                                            enctype="multipart/form-data">
                                            @method('put')
                                            @csrf
                                            <input type="hidden" name="id" value="{{ old('id', $profile->id) }}">
                                            <div class="default-form-box mb-20">
                                                <label>Nama Lengkap</label>
                                                <input type="text" name="name" id="name"
                                                    value="{{ old('name', $profile->name) }}">
                                                @error('name')
                                                    <div class="text-danger fs-6">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>Email</label>
                                                <input type="email" name="email" id="email"
                                                    value="{{ old('email', $profile->email) }}">
                                                @error('email')
                                                    <div class="text-danger fs-6">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>Username</label>
                                                <input type="text" name="username" id="username"
                                                    value="{{ old('username', $profile->username) }}">
                                                @error('username')
                                                    <div class="text-danger fs-6">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>Nomor Telepon</label>
                                                <input type="text" name="phone_number" id="phone_number"
                                                    value="{{ old('phone_number', $profile->member->phone_number) }}">
                                                @error('phone_number')
                                                    <div class="text-danger fs-6">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>Alamat</label>
                                                <textarea name="address" id="address">{{ old('address', $profile->member->address) }}</textarea>
                                                @error('address')
                                                    <div class="text-danger fs-6">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="default-form-box mb-20">

                                                <img src="{{ asset('storage/' . $profile->photo) }}"
                                                    class="img-thumbnail img-preview"
                                                    style="width: 200px; max-height:500px;">
                                                <label>Foto</label>
                                                <input type="file" name="photo" id="photo">
                                                @error('photo')
                                                    <div class="text-danger fs-6">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="save_button primary_btn default_button">
                                                <button type="submit">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade @if (session()->get('form')) show active @endif"
                            id="change-password">
                            <h3>Ganti Kata Sandi </h3>
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                        <form action="/change-password/{{ $profile->id }}" method="post"
                                            enctype="multipart/form-data">
                                            @method('put')
                                            @csrf
                                            <input type="hidden" name="id" value="{{ old('id', $profile->id) }}">
                                            <div class="default-form-box mb-20">
                                                <label>Kata Sandi Saat Ini</label>
                                                <input type="password" name="current_password" id="current_password">
                                                @error('current_password')
                                                    <div class="text-danger fs-6">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>Kata Sandi Baru</label>
                                                <input type="password" name="password" id="password">
                                                @error('password')
                                                    <div class="text-danger fs-6">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>Konfirmasi Kata Sandi</label>
                                                <input type="password" name="password_confirmation"
                                                    id="password_confirmation">
                                                @error('password_confirmation')
                                                    <div class="text-danger fs-6">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="save_button primary_btn default_button">
                                                <button type="submit">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="my-vehicle">
                            <h4>Kendaraan Saya</h4>
                            <div class="table_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>May 10, 2018</td>
                                            <td><span class="success">Completed</span></td>
                                            <td>$25.00 for 1 item </td>
                                            <td><a href="cart.html" class="view">view</a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>May 10, 2018</td>
                                            <td>Processing</td>
                                            <td>$17.00 for 1 item </td>
                                            <td><a href="cart.html" class="view">view</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Account Dashboard Section:::... -->
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
        </script>
    </x-slot:script>
</x-layout>

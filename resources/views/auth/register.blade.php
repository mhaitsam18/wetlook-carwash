<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:style></x-slot:style>
    <div class="customer_login">
        <div class="container">
            <div class="row">
                <!--register area start-->
                <div class="col-lg-12 col-md-12">
                    <div class="account_form register" data-aos="fade-up" data-aos-delay="200">
                        <h3>Registrasi</h3>
                        <form action="/register" method="post">
                            @csrf
                            <div class="row">
                                <div class="default-form-box mb-20 col-6">
                                    <label>Email <span>*</span></label>
                                    <input type="email" name="email" id="email"
                                        value="{{ old('email_or_username') }}">
                                    @error('email')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="default-form-box mb-20 col-6">
                                    <label>Username <span>*</span></label>
                                    <input type="text" name="username" id="username" value="{{ old('username') }}">
                                    @error('username')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="default-form-box mb-20 col-6">
                                    <label>Nama Lengkap <span>*</span></label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="default-form-box mb-20 col-6">
                                    <label>Nomor Telepon <span>*</span></label>
                                    <input type="text" name="phone_number" id="phone_number"
                                        value="{{ old('phone_number') }}">
                                    @error('phone_number')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="default-form-box mb-20 col-6">
                                    <label>Kata Sandi <span>*</span></label>
                                    <input type="password" name="password" id="password">
                                    @error('password')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="default-form-box mb-20 col-6">
                                    <label>Konfirmasi Kata Sandi <span>*</span></label>
                                    <input type="password" name="password_confirmation" id="password_confirmation">
                                    @error('password_confirmation')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="default-form-box mb-20 col-6">
                                    <label>Alamat <span>*</span></label>
                                    <textarea name="address" id="address" rows="1">{{ old('address') }}</textarea>
                                    @error('address')
                                        <div class="text-danger fs-6">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="login_submit">
                                <button type="submit" class="">Register</button>
                            </div>
                            <a href="/login" class="">Sudah Punya akun? Login!</a>
                        </form>
                    </div>
                </div>
                <!--register area end-->
            </div>
        </div>
    </div> <!-- ...:::: End Customer Login Section :::... -->
    <x-slot:script></x-slot:script>
    <x-slot:modal></x-slot:modal>
</x-layout>

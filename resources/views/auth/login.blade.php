<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="customer_login">
        <div class="container">
            <div class="row">
                <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form" data-aos="fade-up" data-aos-delay="0">
                        <h3>login</h3>
                        <form action="/login" method="POST">
                            @csrf
                            <div class="default-form-box mb-20">
                                <label>Username atau email <span>*</span></label>
                                <input type="text" name="email_or_username" id="email_or_username">
                                @error('email_or_username')
                                    <div class="text-danger fs-6">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="default-form-box mb-20">
                                <label>Passwords <span>*</span></label>
                                <input type="password" name="password" id="password">
                                @error('password')
                                    <div class="text-danger fs-6">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="login_submit">
                                <button class="mb-20" type="submit">login</button>
                            </div>
                            <a href="/register" class="">Tidak Punya akun? Daftar!</a>
                        </form>
                    </div>
                </div>
                <!--login area start-->
            </div>
        </div>
    </div> <!-- ...:::: End Customer Login Section :::... -->
</x-layout>

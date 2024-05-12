<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:style></x-slot:style>
    <div class="booking">
        <div class="container">
            <div class="row">
                <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form" data-aos="fade-up" data-aos-delay="0">
                        <h3>Booking</h3>
                        <form action="/member/booking" method="POST">
                            @csrf
                            <input type="hidden" name="member_id" id="member_id"
                                value="{{ auth()->user()->member->id }}">
                            <div class="default-form-box mb-20">
                                <label>Kendaraan <span>*</span></label>
                                <select name="vehicle_id" id="vehicle_id" class="w-100">
                                    <option value="" selected disabled>Pilih Kendaraan</option>
                                    @foreach ($vehicles as $vehicle)
                                        <option value="{{ $vehicle->id }}">
                                            {{ $vehicle->plate_number }} | {{ $vehicle->make }} | {{ $vehicle->model }}
                                        </option>
                                    @endforeach
                                </select>
                                <a href="/member/vehicle/create" class="text-primary fs-6">Jika Data Kendaraan Tidak
                                    Tersedia? klik di sini</a>
                                @error('vehicle_id')
                                    <div class="text-danger fs-6">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="default-form-box mb-20">
                                <label>Pilih Paket <span>*</span></label>
                                <select name="package_id" id="package_id" class="w-100">
                                    <option value="" selected disabled>Pilih Paket</option>
                                    @foreach ($packages as $package)
                                        <option value="{{ $package->id }}">{{ $package->name }}</option>
                                    @endforeach
                                </select>
                                @error('package_id')
                                    <div class="text-danger fs-6">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="default-form-box mb-20">
                                <label>Tanggal <span>*</span></label>
                                <input type="date" name="date" id="date" min="{{ date('Y-m-d') }}"
                                    max="{{ date('Y-m-d', strtotime('+1 week')) }}">
                                @error('date')
                                    <div class="text-danger fs-6">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="default-form-box mb-20">
                                <label>Waktu Tersedia <span>*</span></label>
                                {{-- <input type="time" id="timeInput" name="time" min="00:00" max="23:00"
                                    step="3600">

                                <script>
                                    document.getElementById('timeInput').addEventListener('input', function() {
                                        var timeValue = this.value;
                                        var hour = timeValue.split(':')[0];
                                        if (hour !== '00') {
                                            this.value = '00:00';
                                        }
                                    });
                                </script> --}}
                                <select name="time" id="time" class="w-100">
                                    <option value="" selected disabled>Pilih Waktu</option>
                                    @for ($hour = 0; $hour < 24; $hour++)
                                        @php
                                            $formattedHour = str_pad($hour, 2, '0', STR_PAD_LEFT);
                                            $hourPlusOne = str_pad(($hour + 1) % 24, 2, '0', STR_PAD_LEFT);
                                        @endphp
                                        <option value="{{ $formattedHour }}:00">{{ $formattedHour }}:00 -
                                            {{ $hourPlusOne }}:00</option>
                                    @endfor
                                </select>
                                @error('time')
                                    <div class="text-danger fs-6">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="login_submit" style="margin-top: 60px; text-align: right;">
                                <button class="mb-20" type="submit">Booking</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--login area start-->
                <div class="col-lg-6 col-md-6">

                    <img class="banner-img banner-img-big" src="/img/package.jpeg" alt="">
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Customer Login Section :::... -->
    <x-slot:script>
    </x-slot:script>
    <x-slot:modal></x-slot:modal>
</x-layout>

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
                        <form action="/booking" method="POST">
                            @csrf
                            <div class="default-form-box mb-20">
                                <label>Kendaraan <span>*</span></label>
                                <select name="vehicle_id" id="vehicle_id" class="w-100">
                                    <option value="" selected disabled>Pilih Kendaraan</option>
                                    @foreach ($vehicles as $vehicle)
                                        <option value="{{ $vehicle->id }}">
                                            {{ $vehicle->make }} | {{ $vehicle->plate_number }}</option>
                                    @endforeach
                                </select>
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
                                <input type="date" name="date" id="date">
                                @error('date')
                                    <div class="text-danger fs-6">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="default-form-box mb-20">
                                <label>Waktu Tersedia <span>*</span></label>
                                <select name="time" id="time" class="w-100"></select>
                                @error('time')
                                    <div class="text-danger fs-6">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="login_submit">
                                <button class="mb-20" type="submit">Booking</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--login area start-->
            </div>
        </div>
    </div> <!-- ...:::: End Customer Login Section :::... -->
    <x-slot:script></x-slot:script>
    <x-slot:modal></x-slot:modal>
</x-layout>

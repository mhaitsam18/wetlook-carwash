<x-admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:style></x-slot:style>
    <x-slot:noted></x-slot:noted>
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
                            <form class="row" action="/admin/booking" method="post" enctype="multipart/form-data">
                                <div class="col-lg-6">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="member_id" class="col-md-4 col-lg-3 col-form-label">Member</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select name="member_id"
                                                class="form-select @error('member_id') is-invalid @enderror"
                                                id="member_id">
                                                <option selected value="">Pilih Member</option>
                                                @foreach ($members as $member)
                                                    <option value="{{ $member->id }}" @selected($member->id == old('member_id'))>
                                                        {{ $member->user->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('member_id')
                                                <div class="text-danger fs-6">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-lg-3 col-form-label">Nama</label>
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
                                        <label for="vehicle_id"
                                            class="col-md-4 col-lg-3 col-form-label">Kendaraan</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select name="vehicle_id"
                                                class="form-select @error('vehicle_id') is-invalid @enderror"
                                                id="vehicle_id">
                                                <option selected value="">Pilih Kendaraan</option>
                                            </select>
                                            @error('vehicle_id')
                                                <div class="text-danger fs-6">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="package_id" class="col-md-4 col-lg-3 col-form-label">Nama
                                            Paket</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select name="package_id"
                                                class="form-select @error('package_id') is-invalid @enderror"
                                                id="package_id">
                                                <option selected value="">Pilih Paket</option>
                                                @foreach ($packages as $package)
                                                    <option
                                                        class="{{ $package->room_id == 1 ? 'bg-primary' : 'bg-success' }} bg-opacity-25"
                                                        value="{{ $package->id }}" @selected($package->id == old('package_id'))>Paket
                                                        {{ $package->room_id == 1 ? 'Mobil' : 'Motor' }} |
                                                        {{ $package->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('package_id')
                                                <div class="text-danger fs-6">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="date" class="col-md-4 col-lg-3 col-form-label">Tanggal</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="date" type="date"
                                                class="form-control @error('date') is-invalid @enderror" id="date"
                                                value="{{ old('date') }}">
                                            @error('date')
                                                <div class="text-danger fs-6">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="time" class="col-md-4 col-lg-3 col-form-label">Waktu
                                            (Jam)</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select name="time"
                                                class="form-select @error('time') is-invalid @enderror" id="time">
                                                <option selected disabled value="">Pilih Waktu</option>
                                                @for ($hour = 0; $hour < 24; $hour++)
                                                    @php
                                                        $formattedHour = str_pad($hour, 2, '0', STR_PAD_LEFT);
                                                        $hourPlusOne = str_pad(($hour + 1) % 24, 2, '0', STR_PAD_LEFT);
                                                    @endphp
                                                    <option value="{{ $formattedHour }}:00"
                                                        @selected($formattedHour . ':00:00' == old('time'))>{{ $formattedHour }}:00 -
                                                        {{ $hourPlusOne }}:00</option>
                                                @endfor
                                            </select>
                                            @error('time')
                                                <div class="text-danger fs-6">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="status" class="col-md-4 col-lg-3 col-form-label">Status</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select name="status"
                                                class="form-select @error('status') is-invalid @enderror"
                                                id="status">
                                                <option selected disabled value="">Pilih Status</option>
                                                <option value="pending" @selected('pending' == old('status'))>Pending</option>
                                                <option value="confirmed" @selected('confirmed' == old('status'))>dikonfirmasi
                                                </option>
                                                <option value="cancelled" @selected('cancelled' == old('status'))>dibatalkan
                                                </option>
                                                <option value="completed" @selected('completed' == old('status'))>Selesai</option>
                                            </select>
                                            @error('status')
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
                            </form><!-- End Profile Edit Form -->
                        </div>


                    </div>

                </div>
            </div><!-- End Top Selling -->

        </div>
    </div><!-- End Left side columns -->
    <x-slot:script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#member_id').change(function() {
                    var memberId = $(this).val();

                    // Kosongkan input name dan select vehicle_id
                    $('#name').val('');
                    $('#vehicle_id').empty().append('<option selected value="">Pilih Kendaraan</option>');

                    if (memberId) {
                        // Ajax request untuk mendapatkan nama member
                        $.ajax({
                            url: '/api/member-name/' + memberId,
                            type: 'GET',
                            success: function(data) {
                                $('#name').val(data.name);
                            }
                        });

                        // Ajax request untuk mendapatkan data kendaraan
                        $.ajax({
                            url: '/api/vehicles/' + memberId,
                            type: 'GET',
                            success: function(data) {
                                $.each(data.vehicles, function(key, vehicle) {
                                    $('#vehicle_id').append('<option value="' + vehicle.id +
                                        '">' + vehicle.model + ' | ' + vehicle
                                        .plate_number +
                                        '</option>');
                                });
                            }
                        });
                    }
                });
                $('#vehicle_id').change(function() {
                    var vehicleId = $(this).val();

                    $('#package_id').empty().append('<option selected disabled value="">Pilih Paket</option>');

                    if (vehicleId) {

                        // Ajax request untuk mendapatkan data kendaraan
                        $.ajax({
                            url: '/api/packages/' + vehicleId,
                            type: 'GET',
                            success: function(data) {
                                $.each(data.packages, function(key, package) {
                                    $('#package_id').append('<option value="' + package.id +
                                        '">' + package.name +
                                        '</option>');
                                });
                            }
                        });
                    }
                });
            });
        </script>
    </x-slot:script>
    <x-slot:modal></x-slot:modal>
</x-admin-layout>

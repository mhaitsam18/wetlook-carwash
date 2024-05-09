<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:style></x-slot:style>
    <!-- ...:::: Start Account Dashboard Section:::... -->
    <div class="account_dashboard">
        <div class="container">
            <h4>Kendaraan Saya</h4>
            <form action="/member/vehicle" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="member_id" id="member_id" value="{{ auth()->user()->member->id }}">
                <div class="row">
                    <div class="default-form-box mb-20 col-lg-6 col-sm-6">
                        <label>Plat Nomor <span>*</span></label>
                        <input type="text" name="plate_number" id="plate_number" value="{{ old('plate_number') }}"
                            placeholder="cth. A 1234 BCD">
                        @error('plate_number')
                            <div class="text-danger fs-6">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="default-form-box mb-20  col-lg-6 col-sm-6">
                        <label>Tipe Kendaraan <span>*</span></label>
                        <select name="type" id="type" class="w-100">
                            <option value="" selected disabled>Pilih tipe kendaraan</option>
                            <option value="motorcycle" @selected('motorcycle' == old('type'))>Motor</option>
                            <option value="car" @selected('car' == old('type'))>Mobil</option>
                        </select>
                        @error('type')
                            <div class="text-danger fs-6">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="default-form-box mb-20  col-lg-6 col-sm-6">
                        <label>Merek <span>*</span></label>
                        <input type="text" name="make" id="make" value="{{ old('make') }}"
                            placeholder="cth. Honda, Toyota, Custom">
                        @error('make')
                            <div class="text-danger fs-6">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="default-form-box mb-20  col-lg-6 col-sm-6">
                        <label>Model <span>*</span></label>
                        <input type="text" name="model" id="model" value="{{ old('model') }}"
                            placeholder="cth. Vario CBS 125, Vios Gen 3, Fortuner, Expander Ultimate, Custom">
                        @error('model')
                            <div class="text-danger fs-6">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="default-form-box mb-20  col-lg-6 col-sm-6">
                        <label>Warna <span>*</span></label>
                        <input type="text" name="colour" id="colour" value="{{ old('colour') }}">
                        @error('colour')
                            <div class="text-danger fs-6">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="default-form-box mb-20 col-lg-6 col-sm-6">
                        <img src="" class="img-thumbnail img-preview" style="width: 200px; max-height:500px;">
                        <label>Gambar</label>
                        <input type="file" name="image" id="image" accept="image/*" capture="camera">
                        @error('image')
                            <div class="text-danger fs-6">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
                <div class="">
                    <button type="submit" class="btn btn-danger float-right m-1">Simpan</button>
                    <a href="#" id="btnBack" class="btn btn-secondary float-right m-1">Kembali</a>
                </div>
            </form>
        </div>
    </div> <!-- ...:::: End Account Dashboard Section:::... -->
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
            document.getElementById('btnBack').addEventListener('click', function() {
                window.history.back();
            });
        </script>
    </x-slot:script>
    <x-slot:modal></x-slot:modal>
</x-layout>

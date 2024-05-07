<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <!-- ...:::: Start Error Section :::... -->
    <div class="error-section">
        <div class="container">
            <div class="row">
                <div class="error_form">
                    <h1 data-aos="fade-up" data-aos-delay="0">{{ $code }}</h1>
                    <h4 data-aos="fade-up" data-aos-delay="200">Opps! {{ $title }}</h4>
                    <p data-aos="fade-up" data-aos-delay="400">{{ $message }}</p>
                    <div class="row">
                        <div class="col-10 offset-1 col-md-6 offset-md-3">
                            {{-- <div class="default-search-style d-flex" data-aos="fade-up" data-aos-delay="600">
                                <input class="default-search-style-input-box border-around border-right-none"
                                    type="search" placeholder="Search entire store here ..." required>
                                <button class="default-search-style-input-btn" type="submit"><i
                                        class="icon-search"></i></button>
                            </div> --}}
                            <a href="/" data-aos="fade-up" data-aos-delay="800">Kembali ke beranda</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Error Section :::... -->
</x-layout>

<div class="breadcrumb-section">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div
                    class="col-12 d-flex justify-content-between justify-content-md-between  align-items-center flex-md-row flex-column">
                    <h3 class="breadcrumb-title">{{ $slot }}</h3>
                    <div class="breadcrumb-nav">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="/">Beranda</a></li>
                                {!! $headers ?? false !!}
                                {{-- @foreach ($headers as $header)
                                    <li><a href="{{ $header['href'] }}">{{ $header['slot'] }}</a></li>
                                @endforeach --}}
                                <li class="active" aria-current="page">{{ $slot }}</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

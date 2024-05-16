<x-admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:style></x-slot:style>
    {{-- <x-slot:headers>
        @foreach ($headers as $header)
            <li class="breadcrumb-item"><a href="{{ $header['href'] }}">{{ $header['slot'] }}</a></li>
        @endforeach
    </x-slot:headers> --}}
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">
            <!-- Top Selling -->
            <div class="col-12">
                <div class="card top-selling overflow-auto">

                    <div class="card-body pb-0">
                        <h5 class="card-title">Tabel {{ $title }}</h5>

                        <a href="/admin/package/create" class="btn btn-sm btn-primary d-inline m-1"><i
                                class="bi bi-plus"></i>
                            Tambah</a>

                        <table class="table table-hover table-responsive datatable" id="example1">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Paket</th>
                                    <th scope="col">Ruang</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Durasi</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($packages as $package)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td><a href="/admin/package/{{ $package->id }}"
                                                class="text-primary fw-bold">{{ $package->name }}</a></td>
                                        <td>{{ $package->room->type }}</td>
                                        <td class="fw-bold">{!! $package->description !!}</td>
                                        <td>{{ $package->duration }} Jam</td>
                                        <td>Rp.{{ number_format($package->price, 2, ',', '.') }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="/admin/package/{{ $package->id }}/edit"
                                                    class="btn btn-sm btn-success d-inline m-1"><i
                                                        class="bi bi-pencil-square"></i>
                                                    Sunting</a>
                                                <form action="/admin/package/{{ $package->id }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $package->id }}">
                                                    <button type="submit"
                                                        class="btn btn-sm btn-danger d-inline m-1 tombol-hapus"><i
                                                            class="bi bi-trash"></i> Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div><!-- End Top Selling -->

        </div>
    </div><!-- End Left side columns -->
    <x-slot:script></x-slot:script>
    <x-slot:modal></x-slot:modal>
</x-admin-layout>

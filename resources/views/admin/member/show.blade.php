<x-admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:style></x-slot:style>
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
                            <div class="col-lg-2">
                                <img src="{{ asset('storage/' . $member->user->photo) }}" alt="Profile"
                                    style="max-width: 200px;" class="my-3">
                            </div>
                            <div class="col-lg-6">
                                <h5 class="card-title">Detail {{ $title }}
                                    <a href="javascript:window.history.back();"
                                        class="btn btn-sm btn-secondary float-end">Kembali</a>
                                </h5>
                                <div class="mb-3">
                                    <div class="row mb-1">
                                        <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                                        <div class="col-lg-9 col-md-8">{{ $member->user->name }}</div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3 col-md-4 label">Username</div>
                                        <div class="col-lg-9 col-md-8">{{ $member->user->username }}</div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{ $member->user->email }}</div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3 col-md-4 label">Nomor Ponsel</div>
                                        <div class="col-lg-9 col-md-8">{{ $member->phone_number }}</div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-lg-3 col-md-4 label">Alamat</div>
                                        <div class="col-lg-9 col-md-8">{{ $member->address }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5 class="card-title">Data Kendaraan</h5>
                        <table class="table table-hover table-responsive datatable" id="example1">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Plat Nomor</th>
                                    <th scope="col">Tipe</th>
                                    <th scope="col">Merek</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">Warna</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($member->vehicles as $vehicle)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td><a
                                                href="/admin/member/{{ $vehicle->member_id }}/vehicle/{{ $vehicle->id }}"><img
                                                    src="{{ asset('storage/' . $vehicle->image) }}" alt=""></a>
                                        </td>
                                        <td><a href="/admin/member/{{ $vehicle->member_id }}/vehicle/{{ $vehicle->id }}"
                                                class="text-primary fw-bold">{{ $vehicle->plate_number }}</a></td>
                                        <td>{{ $vehicle->type == 'car' ? 'Mobil' : 'Motor' }}</td>
                                        <td>{{ $vehicle->make }}</td>
                                        <td>{{ $vehicle->model }}</td>
                                        <td>{{ $vehicle->colour }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="/admin/member/{{ $vehicle->member_id }}/vehicle/{{ $vehicle->id }}/edit"
                                                    class="btn btn-sm btn-success d-inline m-1"><i
                                                        class="bi bi-pencil-square"></i> Sunting</a>
                                                <form
                                                    action="/admin/member/{{ $vehicle->member_id }}/vehicle/{{ $vehicle->id }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $vehicle->id }}">
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

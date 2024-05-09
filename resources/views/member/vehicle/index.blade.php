<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:style></x-slot:style>
    <!-- ...:::: Start Account Dashboard Section:::... -->
    <div class="account_dashboard">
        <div class="container">
            <h4>Kendaraan Saya</h4>
            <a href="/member/vehicle/create" class="btn btn-danger btn-sm mb-3">Tambah
                Kendaraan</a>
            <div class="table_page table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Plat Nomor</th>
                            <th>Tipe Kendaraan</th>
                            <th>Merek Motor</th>
                            <th>Model</th>
                            <th>Warna</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehicles as $vehicle)
                            <tr>
                                <td style="min-width: 40px;">{{ $loop->iteration }}</td>
                                <td>{{ $vehicle->plate_number }}</td>
                                <td>{{ $vehicle->type == 'car' ? 'Mobil' : 'Motor' }}</td>
                                <td>{{ $vehicle->make }}</td>
                                <td>{{ $vehicle->model }}</td>
                                <td>{{ $vehicle->colour }}</td>
                                <td><img src="{{ asset('storage/' . $vehicle->image) }}" class="img-thumbnail"></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="/member/vehicle/{{ $vehicle->id }}/edit"
                                            class="btn btn-sm btn-success d-inline m-1">Sunting</a>
                                        <form action="/member/vehicle/{{ $vehicle->id }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $vehicle->id }}">
                                            <button type="submit"
                                                class="btn btn-sm btn-danger d-inline m-1 tombol-hapus">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- ...:::: End Account Dashboard Section:::... -->
    <x-slot:script></x-slot:script>
    <x-slot:modal></x-slot:modal>
</x-layout>

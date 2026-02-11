<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0" style="font-family: 'Playfair Display', serif; color: #2c3e50;">Daftar Villa</h2>
            <a href="{{ route('villas.create') }}" class="btn btn-villa">Tambah Villa Baru</a>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card shadow-sm border-0" style="border-top: 4px solid #8da399;">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead style="background-color: #f4f1ea;">
                                <tr>
                                    <th style="color: #2c3e50;">Nama</th>
                                    <th style="color: #2c3e50;">Lokasi</th>
                                    <th style="color: #2c3e50;">Harga/Malam</th>
                                    <th style="color: #2c3e50;">Kapasitas</th>
                                    <th style="color: #2c3e50;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($villas as $villa)
                                    <tr>
                                        <td>{{ $villa->name }}</td>
                                        <td>{{ $villa->location }}</td>
                                        <td>Rp {{ number_format($villa->price_per_night, 0, ',', '.') }}</td>
                                        <td>{{ $villa->capacity }} tamu</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('villas.edit', $villa) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('villas.destroy', $villa) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Yakin ingin menghapus villa ini?')">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">Belum ada villa.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $villas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .btn-villa {
            background-color: #8da399;
            border-color: #8da399;
            color: white;
            border-radius: 2px;
            padding: 10px 20px;
            font-family: 'Playfair Display', serif;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .btn-villa:hover {
            background-color: #6d8279;
            border-color: #6d8279;
            color: white;
        }
    </style>
</x-app-layout>
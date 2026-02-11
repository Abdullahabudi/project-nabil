<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0" style="font-family: 'Playfair Display', serif; color: #2c3e50;">Daftar Booking</h2>
            <a href="{{ route('bookings.create') }}" class="btn btn-villa">Tambah Booking Baru</a>
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
                                    <th style="color: #2c3e50;">Tamu</th>
                                    <th style="color: #2c3e50;">Villa</th>
                                    <th style="color: #2c3e50;">Check In</th>
                                    <th style="color: #2c3e50;">Check Out</th>
                                    <th style="color: #2c3e50;">Total Harga</th>
                                    <th style="color: #2c3e50;">Status</th>
                                    <th style="color: #2c3e50;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->user->name }}</td>
                                        <td>{{ $booking->villa->name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d/m/Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($booking->check_out)->format('d/m/Y') }}</td>
                                        <td>Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                                        <td>
                                            @if($booking->status === 'confirmed')
                                                <span class="badge bg-success">Dikonfirmasi</span>
                                            @elseif($booking->status === 'cancelled')
                                                <span class="badge bg-danger">Dibatalkan</span>
                                            @else
                                                <span class="badge bg-warning">Menunggu</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('bookings.edit', $booking) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('bookings.destroy', $booking) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Yakin ingin menghapus booking ini?')">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">Belum ada booking.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $bookings->links() }}
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
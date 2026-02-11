<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0" style="font-family: 'Playfair Display', serif; color: #2c3e50;">Edit Booking</h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm border-0" style="border-top: 4px solid #8da399;">
                        <div class="card-body p-4">
                            <form action="{{ route('bookings.update', $booking) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="villa_id" class="form-label villa-label">Villa</label>
                                    <select class="form-select villa-input @error('villa_id') is-invalid @enderror"
                                        id="villa_id" name="villa_id" required>
                                        <option value="">Pilih villa...</option>
                                        @foreach($villas as $villa)
                                            <option value="{{ $villa->id }}" {{ old('villa_id', $booking->villa_id) == $villa->id ? 'selected' : '' }}>
                                                {{ $villa->name }} - {{ $villa->location }} (Rp
                                                {{ number_format($villa->price_per_night, 0, ',', '.') }}/malam)
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('villa_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="check_in" class="form-label villa-label">Check In</label>
                                        <input type="date"
                                            class="form-control villa-input @error('check_in') is-invalid @enderror"
                                            id="check_in" name="check_in"
                                            value="{{ old('check_in', $booking->check_in) }}" required>
                                        @error('check_in')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="check_out" class="form-label villa-label">Check Out</label>
                                        <input type="date"
                                            class="form-control villa-input @error('check_out') is-invalid @enderror"
                                            id="check_out" name="check_out"
                                            value="{{ old('check_out', $booking->check_out) }}" required>
                                        @error('check_out')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="total_price" class="form-label villa-label">Total Harga (Rp)</label>
                                        <input type="number" step="0.01"
                                            class="form-control villa-input @error('total_price') is-invalid @enderror"
                                            id="total_price" name="total_price"
                                            value="{{ old('total_price', $booking->total_price) }}" required>
                                        @error('total_price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="status" class="form-label villa-label">Status</label>
                                        <select class="form-select villa-input @error('status') is-invalid @enderror"
                                            id="status" name="status" required>
                                            <option value="pending" {{ old('status', $booking->status) == 'pending' ? 'selected' : '' }}>Menunggu</option>
                                            <option value="confirmed" {{ old('status', $booking->status) == 'confirmed' ? 'selected' : '' }}>Dikonfirmasi</option>
                                            <option value="cancelled" {{ old('status', $booking->status) == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between mt-4">
                                    <a href="{{ route('bookings.index') }}" class="btn btn-secondary">Batal</a>
                                    <button type="submit" class="btn btn-villa">Update Booking</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .villa-label {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #888;
            margin-bottom: 8px;
        }

        .villa-input {
            border-radius: 2px;
            border: 1px solid #e0e0e0;
            padding: 12px;
            background-color: #fafafa;
        }

        .villa-input:focus {
            border-color: #8da399;
            box-shadow: none;
            background-color: #fff;
        }

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
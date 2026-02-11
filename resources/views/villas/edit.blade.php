<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0" style="font-family: 'Playfair Display', serif; color: #2c3e50;">Edit Villa</h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm border-0" style="border-top: 4px solid #8da399;">
                        <div class="card-body p-4">
                            <form action="{{ route('villas.update', $villa) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="name" class="form-label villa-label">Nama Villa</label>
                                    <input type="text"
                                        class="form-control villa-input @error('name') is-invalid @enderror" id="name"
                                        name="name" value="{{ old('name', $villa->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="location" class="form-label villa-label">Lokasi</label>
                                    <input type="text"
                                        class="form-control villa-input @error('location') is-invalid @enderror"
                                        id="location" name="location" value="{{ old('location', $villa->location) }}"
                                        required>
                                    @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="price_per_night" class="form-label villa-label">Harga per Malam
                                            (Rp)</label>
                                        <input type="number" step="0.01"
                                            class="form-control villa-input @error('price_per_night') is-invalid @enderror"
                                            id="price_per_night" name="price_per_night"
                                            value="{{ old('price_per_night', $villa->price_per_night) }}" required>
                                        @error('price_per_night')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="capacity" class="form-label villa-label">Kapasitas (tamu)</label>
                                        <input type="number"
                                            class="form-control villa-input @error('capacity') is-invalid @enderror"
                                            id="capacity" name="capacity"
                                            value="{{ old('capacity', $villa->capacity) }}" required>
                                        @error('capacity')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label villa-label">Deskripsi</label>
                                    <textarea
                                        class="form-control villa-input @error('description') is-invalid @enderror"
                                        id="description" name="description"
                                        rows="4">{{ old('description', $villa->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-between mt-4">
                                    <a href="{{ route('villas.index') }}" class="btn btn-secondary">Batal</a>
                                    <button type="submit" class="btn btn-villa">Update Villa</button>
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
@extends('layout.app')

@section('content')
    <div class="card mt-5 w-50 d-block mx-auto">
        <div class="card-header">
            <h1>Edit Paket Langganan</h1>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.subscription-packages.update', $subscriptionPackage->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{--nama paket--}}
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Paket Langganan</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $subscriptionPackage->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{--deskripsi_--}}
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi Langganan</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{ old('description', $subscriptionPackage->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{--warna oaket--}}
                <div class="mb-3">
                    <label for="color" class="form-label">Warna Paket</label>
                    <input type="color" class="form-control @error('color') is-invalid @enderror" id="color" name="color" value="{{ old('color', $subscriptionPackage->color) }}" required>
                    @error('color')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{--harga--}}
                <div class="mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" style="height: 50px" id="price" name="price" value="{{ old('price', $subscriptionPackage->price) }}" required>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.subscription-packages.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection

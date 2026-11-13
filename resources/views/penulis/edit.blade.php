@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-3">Ubah Penulis</h1>

    <form action="{{ route('penulis.update', $penulis->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" value="{{ old('name', $penulis->name) }}"
                   class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Negara (boleh kosong)</label>
            <input type="text" name="country" value="{{ old('country', $penulis->country) }}"
                   class="form-control @error('country') is-invalid @enderror">
            @error('country')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('penulis.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection
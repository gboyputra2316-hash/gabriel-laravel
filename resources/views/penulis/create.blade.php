@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3 mb-3">Tambah Penulis</h1>

    <form action="{{ route('penulis.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" value="{{ old('name') }}"
                   class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Negara (boleh kosong)</label>
            <input type="text" name="country" value="{{ old('country') }}"
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
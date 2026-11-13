@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h1 class="h3">Daftar Penulis</h1>
        <a href="{{ route('penulis.create') }}" class="btn btn-primary">Tambah Penulis</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr><th>Nama</th><th>Negara</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            @forelse ($daftarPenulis as $penulis)
                <tr>
                    <td>{{ $penulis->name }}</td>
                    <td>{{ $penulis->country ?? '-' }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('penulis.edit', $penulis->id) }}" class="btn btn-sm btn-warning">Ubah</a>
                        <form action="{{ route('penulis.destroy', $penulis->id) }}" method="POST"
                              onsubmit="return confirm('Hapus penulis ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3">Belum ada penulis.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
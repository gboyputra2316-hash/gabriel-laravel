@extends('layouts.app')

@section('title', ($buku->title ?? 'Buku tidak ditemukan') . ' — BookStore')

@section('content')
    @if ($buku)
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('images/sampul-placeholder.png') }}" class="img-fluid rounded" alt="Sampul {{ $buku->title }}">
            </div>
            <div class="col-md-8">
                <span class="badge bg-secondary mb-2">{{ $buku->category->name }}</span>
                <h1>{{ $buku->title }}</h1>
                <p class="text-muted">Penulis: {{ $buku->author_name }}</p>
                <p class="harga-buku fs-4">Rp{{ number_format($buku->price, 0, ',', '.') }}</p>
                <a href="{{ url('/buku') }}" class="btn btn-outline-secondary">&larr; Kembali ke daftar buku</a>
            </div>
        </div>
    @else
        <div class="alert alert-warning text-center">
            <h4>Buku tidak ditemukan</h4>
            <p>Buku dengan ID {{ $id }} tidak ada di dalam sistem.</p>
            <a href="{{ url('/buku') }}" class="btn btn-primary">&larr; Kembali ke daftar buku</a>
        </div>
    @endif
@endsection
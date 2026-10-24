@extends('layouts.app')

@section('title', 'Daftar Buku — BookStore')

@section('content')
    <h1 class="mb-4">Daftar Buku</h1>

    @forelse ($daftarBuku as $buku)
        @if ($loop->first)
            <div class="row row-cols-1 row-cols-md-3 g-4">
        @endif
                <div class="col">
                    <div class="card h-100 kartu-buku">
                        <img src="{{ asset('images/sampul-placeholder.png') }}" class="card-img-top" alt="Sampul {{ $buku->title }}">
                        <div class="card-body d-flex flex-column">
                            <span class="badge bg-secondary align-self-start mb-2">{{ $buku->category?->name ?? 'Tanpa kategori' }}</span>
                            <h5 class="card-title">{{ $buku->title }}</h5>
                            <p class="card-text text-muted mb-1">{{ $buku->author_name }}</p>
                            <p class="card-text harga-buku">Rp{{ number_format($buku->price, 0, ',', '.') }}</p>
                            <a href="{{ url('/buku/'.$buku->id) }}" class="btn btn-primary mt-auto">Lihat Detail</a>
                        </div>
                    </div>
                </div>
        @if ($loop->last)
            </div>
        @endif
    @empty
        <p class="text-muted">Belum ada buku yang tersedia.</p>
    @endforelse
@endsection

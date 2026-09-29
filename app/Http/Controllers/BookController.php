<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
       private array $daftarBuku = [
        1 => ['judul' => '3726 MDPL', 'penulis' => 'Nurwina Sari', 'harga' => 100000],
        2 => ['judul' => 'Laskar Pelangi', 'penulis' => 'Andrea Hirata', 'harga' => 95000],
        3 => ['judul' => 'Manusia Setengah Salmon', 'penulis' => 'Raditya Dika', 'harga' => 75000],
    ];

    public function index()
    {
        return view('buku.index', ['daftarBuku' => $this->daftarBuku]);
    }

    public function show($id)
    {
        $buku = $this->daftarBuku[$id] ?? null;
        return view('buku.show', ['buku' => $buku, 'id' => $id]);
    }
}


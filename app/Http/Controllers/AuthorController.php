<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return view('penulis.index', [
            'daftarPenulis' => Author::orderBy('name')->get(),
        ]);
    }

    public function create()
    {
        return view('penulis.create');
    }

    public function store(Request $request)
    {
        Author::create($request->only(['name', 'country']));

        return redirect()->route('penulis.index')
            ->with('success', 'Penulis berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        return view('penulis.edit', [
            'penulis' => Author::findOrFail($id),
        ]);
    }

    public function update(Request $request, string $id)
    {
        $penulis = Author::findOrFail($id);
        $penulis->update($request->only(['name', 'country']));

        return redirect()->route('penulis.index')
            ->with('success', 'Penulis berhasil diubah.');
    }

    public function destroy(string $id)
    {
        Author::findOrFail($id)->delete();

        return redirect()->route('penulis.index')
            ->with('success', 'Penulis berhasil dihapus.');
    }
}
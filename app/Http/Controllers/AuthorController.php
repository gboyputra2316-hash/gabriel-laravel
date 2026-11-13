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
        $data = $request->validate([
            'name'    => 'required|max:100|unique:authors,name',
            'country' => 'nullable|max:100',
        ], $this->pesan());

        Author::create($data);

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

        $data = $request->validate([
            'name'    => 'required|max:100|unique:authors,name,' . $penulis->id,
            'country' => 'nullable|max:100',
        ], $this->pesan());

        $penulis->update($data);

        return redirect()->route('penulis.index')
            ->with('success', 'Penulis berhasil diubah.');
    }

    public function destroy(string $id)
    {
        Author::findOrFail($id)->delete();

        return redirect()->route('penulis.index')
            ->with('success', 'Penulis berhasil dihapus.');
    }
    private function pesan(): array
    {
        return [
            'name.required' => 'Nama penulis wajib diisi.',
            'name.max'      => 'Nama penulis maksimal 100 karakter.',
            'name.unique'   => 'Nama penulis sudah terdaftar.',
            'country.max'   => 'Negara maksimal 100 karakter.',
        ];
    }
}
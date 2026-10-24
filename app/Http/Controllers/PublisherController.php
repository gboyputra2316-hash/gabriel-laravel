<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PublisherController extends Controller
{
    /**
     * Menampilkan daftar penerbit.
     * Dipanggil oleh route GET /penerbit (nama route: penerbit.index).
     */
    public function index()
    {
        return view('penerbit.index', [
            'daftarPenerbit' => Publisher::orderBy('name')->get(),
        ]);
    }

    /**
     * Menampilkan form tambah penerbit.
     * Dipanggil oleh route GET /penerbit/create (penerbit.create).
     */
    public function create()
    {
        return view('penerbit.create');
    }

    /**
     * Memvalidasi dan menyimpan penerbit baru.
     * Dipanggil oleh route POST /penerbit (penerbit.store).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:publishers,name',
            'city' => 'required|string|max:100',
        ], [
            'name.required' => 'Nama penerbit wajib diisi.',
            'name.max' => 'Nama penerbit maksimal 100 karakter.',
            'name.unique' => 'Nama penerbit ini sudah dipakai.',
            'city.required' => 'Kota wajib diisi.',
            'city.max' => 'Kota maksimal 100 karakter.',
        ]);

        Publisher::create($validated);

        return redirect()->route('penerbit.index')
            ->with('success', 'Penerbit berhasil ditambahkan.');
    }

    /**
     * Menampilkan form ubah penerbit.
     * Dipanggil oleh route GET /penerbit/{penerbit}/edit (penerbit.edit).
     */
    public function edit(string $id)
    {
        return view('penerbit.edit', [
            'penerbit' => Publisher::findOrFail($id),
        ]);
    }

    /**
     * Memvalidasi dan menyimpan perubahan penerbit.
     * Dipanggil oleh route PUT /penerbit/{penerbit} (penerbit.update).
     */
    public function update(Request $request, string $id)
    {
        $penerbit = Publisher::findOrFail($id);

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('publishers', 'name')->ignore($penerbit->id),
            ],
            'city' => 'required|string|max:100',
        ], [
            'name.required' => 'Nama penerbit wajib diisi.',
            'name.max' => 'Nama penerbit maksimal 100 karakter.',
            'name.unique' => 'Nama penerbit ini sudah dipakai.',
            'city.required' => 'Kota wajib diisi.',
            'city.max' => 'Kota maksimal 100 karakter.',
        ]);

        $penerbit->update($validated);

        return redirect()->route('penerbit.index')
            ->with('success', 'Penerbit berhasil diubah.');
    }

    /**
     * Menghapus penerbit.
     * Dipanggil oleh route DELETE /penerbit/{penerbit} (penerbit.destroy).
     *
     * Belum ada tabel yang bergantung pada publishers, jadi tidak ada
     * penolakan dari database di sini -- aturan seperti restrictOnDelete()
     * pada kategori baru relevan setelah books punya publisher_id (Pertemuan 6).
     */
    public function destroy(string $id)
    {
        $penerbit = Publisher::findOrFail($id);
        $penerbit->delete();

        return redirect()->route('penerbit.index')
            ->with('success', 'Penerbit berhasil dihapus.');
    }
}

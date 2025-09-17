<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kategoris = Kategori::when($search, function ($query, $search) {
            return $query->where('nama', 'like', "%$search%");
        })->get();

        return view('kategori.index', compact('kategoris'));
    }

    public function create()
    {
        $lastId = \App\Models\Kategori::max('id'); 
        $nextId = $lastId ? $lastId + 1 : 1;

        return view('kategori.create', compact('nextId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }
    public function edit($id)
    {
        $kategori = \App\Models\Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }


    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $kategori->update($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}

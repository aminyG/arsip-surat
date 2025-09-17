<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arsip;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $arsips = Arsip::with('kategori')
            ->when($search, function($query, $search) {
                $query->where('judul', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('arsip.index', compact('arsips', 'search'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('arsip.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:100',
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'file_pdf' => 'required|file|mimes:pdf|max:10240',
        ]);

        $path = $request->file('file_pdf')->store('arsip-pdf','public');

        Arsip::create([
            'nomor_surat' => $request->nomor_surat,
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'file_path' => $path,
        ]);

        return redirect()->route('arsip.index')->with('success','Data berhasil disimpan');
    }
    public function edit($id)
    {
        $arsip = Arsip::findOrFail($id);
        $kategoris = Kategori::all();
        return view('arsip.edit', compact('arsip', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $arsip = Arsip::findOrFail($id);

        $request->validate([
            'nomor_surat' => 'required|string|max:100',
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'file_pdf' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $data = [
            'nomor_surat' => $request->nomor_surat,
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
        ];

        if ($request->hasFile('file_pdf')) {
            $path = $request->file('file_pdf')->store('arsip-pdf', 'public');
            $data['file_path'] = $path;
        }

        $arsip->update($data);

        return redirect()->route('arsip.show', $arsip->id)
                        ->with('success', 'Data berhasil diperbarui');
    }

    public function show($id)
    {
        $arsip = Arsip::with('kategori')->findOrFail($id);
        return view('arsip.show', compact('arsip'));
    }

    public function download($id)
    {
        $arsip = Arsip::findOrFail($id);
        return response()->download(storage_path('app/public/'.$arsip->file_path));
    }

    public function destroy($id)
    {
        $arsip = Arsip::findOrFail($id);

        if ($arsip->file_path && Storage::disk('public')->exists($arsip->file_path)) {
            Storage::disk('public')->delete($arsip->file_path);
        }

        $arsip->delete();

        return redirect()->route('arsip.index')->with('success','Data berhasil dihapus');
    }
}

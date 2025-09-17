@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3>Edit Arsip Surat</h3>

        <form action="{{ route('arsip.update', $arsip->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nomor Surat</label>
                <input type="text" name="nomor_surat" value="{{ old('nomor_surat', $arsip->nomor_surat) }}"
                    class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" value="{{ old('judul', $arsip->judul) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="kategori_id" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ $arsip->kategori_id == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Ganti File (PDF)</label>
                <input type="file" name="file_pdf" class="form-control">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti file.</small>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('arsip.show', $arsip->id) }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection
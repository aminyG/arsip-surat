@extends('layouts.app')

@section('title', 'Arsipkan Surat')

@section('content')
    <h2>Arsipkan Surat</h2>
    <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan.<br>
        Catatan: Gunakan file berformat <b>PDF</b>.</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nomor_surat" class="form-label">Nomor Surat</label>
            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat') }}"
                required>
        </div>

        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori</label>
            <select class="form-select" id="kategori_id" name="kategori_id" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}" required>
        </div>

        <div class="mb-3">
            <label for="file_pdf" class="form-label">File Surat (PDF)</label>
            <input type="file" class="form-control" id="file_pdf" name="file_pdf" accept="application/pdf" required>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('arsip.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
@endsection
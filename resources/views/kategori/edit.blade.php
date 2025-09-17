@extends('layouts.app')

@section('title', 'Edit Kategori Surat')

@section('content')
    <h2>Kategori Surat >> Edit</h2>
    <p>Perbarui data kategori. Setelah selesai, klik tombol <b>Simpan</b>.</p>

    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">ID (Auto Increment)</label>
            <input type="text" class="form-control" value="{{ $kategori->id }}" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Kategori</label>
            <input type="text" name="nama" class="form-control" value="{{ $kategori->nama }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3">{{ $kategori->keterangan }}</textarea>
        </div>

        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">&laquo; Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
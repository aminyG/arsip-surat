@extends('layouts.app')

@section('title', 'Tambah Kategori Surat')

@section('content')
    <h2>Kategori Surat >> Tambah</h2>
    <p>Tambahkan kategori baru. Setelah selesai, klik tombol <b>Simpan</b>.</p>

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">ID (Auto Increment)</label>
            <input type="text" class="form-control" value="{{ $nextId }}" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Kategori</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama kategori" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3" placeholder="Masukkan keterangan kategori"></textarea>
        </div>

        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">&laquo; Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
@extends('layouts.app')

@section('title', 'Kategori Surat')

@section('content')
    <h2>Kategori Surat</h2>
    <p>Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat<br>
        Klik "Tambah" untuk menambahkan kategori baru.</p>

    <form method="GET" action="{{ route('arsip.index') }}" class="d-flex mb-3">
        <div class="input-group">
            <span class="input-group-text bg-white"><i class="fa-solid fa-magnifying-glass"></i></span>
            <input type="text" name="search" class="form-control" placeholder="Cari surat..."
                value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kategoris as $kategori)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kategori->nama }}</td>
                    <td>{{ $kategori->keterangan ?? '-' }}</td>
                    <td>
                        <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $kategori->id }}">
                                Hapus
                            </button>

                            <div class="modal fade" id="deleteModal{{ $kategori->id }}" tabindex="-1"
                                aria-labelledby="deleteModalLabel{{ $kategori->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $kategori->id }}">Konfirmasi Hapus
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus kategori
                                            <b>{{ $kategori->nama }}</b>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada kategori</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('kategori.create') }}" class="btn btn-dark">+ Tambah Kategori</a>
@endsection
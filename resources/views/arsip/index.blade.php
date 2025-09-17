@extends('layouts.app')

@section('title', 'Arsip Surat')

@section('content')
    <div class="content d-flex flex-column">
        <h2>Arsip Surat</h2>
        <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>
            Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>

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
                    <th>Nomor Surat</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Waktu Pengarsipan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($arsips as $arsip)
                    <tr>
                        <td>{{ $arsip->nomor_surat }}</td>
                        <td>{{ $arsip->kategori->nama ?? '-' }}</td>
                        <td>{{ $arsip->judul }}</td>
                        <td>{{ $arsip->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <form action="{{ route('arsip.destroy', $arsip->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $arsip->id }}">
                                    Hapus
                                </button>
                                <div class="modal fade" id="deleteModal{{ $arsip->id }}" tabindex="-1"
                                    aria-labelledby="deleteModalLabel{{ $arsip->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $arsip->id }}">Konfirmasi Hapus
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Tutup"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus arsip <b>{{ $arsip->judul }}</b>?
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
                            <a href="{{ route('arsip.download', $arsip->id) }}" class="btn btn-warning btn-sm">Unduh</a>
                            <a href="{{ route('arsip.show', $arsip->id) }}" class="btn btn-primary btn-sm">Lihat >></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada arsip</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <a href="{{ route('arsip.create') }}" class="btn btn-dark mt-2">Arsipkan Surat..</a>

        <div class="mt-3">
            {{ $arsips->withQueryString()->links() }}
        </div>
    </div>
@endsection
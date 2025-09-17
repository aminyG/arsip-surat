@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3>Arsip Surat >> Lihat</h3>

        <div class="card mt-3">
            <div class="card-body">
                <p><strong>Nomor:</strong> {{ $arsip->nomor_surat }}</p>
                <p><strong>Kategori:</strong> {{ $arsip->kategori->nama ?? '-' }}</p>
                <p><strong>Judul:</strong> {{ $arsip->judul }}</p>
                <p><strong>Waktu Unggah:</strong> {{ $arsip->created_at->format('Y-m-d H:i') }}</p>

                <div class="mt-3" style="border: 1px solid #ddd; padding: 5px;">
                    <embed src="{{ asset('storage/' . $arsip->file_path) }}" type="application/pdf" width="100%"
                        height="500px" />
                </div>

                <div class="mt-4 d-flex justify-content-start gap-2">
                    <a href="{{ route('arsip.index') }}" class="btn btn-secondary">
                        << Kembali</a>
                            <a href="{{ route('arsip.download', $arsip->id) }}" class="btn btn-success">Unduh</a>
                            <a href="{{ route('arsip.edit', $arsip->id) }}" class="btn btn-warning">Edit/Ganti File</a>
                           
                </div>
            </div>
        </div>
    </div>
@endsection
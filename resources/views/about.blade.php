@extends('layouts.app')

@section('content')
    <div class="about-page d-flex align-items-start gap-4">
        <div class="about-photo">
            <img src="{{ $about['foto'] }}" alt="Foto Profil">
        </div>
        <div class="about-info">
            <h1>About</h1>
            <p><strong>Nama:</strong> {{ $about['nama'] }}</p>
            <p><strong>Prodi:</strong> {{ $about['prodi'] }}</p>
            <p><strong>NIM:</strong> {{ $about['nim'] }}</p>
            <p><strong>Tanggal:</strong> {{ $about['tanggal'] }}</p>
        </div>
    </div>
@endsection
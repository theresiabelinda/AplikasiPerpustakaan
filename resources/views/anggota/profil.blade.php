@extends('layouts.app')

@section('title', 'Profil Anggota')

@section('content')

    <div class="card">
        <h2>Profil Saya</h2>

        <form action="{{ route('anggota.profil.update') }}" method="POST">
            @csrf

            <label>Nama</label>
            <input type="text" name="nama" value="{{ $anggota->nama }}">

            <label>Email</label>
            <input type="email" name="email" value="{{ $anggota->email }}">

            <label>Password Baru</label>
            <input type="password" name="password">

            <button type="submit">Update Profil</button>
        </form>
    </div>

@endsection

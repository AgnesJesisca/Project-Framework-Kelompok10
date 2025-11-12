@extends('adminlte::page')

@section('title', 'Detail Warga')

@section('content_header')
    <h1>Detail Warga</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p><strong>No KTP:</strong> {{ $warga->no_ktp }}</p>
            <p><strong>Nama:</strong> {{ $warga->nama }}</p>
            <p><strong>Jenis Kelamin:</strong> {{ $warga->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
            <p><strong>Agama:</strong> {{ $warga->agama }}</p>
            <p><strong>Pekerjaan:</strong> {{ $warga->pekerjaan }}</p>
            <p><strong>Telp:</strong> {{ $warga->telp }}</p>
            <p><strong>Email:</strong> {{ $warga->email }}</p>
            <a href="{{ route('warga.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
@stop

@extends('adminlte::page')

@section('title', 'Tambah Data Warga')

@section('content_header')
    <h1>Tambah Data Warga</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('warga.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="no_ktp">No KTP</label>
                    <input type="text" name="no_ktp" id="no_ktp"
                           class="form-control @error('no_ktp') is-invalid @enderror"
                           value="{{ old('no_ktp') }}" required>
                    @error('no_ktp')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama"
                           class="form-control @error('nama') is-invalid @enderror"
                           value="{{ old('nama') }}" required>
                    @error('nama')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin"
                            class="form-control @error('jenis_kelamin') is-invalid @enderror" required>
                        <option value="">-- Pilih --</option>
                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="agama">Agama</label>
                    <input type="text" name="agama" id="agama"
                           class="form-control @error('agama') is-invalid @enderror"
                           value="{{ old('agama') }}">
                    @error('agama')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="text" name="pekerjaan" id="pekerjaan"
                           class="form-control @error('pekerjaan') is-invalid @enderror"
                           value="{{ old('pekerjaan') }}">
                    @error('pekerjaan')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telp">Telepon</label>
                    <input type="text" name="telp" id="telp"
                           class="form-control @error('telp') is-invalid @enderror"
                           value="{{ old('telp') }}">
                    @error('telp')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('warga.index') }}" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@stop

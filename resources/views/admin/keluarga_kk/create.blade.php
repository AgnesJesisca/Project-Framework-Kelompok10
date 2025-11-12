@extends('adminlte::page')

@section('title', 'Tambah Keluarga KK')

@section('content_header')
    <h1>Tambah Keluarga KK</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">
                <i class="fas fa-fw fa-home"></i>
            </a>
        </li>
        <li class="breadcrumb-item"><a href="{{ route('keluarga_kk.index') }}">Keluarga KK</a></li>
        <li class="breadcrumb-item active">Tambah</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Tambah Data Keluarga</h3>
                    <p class="card-subtitle mb-0">Form untuk menambahkan data Keluarga baru.</p>
                </div>

                <form action="{{ route('keluarga_kk.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kk_nomor">Nomor KK <span class="text-danger">*</span></label>
                                    <input type="text"
                                           class="form-control @error('kk_nomor') is-invalid @enderror"
                                           id="kk_nomor"
                                           name="kk_nomor"
                                           value="{{ old('kk_nomor') }}"
                                           placeholder="Masukkan Nomor KK"
                                           required>
                                    @error('kk_nomor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kepala_keluarga_warga_id">Kepala Keluarga (ID Warga) <span class="text-danger">*</span></label>
                                    <input type="text"
                                           class="form-control @error('kepala_keluarga_warga_id') is-invalid @enderror"
                                           id="kepala_keluarga_warga_id"
                                           name="kepala_keluarga_warga_id"
                                           value="{{ old('kepala_keluarga_warga_id') }}"
                                           placeholder="Masukkan ID Warga"
                                           required>
                                    @error('kepala_keluarga_warga_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat <span class="text-danger">*</span></label>
                            <textarea name="alamat"
                                      id="alamat"
                                      class="form-control @error('alamat') is-invalid @enderror"
                                      rows="3"
                                      placeholder="Masukkan Alamat Lengkap"
                                      required>{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rt">RT <span class="text-danger">*</span></label>
                                    <input type="text"
                                           class="form-control @error('rt') is-invalid @enderror"
                                           id="rt"
                                           name="rt"
                                           value="{{ old('rt') }}"
                                           placeholder="Contoh: 001"
                                           required>
                                    @error('rt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rw">RW <span class="text-danger">*</span></label>
                                    <input type="text"
                                           class="form-control @error('rw') is-invalid @enderror"
                                           id="rw"
                                           name="rw"
                                           value="{{ old('rw') }}"
                                           placeholder="Contoh: 002"
                                           required>
                                    @error('rw')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Data
                        </button>
                        <a href="{{ route('keluarga_kk.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .card-header {
            border-bottom: 1px solid #dee2e6;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .text-danger {
            color: #dc3545;
        }
    </style>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            // Validasi input numerik
            $('#kk_nomor').on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });

            $('#kepala_keluarga_warga_id').on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });

            $('#rt, #rw').on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        });
    </script>
@stop

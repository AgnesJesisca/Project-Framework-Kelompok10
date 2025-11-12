@extends('adminlte::page')

@section('title', 'Edit Data Keluarga KK')

@section('content_header')
    <h1>Edit Data Keluarga KK</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">
                <i class="fas fa-fw fa-home"></i>
            </a>
        </li>
        <li class="breadcrumb-item"><a href="{{ route('keluarga_kk.index') }}">Keluarga KK</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Keluarga</h3>
                    <p class="card-subtitle mb-0">Ubah data keluarga sesuai kebutuhan</p>
                </div>

                <form action="{{ route('keluarga_kk.update', $dataKeluarga_kk->kk_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kk_nomor">Nomor KK <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="kk_nomor"
                                           id="kk_nomor"
                                           class="form-control @error('kk_nomor') is-invalid @enderror"
                                           value="{{ old('kk_nomor', $dataKeluarga_kk->kk_nomor) }}"
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
                                    <label for="kepala_keluarga_warga_id">ID Kepala Keluarga <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="kepala_keluarga_warga_id"
                                           id="kepala_keluarga_warga_id"
                                           class="form-control @error('kepala_keluarga_warga_id') is-invalid @enderror"
                                           value="{{ old('kepala_keluarga_warga_id', $dataKeluarga_kk->kepala_keluarga_warga_id) }}"
                                           placeholder="Masukkan ID Kepala Keluarga"
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
                                      required>{{ old('alamat', $dataKeluarga_kk->alamat) }}</textarea>
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
                                           name="rt"
                                           id="rt"
                                           class="form-control @error('rt') is-invalid @enderror"
                                           value="{{ old('rt', $dataKeluarga_kk->rt) }}"
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
                                           name="rw"
                                           id="rw"
                                           class="form-control @error('rw') is-invalid @enderror"
                                           value="{{ old('rw', $dataKeluarga_kk->rw) }}"
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
                            <i class="fas fa-save"></i> Update Data
                        </button>
                        <a href="{{ route('keluarga_kk.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Batal
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
        .card-subtitle {
            font-size: 0.875rem;
            color: #6c757d;
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

            // Toast untuk notifikasi
            @if(session('success'))
                toastr.success('{{ session('success') }}');
            @endif

            @if($errors->any())
                toastr.error('Terjadi kesalahan dalam pengisian form.');
            @endif
        });
    </script>
@stop

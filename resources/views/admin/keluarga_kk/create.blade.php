@extends('adminlte::page')

@section('title', 'Tambah Keluarga KK')

@section('content')
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('keluarga_kk.index') }}">Keluarga KK</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Keluarga KK</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Tambah Keluarga KK</h1>
                <p class="mb-0">Form untuk menambahkan data Keluarga baru.</p>
            </div>
            <div>
                <a href="{{ route('keluarga_kk.index') }}" class="btn btn-primary"><i class="far fa-question-circle me-1"></i> Kembali</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <form action="{{ route('keluarga_kk.store') }}" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-lg-4 col-sm-6">
                                <div class="mb-3">
                                    <label for="kk_nomor" class="form-label">Nomor KK</label>
                                    <input name="kk_nomor" type="text" id="kk_nomor" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6">
                                <div class="mb-3">
                                    <label for="kepala_keluarga_warga_id" class="form-label">Kepala Keluarga (ID)</label>
                                    <input name="kepala_keluarga_warga_id" type="text" id="kepala_keluarga_warga_id" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input name="alamat" type="text" id="alamat" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-2 col-sm-6">
                                <div class="mb-3">
                                    <label for="rt" class="form-label">RT</label>
                                    <input name="rt" type="text" id="rt" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-2 col-sm-6">
                                <div class="mb-3">
                                    <label for="rw" class="form-label">RW</label>
                                    <input name="rw" type="text" id="rw" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

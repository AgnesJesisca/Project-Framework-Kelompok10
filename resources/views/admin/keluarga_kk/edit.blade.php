<!--

=========================================================
* Volt Pro - Premium Bootstrap 5 Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2021 Themesberg (https://www.themesberg.com)
* License (https://themesberg.com/licensing)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal.

-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Edit Data Keluarga KK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Start CSS -->
    @include('layouts.admin.css')
    <!-- End CSS -->
</head>

<body>
    <!-- Start Sidebar -->
    @include('layouts.admin.sidebar')
    <!-- End Sidebar -->

    <main class="content">
        <!-- Start Header -->
        @include('layouts.admin.header')
        <!-- End Header -->

        @extends('layouts.admin.app')

        @section('content')
        <!-- Start Main Content -->
        <div class="py-4">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('keluarga_kk.index') }}">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6" />
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('keluarga_kk.index') }}">Keluarga KK</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>

            <div class="d-flex justify-content-between w-100 flex-wrap mb-3">
                <div>
                    <h1 class="h4">Edit Data Keluarga</h1>
                    <p class="mb-0">Ubah data keluarga sesuai kebutuhan</p>
                </div>
            </div>

            <div class="card border-0 shadow mb-4">
                <div class="card-body">
                    <form action="{{ route('keluarga_kk.update', $dataKeluarga_kk->kk_id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="kk_nomor" class="form-label">Nomor KK</label>
                            <input type="text" name="kk_nomor" id="kk_nomor" class="form-control"
                                value="{{ $dataKeluarga_kk->kk_nomor }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="kepala_keluarga_warga_id" class="form-label">ID Kepala Keluarga</label>
                            <input type="text" name="kepala_keluarga_warga_id" id="kepala_keluarga_warga_id"
                                class="form-control" value="{{ $dataKeluarga_kk->kepala_keluarga_warga_id }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" rows="2" required>{{ $dataKeluarga_kk->alamat }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="rt" class="form-label">RT</label>
                                <input type="text" name="rt" id="rt" class="form-control"
                                    value="{{ $dataKeluarga_kk->rt }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="rw" class="form-label">RW</label>
                                <input type="text" name="rw" id="rw" class="form-control"
                                    value="{{ $dataKeluarga_kk->rw }}" required>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('keluarga_kk.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Main Content -->
        @endsection

        <!-- Start Footer -->
        @include('layouts.admin.footer')
        <!-- End Footer -->
    </main>

    <!-- Start JS -->
    @include('layouts.admin.js')
    <!-- End JS -->
</body>
</html>
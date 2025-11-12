@extends('adminlte::page')

@section('title', 'Data Keluarga')

@section('content_header')
    <h1>Data Keluarga</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-fw fa-home"></i></a></li>
        <li class="breadcrumb-item active">Keluarga</li>
    </ol>
@stop

@section('content')
   <!-- Start Main Content -->
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
                    <li class="breadcrumb-item"><a href="#">Keluarga KK</a></li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Data Keluarga</h1>
                    <p class="mb-0">List data seluruh Keluarga</p>
                </div>
                <div>
                    <a href="{{ route('keluarga_kk.create') }}" class="btn btn-success text-white">
                        <i class="far fa-question-circle me-1"></i> Tambah Keluarga
                    </a>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-keluarga_kk" class="table table-centered table-nowrap mb-0 rounded">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="border-0">Nomor KK</th>
                                        <th class="border-0">Kepala Keluarga (ID)</th>
                                        <th class="border-0">Alamat</th>
                                        <th class="border-0">RT</th>
                                        <th class="border-0">RW</th>
                                        <th class="border-0 rounded-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataKeluarga_kk as $item)
                                        <tr>
                                            <td>{{ $item->kk_nomor }}</td>
                                            <td>{{ $item->kepala_keluarga_warga_id }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->rt }}</td>
                                            <td>{{ $item->rw }}</td>
                                            <td>
                                                <a href="{{ route('keluarga_kk.edit', $item->kk_id) }}" class="btn btn-info btn-sm">Edit</a>
                                                <form action="{{ route('keluarga_kk.destroy', $item) }}" method="POST" style="display:inline">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Content -->
@stop

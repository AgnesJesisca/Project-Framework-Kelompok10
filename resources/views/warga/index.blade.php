@extends('adminlte::page')

@section('title', 'Data Warga')

@section('content_header')
    <h1>Data Warga</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{ route('warga.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Warga
            </a>
        </div>

        <div class="card-body table-responsive">
            <table id="crudTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="50">ID</th>
                        <th>No KTP</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Pekerjaan</th>
                        <th>Telp</th>
                        <th>Email</th>
                        <th width="130">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($warga as $item)
                        <tr>
                            <td>{{ $item->warga_id }}</td>
                            <td>{{ $item->no_ktp }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>
                                @if($item->jenis_kelamin === 'L')
                                    Laki-laki
                                @elseif($item->jenis_kelamin === 'P')
                                    Perempuan
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>{{ $item->agama ?? '-' }}</td>
                            <td>{{ $item->pekerjaan ?? '-' }}</td>
                            <td>{{ $item->telp ?? '-' }}</td>
                            <td>{{ $item->email ?? '-' }}</td>
                            <td>
                                <a href="{{ route('warga.show', $item) }}" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('warga.edit', $item) }}" class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('warga.destroy', $item) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="9" class="text-center">Belum ada data warga</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{-- pagination dari Laravel --}}
            {{ $warga->links() }}
        </div>
    </div>
@stop

@section('js')
    <script>
        $(function () {
            $('#crudTable').DataTable({
                "paging": false, // gunakan pagination dari Laravel, bukan DataTable
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": true,
                "info": false,
                "searching": true
            });
        });
    </script>
@stop

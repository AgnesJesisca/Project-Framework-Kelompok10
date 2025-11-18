@extends('layouts.admin.app')
@section('title','Data Keluarga')
@section('content')
<div class="px-6 py-6">
    <div>
        <nav class="text-sm text-white/80 mb-1">Pages / <span class="font-semibold text-white">Keluarga</span></nav>
        <h1 class="text-2xl font-bold text-white">Data Keluarga</h1>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow mt-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl">List Keluarga</h2>
            <a href="{{ route('keluarga_kk.create') }}" class="bg-[#6c63ff] text-white px-4 py-2 rounded">+ Tambah Keluarga</a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead><tr class="bg-gray-100">
                    <th class="p-3 border">KK ID</th>
                    <th class="p-3 border">Nomor KK</th>
                    <th class="p-3 border">Kepala Keluarga</th>
                    <th class="p-3 border">Alamat</th>
                    <th class="p-3 border">Aksi</th>
                </tr></thead>
                <tbody>
                    @forelse($data as $item)
                    <tr class="border">
                        <td class="p-3">{{ $item->kk_id }}</td>
                        <td class="p-3">{{ $item->kk_nomor }}</td>
                        <td class="p-3">{{ optional($item->kepalaKeluarga)->nama ?? '-' }}</td>
                        <td class="p-3">{{ $item->alamat ?? '-' }}</td>
                        <td class="p-3 flex gap-2">
                            <a href="{{ route('keluarga_kk.show',$item) }}" class="px-3 py-1 bg-blue-500 text-white rounded">Lihat</a>
                            <a href="{{ route('keluarga_kk.edit',$item) }}" class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</a>
                            <form action="{{ route('keluarga_kk.destroy',$item) }}" method="POST" onsubmit="return confirm('Hapus?')">
                                @csrf @method('DELETE')
                                <button class="px-3 py-1 bg-red-500 text-white rounded">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="p-4 text-center">Belum ada keluarga</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">{{ $data->links() }}</div>
    </div>
</div>
@endsection

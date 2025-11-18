@extends('layouts.admin.app')
@section('title','Detail Keluarga')

@section('content')
<div class="px-6 py-6">
    <div>
        <nav class="text-sm text-white/80 mb-1">
            Pages / Keluarga / <span class="font-semibold text-white">Detail</span>
        </nav>
        <h1 class="text-2xl font-bold text-white">Detail Keluarga</h1>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow mt-8">
        <h2 class="text-xl font-bold">KK {{ $kk->kk_nomor }}</h2>
        <p class="text-gray-700">Kepala: {{ optional($kk->kepalaKeluarga)->nama ?? '-' }}</p>
        <p class="text-gray-700">Alamat: {{ $kk->alamat ?? '-' }}</p>

        <hr class="my-4">

        <h3 class="font-semibold">Anggota Keluarga</h3>
        <div class="mt-3 space-y-2">
            @foreach($kk->anggota as $anggota)
                <div class="flex justify-between items-center p-3 border rounded">
                    <div>
                        <div class="font-semibold">
                            {{ optional($anggota->warga)->nama ?? '-' }}
                        </div>
                        <div class="text-sm text-gray-500">
                            {{ optional($anggota->warga)->no_ktp ?? '-' }} —
                            {{ $anggota->hubungan ?? '-' }}
                        </div>
                    </div>

                    <form action="{{ route('anggota-keluarga.destroy', $anggota->anggota_id) }}"
                          method="POST" onsubmit="return confirm('Hapus anggota?')">
                        @csrf
                        @method('DELETE')
                        <button class="px-3 py-1 bg-red-500 text-white rounded">Hapus</button>
                    </form>
                </div>
            @endforeach
        </div>

        <hr class="my-4">

        <h3 class="font-semibold">Tambah Anggota</h3>
        <form action="{{ route('anggota_keluarga.store') }}" method="POST"
              class="mt-3 grid grid-cols-1 md:grid-cols-3 gap-3">
            @csrf

            <input type="hidden" name="kk_id" value="{{ $kk->kk_id }}">

            <select name="warga_id" class="border rounded px-3 py-2">
                <option value="">-- Pilih Warga --</option>
                @foreach(\App\Models\Warga::orderBy('nama')->get() as $w)
                    <option value="{{ $w->warga_id }}">
                        {{ $w->nama }} ({{ $w->no_ktp }})
                    </option>
                @endforeach
            </select>

            <input name="hubungan" placeholder="Hubungan (mis: Istri)"
                   class="border rounded px-3 py-2">

            <button class="bg-[#6c63ff] text-white px-4 py-2 rounded">
                Tambah
            </button>
        </form>

        <div class="mt-6">
            <a href="{{ route('keluarga_kk.index') }}" class="bg-gray-200 px-4 py-2 rounded">
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection

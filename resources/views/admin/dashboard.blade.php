@extends('layouts.admin.app')
@section('title', 'Dashboard')

@section('content')
<div class="px-6 py-6">

    {{-- Breadcrumb --}}
    <nav class="text-sm text-white/70 mb-2">
        Pages / <span class="font-semibold text-white">Dashboard</span>
    </nav>

    {{-- Heading --}}
    <h1 class="text-3xl font-bold text-white mb-6">Dashboard</h1>

    {{-- Summary Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- Total Warga --}}
        <div class="bg-white p-6 rounded-2xl shadow flex items-center gap-4">
            <div class="bg-blue-100 text-blue-600 p-4 rounded-xl">
                <i class="ri-group-fill text-3xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Total Warga</p>
                <p class="text-2xl font-bold">{{ $totalWarga }}</p>
            </div>
        </div>

        {{-- Total KK --}}
        <div class="bg-white p-6 rounded-2xl shadow flex items-center gap-4">
            <div class="bg-purple-100 text-purple-600 p-4 rounded-xl">
                <i class="ri-home-3-fill text-3xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Total Kartu Keluarga</p>
                <p class="text-2xl font-bold">{{ $totalKK }}</p>
            </div>
        </div>

        {{-- Total Media --}}
        <div class="bg-white p-6 rounded-2xl shadow flex items-center gap-4">
            <div class="bg-yellow-100 text-yellow-600 p-4 rounded-xl">
                <i class="ri-file-image-fill text-3xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Total Media</p>
                <p class="text-2xl font-bold">{{ $totalMedia }}</p>
            </div>
        </div>

    </div>

    {{-- Recent Data Section --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">

        {{-- Recent Warga --}}
        <div class="bg-white p-6 rounded-2xl shadow">
            <h2 class="text-xl font-semibold mb-3">Warga Terbaru</h2>

            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b text-gray-500">
                        <th class="text-left py-2">Nama</th>
                        <th class="text-left">NIK</th>
                        <th class="text-left">Created</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($latestWarga as $w)
                    <tr class="border-b">
                        <td class="py-2">{{ $w->nama }}</td>
                        <td>{{ $w->no_ktp }}</td>
                        <td>{{ $w->created_at->format('d M Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Recent KK --}}
        <div class="bg-white p-6 rounded-2xl shadow">
            <h2 class="text-xl font-semibold mb-3">KK Terbaru</h2>

            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b text-gray-500">
                        <th class="text-left py-2">No KK</th>
                        <th class="text-left">Kepala Keluarga</th>
                        <th class="text-left">Created</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($latestKK as $kk)
                    <tr class="border-b">
                        <td class="py-2">{{ $kk->kk_nomor }}</td>
                        <td>{{ optional($kk->kepalaKeluarga)->nama }}</td>
                        <td>{{ $kk->created_at->format('d M Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</div>
@endsection

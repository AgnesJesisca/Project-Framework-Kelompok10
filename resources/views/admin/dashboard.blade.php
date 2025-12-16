@extends('layouts.admin.app')
@section('title', 'Dashboard')

@section('content')
<div class="px-6 py-6">

    {{-- Breadcrumb --}}
    <nav class="text-sm text-white/70 mb-2">
        Pages / <span class="font-semibold text-white">Dashboard</span>
    </nav>

    <h1 class="text-3xl font-bold text-white mb-8">Dashboard</h1>

    {{-- ================= TOTAL SUMMARY ================= --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        @php
            $cards = [
                ['label'=>'Warga','icon'=>'ri-group-fill','color'=>'blue','value'=>$totalWarga],
                ['label'=>'Kartu Keluarga','icon'=>'ri-home-3-fill','color'=>'purple','value'=>$totalKK],
                ['label'=>'Anggota','icon'=>'ri-team-fill','color'=>'indigo','value'=>$totalAnggota],
                ['label'=>'Media','icon'=>'ri-image-fill','color'=>'yellow','value'=>$totalMedia],
                ['label'=>'Kelahiran','icon'=>'ri-baby-fill','color'=>'pink','value'=>$totalKelahiran],
                ['label'=>'Kematian','icon'=>'ri-skull-fill','color'=>'gray','value'=>$totalKematian],
                ['label'=>'Pindah','icon'=>'ri-truck-fill','color'=>'green','value'=>$totalPindah],
            ];
        @endphp

        @foreach($cards as $i => $c)
        <div class="bg-white p-6 rounded-2xl shadow flex items-center gap-4
                    transition hover:-translate-y-1 hover:shadow-xl"
             style="animation: fadeUp .6s ease forwards; animation-delay: {{ $i * .1 }}s; opacity:0">
            <div class="bg-{{ $c['color'] }}-100 text-{{ $c['color'] }}-600 p-4 rounded-xl">
                <i class="{{ $c['icon'] }} text-3xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Total {{ $c['label'] }}</p>
                <p class="text-3xl font-extrabold counter" data-target="{{ $c['value'] }}">0</p>
            </div>
        </div>
        @endforeach
    </div>

    {{-- ================= GRAFIK ================= --}}
    <div class="bg-white rounded-2xl shadow p-6 mt-10">
        <h2 class="font-semibold text-lg mb-4">Statistik Penduduk</h2>
        <canvas id="dashboardChart" height="100"></canvas>
    </div>

    {{-- ================= LATEST DATA ================= --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-10">

        @php
            function latestCard($icon, $color) {
                return "w-10 h-10 rounded-xl bg-$color-100 text-$color-600 flex items-center justify-center";
            }
        @endphp

        {{-- WARGA --}}
        <div class="bg-white rounded-2xl shadow p-6">
            <h2 class="font-semibold text-lg mb-4">Warga Terbaru</h2>
            <div class="space-y-4">
                @foreach($latestWarga as $w)
                <div class="flex justify-between items-center p-3 rounded-xl hover:bg-gray-50">
                    <div class="flex items-center gap-4">
                        <div class="{{ latestCard('ri-user-3-fill','blue') }}">
                            <i class="ri-user-3-fill"></i>
                        </div>
                        <div>
                            <p class="font-medium">{{ $w->nama }}</p>
                            <p class="text-sm text-gray-500">{{ $w->no_ktp }}</p>
                        </div>
                    </div>
                    <span class="text-sm text-gray-400">{{ $w->created_at?->format('d M Y') }}</span>
                </div>
                @endforeach
            </div>
        </div>

        {{-- KK --}}
        <div class="bg-white rounded-2xl shadow p-6">
            <h2 class="font-semibold text-lg mb-4">KK Terbaru</h2>
            <div class="space-y-4">
                @foreach($latestKK as $kk)
                <div class="flex justify-between items-center p-3 rounded-xl hover:bg-gray-50">
                    <div class="flex items-center gap-4">
                        <div class="{{ latestCard('ri-home-3-fill','purple') }}">
                            <i class="ri-home-3-fill"></i>
                        </div>
                        <div>
                            <p class="font-medium">{{ $kk->kk_nomor }}</p>
                            <p class="text-sm text-gray-500">{{ optional($kk->kepalaKeluarga)->nama }}</p>
                        </div>
                    </div>
                    <span class="text-sm text-gray-400">{{ $kk->created_at?->format('d M Y') }}</span>
                </div>
                @endforeach
            </div>
        </div>

        {{-- KELAHIRAN --}}
        <div class="bg-white rounded-2xl shadow p-6">
            <h2 class="font-semibold text-lg mb-4">Kelahiran Terbaru</h2>
            <div class="space-y-4">
                @foreach($latestKelahiran as $k)
                <div class="flex justify-between items-center p-3 rounded-xl hover:bg-gray-50">
                    <div class="flex items-center gap-4">
                        <div class="{{ latestCard('ri-baby-fill','pink') }}">
                            <i class="ri-baby-fill"></i>
                        </div>
                        <div>
                            <p class="font-medium">{{ optional($k->warga)->nama }}</p>
                            <p class="text-sm text-gray-500">{{ $k->tanggal_lahir }}</p>
                        </div>
                    </div>
                    <span class="text-sm text-gray-400">{{ $k->created_at?->format('d M Y') }}</span>
                </div>
                @endforeach
            </div>
        </div>

        {{-- PINDAH --}}
        <div class="bg-white rounded-2xl shadow p-6">
            <h2 class="font-semibold text-lg mb-4">Pindah Terbaru</h2>
            <div class="space-y-4">
                @foreach($latestPindah as $p)
                <div class="flex justify-between items-center p-3 rounded-xl hover:bg-gray-50">
                    <div class="flex items-center gap-4">
                        <div class="{{ latestCard('ri-truck-fill','green') }}">
                            <i class="ri-truck-fill"></i>
                        </div>
                        <div>
                            <p class="font-medium">{{ optional($p->warga)->nama }}</p>
                            <p class="text-sm text-gray-500">{{ $p->alamat_tujuan }}</p>
                        </div>
                    </div>
                    <span class="text-sm text-gray-400">{{ $p->created_at?->format('d M Y') }}</span>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

{{-- ================= SCRIPT ================= --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", () => {

    // COUNTER
    document.querySelectorAll(".counter").forEach(counter => {
        const target = +counter.dataset.target;
        let i = 0;
        const step = target / 40;
        const interval = setInterval(() => {
            i += step;
            counter.innerText = Math.floor(i);
            if (i >= target) {
                counter.innerText = target;
                clearInterval(interval);
            }
        }, 30);
    });

    // CHART
    new Chart(document.getElementById('dashboardChart'), {
        type: 'bar',
        data: {
            labels: ['Warga','KK','Anggota','Media','Kelahiran','Kematian','Pindah'],
            datasets: [{
                label: 'Total Data',
                data: [
                    {{ $totalWarga }},
                    {{ $totalKK }},
                    {{ $totalAnggota }},
                    {{ $totalMedia }},
                    {{ $totalKelahiran }},
                    {{ $totalKematian }},
                    {{ $totalPindah }},
                ],
                backgroundColor: '#6366f1',
                borderRadius: 10
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } }
        }
    });
});
</script>

<style>
@keyframes fadeUp {
    from { opacity:0; transform:translateY(12px) }
    to { opacity:1; transform:translateY(0) }
}
</style>
@endsection

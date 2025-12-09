<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\Keluarga_kk;
use App\Models\Media;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalWarga' => Warga::count(),
            'totalKK' => Keluarga_kk::count(),
            'totalMedia' => Media::count(),

            'latestWarga' => Warga::latest()->take(5)->get(),
            'latestKK' => Keluarga_kk::with('kepalaKeluarga')->latest()->take(5)->get(),
        ]);
    }
}

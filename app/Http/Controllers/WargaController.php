<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WargaController extends Controller
{
    public function index(Request $request): View
    {
        try {
            $query = Warga::query();

            // Search functionality
            if ($request->has('search') && $request->search) {
                $query->search($request->search);
            }

            // Filter by status
            if ($request->has('status') && $request->status) {
                $query->where('status_kependudukan', $request->status);
            }

            // Filter by RT/RW
            if ($request->has('rt') && $request->rt) {
                $query->where('rt', $request->rt);
            }

            if ($request->has('rw') && $request->rw) {
                $query->where('rw', $request->rw);
            }

            $warga = $query->orderBy('nama_lengkap', 'asc')->paginate(15);
            
            return view('warga.index', compact('warga'));
        } catch (\Exception $e) {
            $warga = collect();
            return view('warga.index', compact('warga'));
        }
    }

    public function create(): View
    {
        return view('warga.create');
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'nik' => ['required', 'string', 'size:16', 'unique:warga,nik'],
                'nama_lengkap' => ['required', 'string', 'max:100'],
                'nama_panggilan' => ['nullable', 'string', 'max:50'],
                'jenis_kelamin' => ['required', 'in:L,P'],
                'tempat_lahir' => ['required', 'string', 'max:50'],
                'tanggal_lahir' => ['required', 'date', 'before:today'],
                'agama' => ['required', 'string'],
                'status_perkawinan' => ['required', 'string'],
                'pendidikan_terakhir' => ['required', 'string'],
                'pekerjaan' => ['nullable', 'string', 'max:100'],
                'alamat' => ['required', 'string', 'max:200'],
                'rt' => ['required', 'string', 'max:3'],
                'rw' => ['required', 'string', 'max:3'],
                'kelurahan' => ['required', 'string', 'max:50'],
                'kecamatan' => ['required', 'string', 'max:50'],
                'kabupaten_kota' => ['required', 'string', 'max:50'],
                'provinsi' => ['required', 'string', 'max:50'],
                'kode_pos' => ['nullable', 'string', 'max:5'],
                'no_telepon' => ['nullable', 'string', 'max:15'],
                'email' => ['nullable', 'email', 'max:100'],
                'status_kependudukan' => ['required', 'string'],
                'tanggal_masuk' => ['nullable', 'date'],
                'golongan_darah' => ['nullable', 'string'],
                'kewarganegaraan' => ['required', 'string'],
                'nama_ayah' => ['nullable', 'string', 'max:100'],
                'nama_ibu' => ['nullable', 'string', 'max:100'],
                'catatan' => ['nullable', 'string'],
            ]);

            Warga::create($validated);
            return redirect()->route('warga.index')->with('success', 'Data warga berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function show(Warga $warga): View
    {
        try {
            return view('warga.show', ['item' => $warga]);
        } catch (\Exception $e) {
            return redirect()->route('warga.index')->with('error', 'Data tidak ditemukan');
        }
    }

    public function edit(Warga $warga): View
    {
        try {
            return view('warga.edit', ['item' => $warga]);
        } catch (\Exception $e) {
            return redirect()->route('warga.index')->with('error', 'Data tidak ditemukan');
        }
    }

    public function update(Request $request, Warga $warga): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'nik' => ['required', 'string', 'size:16', 'unique:warga,nik,' . $warga->warga_id . ',warga_id'],
                'nama_lengkap' => ['required', 'string', 'max:100'],
                'nama_panggilan' => ['nullable', 'string', 'max:50'],
                'jenis_kelamin' => ['required', 'in:L,P'],
                'tempat_lahir' => ['required', 'string', 'max:50'],
                'tanggal_lahir' => ['required', 'date', 'before:today'],
                'agama' => ['required', 'string'],
                'status_perkawinan' => ['required', 'string'],
                'pendidikan_terakhir' => ['required', 'string'],
                'pekerjaan' => ['nullable', 'string', 'max:100'],
                'alamat' => ['required', 'string', 'max:200'],
                'rt' => ['required', 'string', 'max:3'],
                'rw' => ['required', 'string', 'max:3'],
                'kelurahan' => ['required', 'string', 'max:50'],
                'kecamatan' => ['required', 'string', 'max:50'],
                'kabupaten_kota' => ['required', 'string', 'max:50'],
                'provinsi' => ['required', 'string', 'max:50'],
                'kode_pos' => ['nullable', 'string', 'max:5'],
                'no_telepon' => ['nullable', 'string', 'max:15'],
                'email' => ['nullable', 'email', 'max:100'],
                'status_kependudukan' => ['required', 'string'],
                'tanggal_masuk' => ['nullable', 'date'],
                'tanggal_keluar' => ['nullable', 'date'],
                'alasan_keluar' => ['nullable', 'string', 'max:200'],
                'golongan_darah' => ['nullable', 'string'],
                'kewarganegaraan' => ['required', 'string'],
                'nama_ayah' => ['nullable', 'string', 'max:100'],
                'nama_ibu' => ['nullable', 'string', 'max:100'],
                'catatan' => ['nullable', 'string'],
            ]);

            $warga->update($validated);
            return redirect()->route('warga.index')->with('success', 'Data warga berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(Warga $warga): RedirectResponse
    {
        try {
            $warga->delete();
            return redirect()->route('warga.index')->with('success', 'Data warga berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('warga.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporBanjirController extends Controller
{
    // Halaman Form Pelaporan Warga (Public)
    public function create()
    {
        return view('lapor.create');
    }

    // Simpan Laporan Warga & Upload Foto
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'no_hp'        => 'required|string|max:15',
            'lokasi'       => 'required|string|max:255',
            'kecamatan'    => 'required|string|max:255',
            'tinggi_air'   => 'required|numeric|min:1',
            'keterangan'   => 'required|string',
            'foto'         => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('laporan_foto', 'public');
        }

        Laporan::create($validated);

        return redirect()->route('lapor.create')->with('success', 'Laporan banjir berhasil dikirim! Terima kasih atas partisipasi Anda.');
    }

    // List Laporan Petugas (Auth Protected)
    public function index()
    {
        $laporans = Laporan::latest()->paginate(5);
        return view('petugas.index', compact('laporans'));
    }

    // Detail Laporan Petugas
    public function show(Laporan $laporan)
    {
        return view('petugas.show', compact('laporan'));
    }

    // Form Edit Status & Foto Petugas
    public function edit(Laporan $laporan)
    {
        return view('petugas.edit', compact('laporan'));
    }

    // Update Laporan & Hapus Foto Lama Jika Diganti
    public function update(Request $request, Laporan $laporan)
    {
        $validated = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'no_hp'        => 'required|string|max:15',
            'lokasi'       => 'required|string|max:255',
            'kecamatan'    => 'required|string|max:255',
            'tinggi_air'   => 'required|numeric|min:1',
            'keterangan'   => 'required|string',
            'status'       => 'required|in:Menunggu,Diproses,Selesai',
            'foto'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama dari storage
            if ($laporan->foto) {
                Storage::disk('public')->delete($laporan->foto);
            }
            $validated['foto'] = $request->file('foto')->store('laporan_foto', 'public');
        }

        $laporan->update($validated);

        return redirect()->route('laporan.index')->with('success', 'Data laporan berhasil diperbarui.');
    }

    // Hapus Laporan & File Foto di Storage
    public function destroy(Laporan $laporan)
    {
        if ($laporan->foto) {
            Storage::disk('public')->delete($laporan->foto);
        }
        $laporan->delete();

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dihapus.');
    }
}
<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PemberianDanaController extends Controller
{
    public function index()
    {
        // Ambil semua pengajuan dengan status 'pengajuan_berhasil'
        $pengajuan = Pengajuan::where('status', 'pengajuan_berhasil')->get();

        return view('pegawai.pengajuan_berhasil.pengajuan_berhasil', compact('pengajuan'));
    }

    // Menampilkan form untuk menyalurkan dana
    public function showSalurkanDanaForm($id)
    {
        // Ambil data pengajuan berdasarkan id
        $pengajuan = Pengajuan::findOrFail($id);

        // Tampilkan view form pemberian dana
        return view('pegawai.pemberian_dana.salurkan_dana', compact('pengajuan'));
    }

    // Proses pemberian dana
    public function salurkanDana(Request $request, $id)
    {
        // Validasi input jumlah dana
        $request->validate([
            'jumlah_dana' => 'required|numeric|min:1',
        ]);

        // Ambil data pengajuan berdasarkan id
        $pengajuan = Pengajuan::findOrFail($id);

        // Update status dan jumlah dana yang disalurkan
        $pengajuan->update([
            'status' => 'dana_disalurkan', // Ubah status pengajuan
            'jumlah_dana' => $request->jumlah_dana, // Simpan jumlah dana yang disalurkan
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('pegawai.pengajuan-berhasil')
            ->with('success', 'Dana berhasil disalurkan.');
    }
}

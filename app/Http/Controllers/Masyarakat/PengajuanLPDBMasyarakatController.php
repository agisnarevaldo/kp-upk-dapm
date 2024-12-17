<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\DetailUser;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PengajuanLPDBMasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $cek = DetailUser::find($id);
        $pengajuan = Pengajuan::where('id_user', $id)->get();

        return view('masyarakat.pengajuan_lpdb.pengajuan_lpdb', compact(['cek', 'pengajuan']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masyarakat.pengajuan_lpdb.pengajuan_lpdb_store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_usaha' => 'required',
            'jenis_usaha' => 'required',
            'bentuk_usaha' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'alamat_usaha' => 'required',
            'foto_usaha' => 'required',
            'no_npwp' => 'required',
            'filenpwp' => 'required',
            'filepermohonan' => 'required',
            'fileproposal' => 'required',
            'fileakta' => 'nullable|file|mimes:pdf,jpg,png,jpeg',
            'filekeuangan' => 'required',
            'filelegalitas' => 'nullable|file|mimes:pdf,jpg,png,jpeg',
        ]);

        if ($request->hasFile('foto_usaha')) {
            $foto_usaha = $request->file('foto_usaha')->getClientOriginalName();
            $request->foto_usaha->move(public_path('koperasi/foto_usaha'), $foto_usaha);
        }

        if ($request->hasFile('filenpwp')) {
            $file_npwp = $request->file('filenpwp')->getClientOriginalName();
            $request->filenpwp->move(public_path('koperasi/npwp'), $file_npwp);
        }

        if ($request->hasFile('filepermohonan')) {
            $file_permohonan = $request->file('filepermohonan')->getClientOriginalName();
            $request->filepermohonan->move(public_path('koperasi/permohonan'), $file_permohonan);
        }

        if ($request->hasFile('fileproposal')) {
            $file_proposal = $request->file('fileproposal')->getClientOriginalName();
            $request->fileproposal->move(public_path('koperasi/proposal'), $file_proposal);
        }

        if ($request->hasFile('fileakta')) {
            $file_akta = $request->hasFile('fileakta') ? $request->file('fileakta')->getClientOriginalName() : null;
            $request->fileakta->move(public_path('koperasi/akta'), $file_akta);
        }

        if ($request->hasFile('filekeuangan')) {
            $file_keuangan = $request->file('filekeuangan')->getClientOriginalName();
            $request->filekeuangan->move(public_path('koperasi/keuangan'), $file_keuangan);
        }

        if ($request->hasFile('filelegalitas')) {
            $file_legalitas = $request->hasFile('filelegalitas') ? $request->getClientOriginalName() : null;
            $request->filelegalitas->move(public_path('koperasi/legalitas'), $file_legalitas);
        }

        Pengajuan::create([
            'id_user' => Auth::user()->id,
            'nama_usaha' => $request->nama_usaha,
            'jenis_usaha' => $request->jenis_usaha,
            'bentuk_usaha' => $request->bentuk_usaha,
            'kecamatan_usaha' => $request->kecamatan,
            'kelurahan_usaha' => $request->kelurahan,
            'kota_usaha' => $request->kota,
            'provinsi_usaha' => $request->provinsi,
            'alamat_usaha' => $request->alamat_usaha,
            'foto_usaha' => $foto_usaha,
            'no_npwp' => $request->no_npwp,
            'npwp' => $file_npwp,
            'permohonan' => $file_permohonan,
            'proposal' => $file_proposal,
            'akta' => 'nullable|file|mimes:pdf,jpg,png,jpeg',
            'keuangan' => $file_keuangan,
            'legalitas' => 'nullable|file|mimes:pdf,jpg,png,jpeg',
        ]);

        return to_route('pengajuan-LPDB.index')->with('success', 'Berhasil Membuat Pengajuan Dana Bergulir Baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Pengajuan::find($id)->update([
            'status' => 'ditinjau',
        ]);

        return to_route('pengajuan-LPDB.index')->with('success', 'Berhasil Melakukan Pengajuan LPDB');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pengajuan::find($id);
        return view('masyarakat.pengajuan_lpdb.pengajuan_lpdb_edit', compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Pengajuan::find($id);

        $request->validate([
            'nama_usaha' => 'required',
            'jenis_usaha' => 'required',
            'bentuk_usaha' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'alamat_usaha' => 'required',
            'no_npwp' => 'required',
        ]);

        if ($request->hasFile('foto_usaha')) {
            $foto_usaha = $request->file('foto_usaha')->getClientOriginalName();
            $request->foto_usaha->move(public_path('koperasi/foto_usaha'), $foto_usaha);
        } else {
            $foto_usaha = $data->foto_usaha;
        }

        if ($request->hasFile('filenpwp')) {
            $file_npwp = $request->file('filenpwp')->getClientOriginalName();
            $request->filenpwp->move(public_path('koperasi/npwp'), $file_npwp);
        } else {
            $file_npwp = $data->npwp;
        }

        if ($request->hasFile('filepermohonan')) {
            $file_permohonan = $request->file('filepermohonan')->getClientOriginalName();
            $request->filepermohonan->move(public_path('koperasi/permohonan'), $file_permohonan);
        } else {
            $file_permohonan = $data->permohonan;
        }

        if ($request->hasFile('fileproposal')) {
            $file_proposal = $request->file('fileproposal')->getClientOriginalName();
            $request->fileproposal->move(public_path('koperasi/proposal'), $file_proposal);
        } else {
            $file_proposal = $data->proposal;
        }

        //        if ($request->hasFile('fileakta')) {
        //            $file_akta = $request->file('fileakta')->getClientOriginalName();
        //            $request->fileakta->move(public_path('koperasi/akta'), $file_akta);
        //        }else {
        //            $file_akta = $data->akta;
        //        }

        if ($request->hasFile('filekeuangan')) {
            $file_keuangan = $request->file('filekeuangan')->getClientOriginalName();
            $request->filekeuangan->move(public_path('koperasi/keuangan'), $file_keuangan);
        } else {
            $file_keuangan = $data->keuangan;
        }

        //        if ($request->hasFile('filelegalitas')) {
        //            $file_legalitas = $request->file('filelegalitas')->getClientOriginalName();
        //            $request->filelegalitas->move(public_path('koperasi/legalitas'), $file_legalitas);
        //        }else {
        //            $file_legalitas = $data->legalitas;
        //        }

        Pengajuan::find($id)->update([
            'nama_usaha' => $request->nama_usaha,
            'jenis_usaha' => $request->jenis_usaha,
            'bentuk_usaha' => $request->bentuk_usaha,
            'kecamatan_usaha' => $request->kecamatan,
            'kelurahan_usaha' => $request->kelurahan,
            'kota_usaha' => $request->kota,
            'provinsi_usaha' => $request->provinsi,
            'alamat_usaha' => $request->alamat_usaha,
            'foto_usaha' => $foto_usaha,
            'no_npwp' => $request->no_npwp,
            'npwp' => $file_npwp,
            'permohonan' => $file_permohonan,
            'proposal' => $file_proposal,
            //            'akta'=>$file_akta,
            'keuangan' => $file_keuangan,
            //            'legalitas'=>$file_legalitas,
            'status' => 'ditinjau',
        ]);

        return to_route('pengajuan-LPDB.index')->with('success', 'Berhasil Melakukan Perubahan Data Pengajuan Dana Bergulir');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengajuan::find($id)->delete();

        return to_route('pengajuan-LPDB.index')->with('success', 'Berhasil Menghapus Pengajuan');
    }

    //    Menampikan pengajuan yang sudah di survey
    public function showPengajuanBerhasil()
    {
        // Ambil semua pengajuan dengan status 'pengajuan_berhasil'
        $pengajuan = Pengajuan::where('status', 'pengajuan_berhasil')->get();

        return view('pegawai.pengajuan_berhasil.pengajuan_berhasil', compact('pengajuan'));
    }
    /**
     * Menyalurkan dana untuk pengajuan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function berikanDana(Request $request, $id)
    {
        // Validasi input form
        $request->validate([
            'jumlah_dana' => 'required|numeric|min:1',
            'tanggal_pemberian' => 'required|date',
            'status_dana' => 'required|in:belum_disalurkan,sudah_disalurkan',
        ]);

        // Cari pengajuan berdasarkan ID
        $pengajuan = Pengajuan::find($id);
        if (!$pengajuan) {
            return redirect()->route('pegawai.pengajuan_berhasil')->with('error', 'Pengajuan tidak ditemukan');
        }

        // Update pengajuan dengan informasi pemberian dana
        $pengajuan->update([
            'jumlah_dana' => $request->jumlah_dana,
            'tanggal_pemberian' => $request->tanggal_pemberian,
            'status_dana' => $request->status_dana,
        ]);

        return redirect()->route('pegawai.pengajuan.berhasil')->with('success', 'Dana berhasil disalurkan');
    }
}

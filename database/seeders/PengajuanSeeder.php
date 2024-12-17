<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengajuan')->insert([
            [
                'id_pengajuan' => 1,
                'id_user' => 3,
                'nama_usaha' => 'rumah makan selero minang',
                'jenis_usaha' => 'warung internet',
                'bentuk_usaha' => 'UEP',
                'kecamatan_usaha' => 'babat supat',
                'kelurahan_usaha' => 'babat supat',
                'kota_usaha' => 'Palembang',
                'provinsi_usaha' => 'Sumatera Selatan',
                'alamat_usaha' => 'jl. suka bangun 2',
                'foto_usaha' => 'WhatsApp Image 2022-10-16 at 20.07.15.jpeg',
                'no_npwp' => '01.02.65.032',
                'npwp' => 'npwp.jpeg',
                'permohonan' => 'permohonan.pdf',
                'proposal' => 'proposal.pdf',
                'akta' => 'akta.pdf',
                'keuangan' => 'keuangan.pdf',
                'legalitas' => 'legalitas.pdf',
                'status' => 'ditinjau',
                'keterangan' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

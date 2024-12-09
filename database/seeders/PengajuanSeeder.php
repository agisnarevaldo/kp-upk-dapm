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
                'id_user' => 1,
                'nama_usaha' => 'rumah makan selero minang',
                'jenis_usaha' => 'rumah makan padang',
                'bentuk_usaha' => 'UMKM',
                'kecamatan_usaha' => 'Sukarami',
                'kelurahan_usaha' => 'Sukajaya',
                'kota_usaha' => 'Palembang',
                'provinsi_usaha' => 'Sumatera Selatan',
                'alamat_usaha' => 'jl. babat supat',
                'foto_usaha' => 'large-rm-makan-padang-dd4adb693d0d48e70773ec0725d733e4.jpg',
                'no_npwp' => '01.02.65.032',
                'npwp' => 'npwp.jpeg',
                'permohonan' => 'permohonan.pdf',
                'proposal' => 'proposal.pdf',
                'akta' => 'akta.pdf',
                'keuangan' => 'keuangan.pdf',
                'legalitas' => 'legalitas.pdf',
                'status' => 'suspend',
                'keterangan' => 'file saya',
                'created_at' => '2022-12-26 13:07:19',
                'updated_at' => '2022-12-30 05:48:45',
            ],
            [
                'id_pengajuan' => 2,
                'id_user' => 1,
                'nama_usaha' => 'Rumah Kue',
                'jenis_usaha' => 'Toko Kue',
                'bentuk_usaha' => 'UMKM',
                'kecamatan_usaha' => 'sukatani',
                'kelurahan_usaha' => 'suka makmur',
                'kota_usaha' => 'palembang',
                'provinsi_usaha' => 'sumatera selatan',
                'alamat_usaha' => 'jl.soak simpur',
                'foto_usaha' => 'WhatsApp Image 2022-10-16 at 20.07.15.jpeg',
                'no_npwp' => '1237923901',
                'npwp' => 'npwp.jpeg',
                'permohonan' => 'permohonan.pdf',
                'proposal' => 'proposal.pdf',
                'akta' => 'akta.pdf',
                'keuangan' => 'keuangan.pdf',
                'legalitas' => 'legalitas.pdf',
                'status' => 'pengajuan_berhasil',
                'keterangan' => null,
                'created_at' => '2022-12-27 16:06:13',
                'updated_at' => '2022-12-30 17:07:08',
            ],
            [
                'id_pengajuan' => 3,
                'id_user' => 5,
                'nama_usaha' => 'rumah makan selero minang',
                'jenis_usaha' => 'warung internet',
                'bentuk_usaha' => 'PT',
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
                'created_at' => '2023-01-01 21:14:10',
                'updated_at' => '2023-01-01 21:14:15',
            ],
        ]);
    }
}

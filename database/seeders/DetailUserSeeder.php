<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_user')->insert([
            [
                'id_detail' => 5,
                'nama' => 'masyarakat',
                'nik' => 1671050707970003,
                'nip' => 23423542635623,
                'tempat_lahir' => 'Tasikmalaya',
                'tanggal_lahir' => '1997-07-07',
                'gender' => 'L',
                'telp' => '0198232837823',
                'kecamatan' => 'Puspahiang',
                'kelurahan' => 'sukarame',
                'kota' => 'Kabupaten Tasikmalaya',
                'provinsi' => 'Sumatera Selatan',
                'alamat' => 'suka bangun2',
                'ktp' => 'buku.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

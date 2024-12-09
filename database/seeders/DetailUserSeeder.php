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
                'id_detail' => 1,
                'nama' => 'toho',
                'nik' => 1671050707970003,
                'nip' => null,
                'tempat_lahir' => 'M.Enim',
                'tanggal_lahir' => '1997-07-07',
                'gender' => 'L',
                'telp' => '8117807970',
                'kecamatan' => 'Sukarami',
                'kelurahan' => 'Sukajaya',
                'kota' => 'Palembang',
                'provinsi' => 'Sumatera Selatan',
                'alamat' => 'Perum. Griya Buana Indah 1 No A 7',
                'ktp' => 'ezgif-1-c717be194d.jpg',
                'created_at' => '2022-12-20 10:41:02',
                'updated_at' => '2023-01-01 20:43:48',
            ],
            [
                'id_detail' => 2,
                'nama' => 'admin',
                'nik' => null,
                'nip' => null,
                'tempat_lahir' => null,
                'tanggal_lahir' => null,
                'gender' => null,
                'telp' => null,
                'kecamatan' => null,
                'kelurahan' => null,
                'kota' => null,
                'provinsi' => null,
                'alamat' => null,
                'ktp' => null,
                'created_at' => '2022-12-22 04:24:14',
                'updated_at' => '2022-12-22 04:24:14',
            ],
            [
                'id_detail' => 3,
                'nama' => 'rizki ratih purwasihi',
                'nik' => 16710507079700030,
                'nip' => 9283923400,
                'tempat_lahir' => 'babat supat',
                'tanggal_lahir' => '1997-07-07',
                'gender' => 'P',
                'telp' => '08117807970',
                'kecamatan' => null,
                'kelurahan' => null,
                'kota' => null,
                'provinsi' => null,
                'alamat' => 'jl. babat supat jambi',
                'ktp' => null,
                'created_at' => '2022-12-23 03:08:41',
                'updated_at' => '2022-12-30 08:14:56',
            ],
            [
                'id_detail' => 4,
                'nama' => 'viky prasetyo',
                'nik' => null,
                'nip' => null,
                'tempat_lahir' => null,
                'tanggal_lahir' => null,
                'gender' => null,
                'telp' => null,
                'kecamatan' => null,
                'kelurahan' => null,
                'kota' => null,
                'provinsi' => null,
                'alamat' => null,
                'ktp' => null,
                'created_at' => '2022-12-31 05:13:50',
                'updated_at' => '2022-12-31 05:13:50',
            ],
            [
                'id_detail' => 5,
                'nama' => 'mihak',
                'nik' => 1671050707970003,
                'nip' => null,
                'tempat_lahir' => 'babat supat',
                'tanggal_lahir' => '1997-07-07',
                'gender' => 'L',
                'telp' => '0198232837823',
                'kecamatan' => 'babat supat',
                'kelurahan' => 'sukarame',
                'kota' => 'Kota Palembang',
                'provinsi' => 'Sumatera Selatan',
                'alamat' => 'suka bangun2',
                'ktp' => 'buku.jpeg',
                'created_at' => '2023-01-01 21:01:04',
                'updated_at' => '2023-01-01 21:01:48',
            ],
        ]);
    }
}

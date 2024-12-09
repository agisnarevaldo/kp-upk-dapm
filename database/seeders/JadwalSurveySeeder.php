<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jadwal_survey')->insert([
            [
                'id_jadwal' => 1,
                'id_pengajuan' => 1,
                'id_user' => 1,
                'status_survey' => 'ditolak',
                'tanggal_survey' => '2022-12-30',
                'hasil_survey' => 'salakslkldjoksdsd',
                'dokumen_survey' => 'hasil_survey.pdf',
                'created_at' => '2022-12-27 15:03:54',
                'updated_at' => '2022-12-30 05:48:45',
            ],
            [
                'id_jadwal' => 2,
                'id_pengajuan' => 2,
                'id_user' => 1,
                'status_survey' => 'diterima',
                'tanggal_survey' => '2022-12-31',
                'hasil_survey' => 'sangat layak',
                'dokumen_survey' => 'hasil_survey.pdf',
                'created_at' => '2022-12-30 08:49:31',
                'updated_at' => '2022-12-30 17:07:08',
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan data pengguna
        DB::table('users')->insert([
            [
                'nama' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password123'), // Password yang sudah di-hash
                'type' => 'pegawai', // Jenis user: Admin
                'status' => 'active',
                'foto' => null, // Foto bisa diisi null atau URL foto
                'email_verified_at' => now(), // Set email verified jika diperlukan
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => '',
                'email' => 'survey@example.com',
                'password' => Hash::make('password123'),
                'type' => 'survey', // Jenis user: Ketua Kelompok
                'status' => 'active',
                'foto' => null,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'masyarakat',
                'email' => 'masyarakat@example.com',
                'password' => Hash::make('password123'),
                'type' => 'masyarakat', // Jenis user: Anggota
                'status' => 'active',
                'foto' => null,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

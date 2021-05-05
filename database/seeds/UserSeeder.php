<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama_pegawai' => 'Boy',
            'email_pegawai' => 'YeaBoy@gmail.com',
            'password' => '$2y$12$EcX.ssny3g2iyCxUy2Gefu/W9FU0STPQQA63qL31Hyj4fqJTodnQu',
            'kelamin_pegawai' => 'Laki-laki',
            'posisi_pegawai' => 'Operational Manager',
            'tanggal_bergabung' => '2021-04-23',
            'status_pegawai' => 'aktif',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);
    }
}

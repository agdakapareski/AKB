<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            'nama_menu' => 'Beef Shortplate',
            'kategori_menu' => 'Makanan Utama',
            'deskripsi_menu' => 'Potongan daging sapi dari bagian otot perut, bentuknya panjang dan datar',
            'harga' => 20000,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('menus')->insert([
            'nama_menu' => 'Chicken Slice',
            'kategori_menu' => 'Makanan Utama',
            'deskripsi_menu' => 'Potongan daging ayam dengan kualitas premium',
            'harga' => 15000,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('menus')->insert([
            'nama_menu' => 'Squid',
            'kategori_menu' => 'Makanan Utama',
            'deskripsi_menu' => 'Potongan daging cumi diambil dari laut terbaik',
            'harga' => 20000,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('menus')->insert([
            'nama_menu' => 'Tenderloin',
            'kategori_menu' => 'Makanan Utama',
            'deskripsi_menu' => 'Potongan daging sapi bagian tengah dengan kualitas premium',
            'harga' => 22000,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('menus')->insert([
            'nama_menu' => 'Rice',
            'kategori_menu' => 'Makanan Utama',
            'deskripsi_menu' => 'Semangkuk nasi kualitas premium. Dihidangkan selagi hangat',
            'harga' => 4000,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('menus')->insert([
            'nama_menu' => 'Kimchi',
            'kategori_menu' => 'Side Dish',
            'deskripsi_menu' => 'Asinan sayur hasil fermentasi yang diberi bumbu pedas',
            'harga' => 5000,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('menus')->insert([
            'nama_menu' => 'Saos',
            'kategori_menu' => 'Side Dish',
            'deskripsi_menu' => 'Saos signature yang melengkapi kelezatan makanan',
            'harga' => 0,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('menus')->insert([
            'nama_menu' => 'Ocha',
            'kategori_menu' => 'Minuman',
            'deskripsi_menu' => 'Minuman teh hijau segar impor langsung dari negara Jepang',
            'harga' => 3000,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('menus')->insert([
            'nama_menu' => 'Mineral Water',
            'kategori_menu' => 'Minuman',
            'deskripsi_menu' => 'Minuman air segar dari pegunungan ternama',
            'harga' => 6000,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('menus')->insert([
            'nama_menu' => 'Orange Juice',
            'kategori_menu' => 'Minuman',
            'deskripsi_menu' => 'Minuman jus jeruk yang didapat dari buah asli kualitas premium',
            'harga' => 8000,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);
    }
}

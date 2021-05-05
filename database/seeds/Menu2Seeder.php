<?php

use Illuminate\Database\Seeder;

class Menu2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert([
            'nama_menu' => 'Beef Shortplate',
            'id_bahan' => '1',
            'kategori_menu' => 'Makanan Utama',
            'deskripsi_menu' => 'Potongan daging sapi dari bagian otot perut, bentuknya panjang dan datar',
            'harga' => 20000,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('menu')->insert([
            'nama_menu' => 'Chicken Slice',
            'id_bahan' => '2',
            'kategori_menu' => 'Makanan Utama',
            'deskripsi_menu' => 'Potongan daging ayam dengan kualitas premium',
            'harga' => 15000,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('menu')->insert([
            'nama_menu' => 'Squid',
            'id_bahan' => '3',
            'kategori_menu' => 'Makanan Utama',
            'deskripsi_menu' => 'Potongan daging cumi diambil dari laut terbaik',
            'harga' => 20000,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('menu')->insert([
            'nama_menu' => 'Tenderloin',
            'id_bahan' => '4',
            'kategori_menu' => 'Makanan Utama',
            'deskripsi_menu' => 'Potongan daging sapi bagian tengah dengan kualitas premium',
            'harga' => 22000,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('menu')->insert([
            'nama_menu' => 'Rice',
            'id_bahan' => '5',
            'kategori_menu' => 'Makanan Utama',
            'deskripsi_menu' => 'Semangkuk nasi kualitas premium. Dihidangkan selagi hangat',
            'harga' => 4000,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('menu')->insert([
            'nama_menu' => 'Kimchi',
            'id_bahan' => '6',
            'kategori_menu' => 'Side Dish',
            'deskripsi_menu' => 'Asinan sayur hasil fermentasi yang diberi bumbu pedas',
            'harga' => 5000,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('menu')->insert([
            'nama_menu' => 'Saos',
            'id_bahan' => '7',
            'kategori_menu' => 'Side Dish',
            'deskripsi_menu' => 'Saos signature yang melengkapi kelezatan makanan',
            'harga' => 0,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('menu')->insert([
            'nama_menu' => 'Ocha',
            'id_bahan' => '8',
            'kategori_menu' => 'Minuman',
            'deskripsi_menu' => 'Minuman teh hijau segar impor langsung dari negara Jepang',
            'harga' => 3000,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('menu')->insert([
            'nama_menu' => 'Mineral Water',
            'id_bahan' => '9',
            'kategori_menu' => 'Minuman',
            'deskripsi_menu' => 'Minuman air segar dari pegunungan ternama',
            'harga' => 6000,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);

        DB::table('menu')->insert([
            'nama_menu' => 'Orange Juice',
            'id_bahan' => '10',
            'kategori_menu' => 'Minuman',
            'deskripsi_menu' => 'Minuman jus jeruk yang didapat dari buah asli kualitas premium',
            'harga' => 8000,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);
    }
}

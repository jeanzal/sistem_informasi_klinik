<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('admins')->insert([
            'id' => 1,
            'name' => 'SuperAdmin',
            'role' => 'sa',
            'email' => 'sa@mail.com',
            'password' => Hash::make('password'),
            'image' => 'SuperAdmin.png',

        ]);
        DB::table('admins')->insert([
            'id' => 2,
            'name' => 'Admin',
            'role' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'),
            'image' => 'Admin.png',

        ]);
        DB::table('admins')->insert([
            'id' => 3,
            'name' => 'Jojo',
            'role' => 'user',
            'email' => 'jojo@mail.com',
            'password' => Hash::make('12345678'),
            'image' => 'user.png',
        ]);
        DB::table('categories')->insert ([
            'id' =>1,
            'name'=>'Obat Dalam'
        ]);
        DB::table('categories')->insert ([
            'id' =>2,
            'name'=>'Obat Luar'
        ]);
        DB::table('products')->insert ([
            'id' =>1,
            'name'=>'Dumin',
            'price'=>6000,
            'stock'=>120,
            'category_id'=>1,
        ]);
        DB::table('products')->insert ([
            'id' =>2,
            'name'=>'Betadine',
            'price'=>10000,
            'stock'=>100,
            'category_id'=>2,
        ]);
        DB::table('pasien')->insert ([
            'id' =>1,
            'name'=>'Jojo',
            'keluhan'=>'Luka Ringan',
            'ket' => 'Membeli Obat',

        ]);
        DB::table('pasien')->insert ([
            'id' =>2,
            'name'=>'Sinta',
            'keluhan'=>'Periksa Mag',
            'ket' => 'Rekam Medis',
        ]);
        DB::table('transactions')->insert ([
            'id' =>1,
            'date'=>'2021-11-19 13:22:38',
            'pasien_id'=>1,
            'status'=>'Blom Bayar',
            'ket'=>'Membeli Obat',
            'pengguna_id'=>1,
        ]);
        DB::table('items')->insert ([
            'id' =>1,
            'qty'=>1,
            'price'=>3000,
            'transaction_id'=>1,
            'product_id'=>1,
        ]);
        DB::table('items')->insert ([
            'id' =>2,
            'qty'=>2,
            'price'=>20000,
            'transaction_id'=>1,
            'product_id'=>2,
        ]);
        DB::table('dokters')->insert ([
            'id' =>1,
            'nama_dokter'=> 'Desri',
        ]);
        DB::table('dokters')->insert ([
            'id' =>2,
            'nama_dokter'=> 'Sihol',
        ]);
        DB::table('rekam_medis')->insert ([
            'id' =>1,
            'spesialis'=> 'Ahli Bedah',
            'biaya'=> 500000,
            'dokter_id'=> 1,
        ]);
        DB::table('rekam_medis')->insert ([
            'id' =>2,
            'spesialis'=> 'Dokter Umum',
            'biaya'=> 250000,
            'dokter_id'=> 2,
        ]);
    }
}

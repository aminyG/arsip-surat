<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::insert([
            ['nama'=>'Undangan'],
            ['nama'=>'Pengumuman'],
            ['nama'=>'Nota Dinas'],
            ['nama'=>'Pemberitahuan'],
        ]);
    }
}

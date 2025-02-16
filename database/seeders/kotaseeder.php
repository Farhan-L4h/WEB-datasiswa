<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kota;
use Illuminate\Support\Facades\DB;

class kotaseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

DB::table('kotas')->delete();

$datas = [
    ['nama_kota' => 'Malang'],
    ['nama_kota' => 'Sidoarjo'],
    ['nama_kota' => 'Surabaya']
];

foreach ($datas as $data) {
    Kota::create($data);
}
    }
}

<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;
class TrainingSeeder extends Seeder
{
    public function run()
    {
        $categories = [
    'Sertifikasi Kemnaker RI',
    'Sertifikasi BNSP',
    'Non Sertifikasi',
    'ESDM',
    'PPSDM Migas',
    'Riksa Uji',
    'Perpanjangan SIO & Lisensi'
];

foreach ($categories as $cat) {
    Category::firstOrCreate([
        'slug' => Str::slug($cat)
    ], [
        'name' => $cat
    ]);
}

    }
}
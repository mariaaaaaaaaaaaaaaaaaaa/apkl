<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateAchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $achievements = [
            [
                'npsn' => 22222222,
                'nama_siswa' => 'andi',
                'nama_lomba' => 'lomba lari',
                'penyelenggara' => 'abc',
                'prestasi' => 'emas',
                'waktu' =>Carbon::parse('2023-01-01'),
                'tingkat' => 0,
                'jenis_lomba' => 0,
            ],
            [
                'npsn' => 11111111,
                'nama_siswa' => 'budi',
                'nama_lomba' => 'gambar',
                'penyelenggara' => 'aqua',
                'prestasi' => '1',
                'waktu' =>Carbon::parse('2023-04-18'),
                'tingkat' => 0,
                'jenis_lomba' => 1,
            ],
            [
                'npsn' => 11111111,
                'nama_siswa' => 'caca',
                'nama_lomba' => 'lomba 17an',
                'penyelenggara' => 'leminarale',
                'prestasi' => 'perunggu',
                'waktu' =>Carbon::parse('2023-02-14'),
                'tingkat' => 1,
                'jenis_lomba' => 0,
            ],
            [
                'npsn' => 22222222,
                'nama_siswa' => 'dudu',
                'nama_lomba' => 'lomba desain poster',
                'penyelenggara' => 'univ',
                'prestasi' => 'emas',
                'waktu' =>Carbon::parse('2023-05-04'),
                'tingkat' => 1,
                'jenis_lomba' => 1,
            ],
            [
                'npsn' => 22222222,
                'nama_siswa' => 'evan',
                'nama_lomba' => 'archery',
                'penyelenggara' => 'academy',
                'prestasi' => 'bullseye',
                'waktu' =>Carbon::parse('2023-04-04'),
                'tingkat' => 2,
                'jenis_lomba' => 0,
            ],
            [
                'npsn' => 33333333,
                'nama_siswa' => 'farah',
                'nama_lomba' => 'marathon',
                'penyelenggara' => 'bolt',
                'prestasi' => 'perak',
                'waktu' =>Carbon::parse('2023-03-31'),
                'tingkat' => 2,
                'jenis_lomba' => 1,
            ],
            [
                'npsn' => 22222222,
                'nama_siswa' => 'geri',
                'nama_lomba' => 'lomba renang',
                'penyelenggara' => 'swimpul',
                'prestasi' => 'emas',
                'waktu' =>Carbon::parse('2023-02-24'),
                'tingkat' => 3,
                'jenis_lomba' => 0,
            ],
            [
                'npsn' => 22222222,
                'nama_siswa' => 'haiyah',
                'nama_lomba' => 'hiking',
                'penyelenggara' => 'ahjummas',
                'prestasi' => 'perunggu',
                'waktu' =>Carbon::parse('2023-04-31'),
                'tingkat' => 3,
                'jenis_lomba' => 1,
            ],
        ];
    
        foreach ($achievements as $key => $achievement) {
            Achievement::create($achievement);
        }
    }
}

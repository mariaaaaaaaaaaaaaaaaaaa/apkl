<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = [
            [
                'id' => random_int(1000000000000000, 9999999999999999),
                'name' => 'Admin User',
                'email' => 'admin@user.com',
                'password' => bcrypt('cabdindikwil1'),
                'status' => 0,
                'role' => 0,
            ],
            // [
            //     'id' => random_int(1000000000000000, 9999999999999999),
            //     'name' => 'Admin Admin',
            //     'email' => 'admin@admin.com',
            //     'password' => bcrypt(12345678),
            //     'status' => 0,
            //     'role' => 0,
            // ],
            [
                'id' => random_int(1000000000000000, 9999999999999999),
                'npsn' => 11111111,
                'name' => 'SMA SMA',
                'email' => 'sma@sma.com',
                'password' => bcrypt('cabdindikwil1'),
                'status' => 0,
                'role' => 1,
                // 'bentuk_pendidikan' => 1,
                // 'status_sekolah' => 'Negeri',
            ],
            [
                'id' => random_int(1000000000000000, 9999999999999999),
                'npsn' => 20328892,
                'name' => 'SMA Negeri 6 Semarang',
                'email' => 'sman6@smg.com',
                'password' => bcrypt('cabdindikwil1'),
                'status' => 0,
                'role' => 1,
                // 'bentuk_pendidikan' => 1,
                // 'status_sekolah' => 'Negeri',
            ],
            [
                'id' => random_int(1000000000000000, 9999999999999999),
                'npsn' => 69989941,
                'name' => 'SMA Daniel Creative Semarang',
                'email' => 'smadc@smg.com',
                'password' => bcrypt('cabdindikwil1'),
                'status' => 0,
                'role' => 1,
                // 'bentuk_pendidikan' => 1,
                // 'status_sekolah' => 'Swasta',
            ],
            [
                'id' => random_int(1000000000000000, 9999999999999999),
                'npsn' => 22222222,
                'name' => 'SMK SMK',
                'email' => 'smk@smk.com',
                'password' => bcrypt('cabdindikwil1'),
                'status' => 0,
                'role' => 2,
                // 'bentuk_pendidikan' => 2,
                // 'status_sekolah' => 'Negeri',
            ],
            [
                'id' => random_int(1000000000000000, 9999999999999999),
                'npsn' => 20328963,
                'name' => 'SMK Negeri 11',
                'email' => 'smkn11@smg.com',
                'password' => bcrypt('cabdindikwil1'),
                'status' => 0,
                'role' => 2,
                // 'bentuk_pendidikan' => 2,
                // 'status_sekolah' => 'Negeri',
            ],
            [
                'id' => random_int(1000000000000000, 9999999999999999),
                'npsn' => 20328975,
                'name' => 'SMK Hidayah',
                'email' => 'smkhidayah@smg.com',
                'password' => bcrypt('cabdindikwil1'),
                'status' => 0,
                'role' => 2,
                // 'bentuk_pendidikan' => 2,
                // 'status_sekolah' => 'Swasta',
            ],
            [
                'id' => random_int(1000000000000000, 9999999999999999),
                'npsn' => 33333333,
                'name' => 'SLB SLB',
                'email' => 'slb@slb.com',
                'password' => bcrypt('cabdindikwil1'),
                'status' => 0,
                'role' => 3,
                // 'bentuk_pendidikan' => 3,
                // 'status_sekolah' => 'Swasta',
            ],
            [
                'id' => random_int(1000000000000000, 9999999999999999),
                'npsn' => 20331942,
                'name' => 'SLB Widya Bhakti',
                'email' => 'slb@smg.com',
                'password' => bcrypt('cabdindikwil1'),
                'status' => 0,
                'role' => 3,
                // 'bentuk_pendidikan' => 3,
                // 'status_sekolah' => 'Swasta',
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}

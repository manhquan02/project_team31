<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $packages = [
            [
                'package_name' => 'Gói New Primary Gym',
                'subject_id' => 1,
                'avatar' => 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/best-luxury-gyms-london-1577449934.jpg',
                'price' => 20000,
                'price_sale' => 0,
                'short_description' => "Gói tập này dành cho người mới tham gia tập gym không pt",
                'into_price' => 20000,
                'total_session_pt' => 48,
                'week_session_pt' => 4,
                'description' => 'Đây là mô tả gói tập',
                'status' => 1,
                'set_pt' => 1,
                'type_package' => 1,
            ],
            [
                'package_name' => 'Gói New Primary Boxing',
                'subject_id' => 2,
                'avatar' => 'https://kickfit-sports.com/wp-content/uploads/2022/01/gia-tap-boxing-o-ha-noi.jpg',
                'price' => 100000,
                'price_sale' => 0,
                'short_description' => "Gói tập này dành cho người mới tham gia tập Boxing có pt",
                'into_price' => 100000,
                'total_session_pt' => 30,
                'week_session_pt' =>3,
                'description' => 'Đây là mô tả gói tập',
                'status' => 1,
                'set_pt' => 1,
                'type_package' => 1,
            ],
            [
                'package_name' => 'Gói Month Primary',
                'subject_id' => 1,
                'avatar' => 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/best-luxury-gyms-london-1577449934.jpg',
                'price' => 300000,
                'price_sale' => 0,
                'short_description' => "Gói tập tháng có pt",
                'into_price' => 300000,
                'total_session_pt' => 50,
                'week_session_pt' => 4,
                'description' => 'Đây là mô tả gói tập',
                'status' => 1,
                'set_pt' => 0,
                'type_package' => 2,
            ]
        ];

        foreach($packages as $item){
            Package::create($item);
        }
    }
}

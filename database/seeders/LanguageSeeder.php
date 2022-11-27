<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $language = [
            [
                'name' => 'Việt Nam',
                'flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Flag_of_North_Vietnam_%281955%E2%80%931976%29.svg/230px-Flag_of_North_Vietnam_%281955%E2%80%931976%29.svg.png',
                'code' => 'vn',
                'status' => 0
            ],
            [
                'name' => 'English',
                'flag' => 'https://vuongquocanh.com/wp-content/uploads/2018/04/la-co-vuong-quoc-anh.jpg',
                'code' => 'en',
                'status' => 1
            ]
        ];

        foreach ($language as $item) {
            Language::create($item);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $category = [
            [
                'type' => 'technical'
            ],
            [
                'type' => 'aptitude'
            ],
            [
                'type' => 'logical'
            ]
        ];
        DB::table('category')->insert($category);
    }
}

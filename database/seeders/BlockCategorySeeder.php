<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlockCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('block_categories')->insert([
            [
                'name'=>'Commercial',//support,
            ],
            [
                'name'=>'Residential',//support,
            ],
            [
                'name'=>'Other',//buy & pay
            ]
        ]);
    }
}

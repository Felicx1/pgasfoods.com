<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebPageBlocksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create seeder for web_page_blocks table 5 records
        
        DB::table('web_page_blocks')->insert([
            [
                'template_id' => 1,
                'block_name' => 'Header',
                'multiple' => 0,
                'item_max' => 0,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'template_id' => z,
                'block_name' => 'Footer',
                'multiple' => 0,
                'item_max' => 0,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'template_id' => 1,
                'block_name' => 'Content',
                'multiple' => 0,
                'item_max' => 0,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'template_id' => 1,
                'block_name' => 'Sidebar',
                'multiple' => 0,
                'item_max' => 0,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'template_id' => 1,
                'block_name' => 'Slider',
                'multiple' => 0,
                'item_max' => 0,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebPageElementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('web_page_element')->insert([
            [
                'group_id' => 1,
                'name' => 'Header',
                'value' => '<h1>Header</h1>',
                'type' => 'html',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'group_id' => 1,
                'name' => 'Footer',
                'value' => '<h1>Footer</h1>',
                'type' => 'html',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'group_id' => 1,
                'name' => 'Content',
                'value' => '<h1>Content</h1>',
                'type' => 'html',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'group_id' => 1,
                'name' => 'Sidebar',
                'value' => '<h1>Sidebar</h1>',
                'type' => 'html',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'group_id' => 2,
                'name' => 'Header',
                'value' => '<h1>Header</h1>',
                'type' => 'html',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create seeder for web_blog table 5 records

        DB::table('web_blog')->insert([
            [
                'title' => 'News',
                'caption' => 'News',
                'category' => '1',
                'url' => 'news',
                'cover' => '',
                'content' => '',
                'meta_title' => 'News',
                'meta_description' => 'News',
                'meta_keywords' => 'News',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Events',
                'caption' => 'Events',
                'category' => '2',
                'url' => 'events',
                'cover' => '',
                'content' => '',
                'meta_title' => 'Events',
                'meta_description' => 'Events',
                'meta_keywords' => 'Events',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Press',
                'caption' => 'Press',
                'category' => '3',
                'url' => 'press',
                'cover' => '',
                'content' => '',
                'meta_title' => 'Press',
                'meta_description' => 'Press',
                'meta_keywords' => 'Press',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Blog',
                'caption' => 'Blog',
                'category' => '4',
                'url' => 'blog',
                'cover' => '',
                'content' => '',
                'meta_title' => 'Blog',
                'meta_description' => 'Blog',
                'meta_keywords' => 'Blog',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'About',
                'caption' => 'About',
                'category' => '5',
                'url' => 'about',
                'cover' => '',
                'content' => '',
                'meta_title' => 'About',
                'meta_description' => 'About',
                'meta_keywords' => 'About',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}

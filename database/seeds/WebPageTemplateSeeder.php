<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebPageTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create seeder for web_page_template table 5 records
        DB::table('web_page_template')->insert([
            [
                'title' => 'Home',
                'url' => 'home',
                'label' => 'Home',
                'parent' => 0,
                'layout' => 1,
                'category' => 1,
                'meta_title' => 'Home',
                'meta_description' => 'Home',
                'meta_keywords' => 'Home',
                'header_position' => 1,
                'footer_position' => 1,
                'page_order' => 1,
                'status' => 1,
            ],
            [
                'title' => 'About Us',
                'url' => 'About',
                'label' => 'About',
                'parent' => 0,
                'layout' => 2,
                'category' => 2,
                'meta_title' => 'About',
                'meta_description' => 'About',
                'meta_keywords' => 'About',
                'header_position' => 1,
                'footer_position' => 1,
                'page_order' => 2,
                'status' => 1,
            ],
            [
                'title' => 'Our Services ',
                'url' => 'services',
                'label' => 'Services',
                'parent' => 0,
                'layout' => 3,
                'category' => 3,
                'meta_title' => 'Our Services',
                'meta_description' => 'Our Services',
                'meta_keywords' => 'Our Services',
                'header_position' => 1,
                'footer_position' => 1,
                'page_order' => 3,
                'status' => 1
            ],
            [
                'title' => 'Blog',
                'url' => 'blog',
                'label' => 'Blog',
                'parent' => 0,
                'layout' => 4,
                'category' => 5,
                'meta_title' => 'Blog',
                'meta_description' => 'Blog',
                'meta_keywords' => 'Blog',
                'header_position' => 1,
                'footer_position' => 1,
                'page_order' => 4,
                'status' => 1
            ],
            [
                'title' => 'Contact',
                'url' => 'contact',
                'label' => 'Contact',
                'parent' => 0,
                'layout' => 5,
                'category' => 7,
                'meta_title' => 'Contact',
                'meta_description' => 'Contact',
                'meta_keywords' => 'Contact',
                'header_position' => 1,
                'footer_position' => 1,
                'page_order' => 5,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Register',
                'url' => 'register',
                'label' => 'Register',
                'parent' => 0,
                'layout' => 6,
                'category' => 9,
                'meta_title' => 'Register',
                'meta_description' => 'Register',
                'meta_keywords' => 'Register',
                'header_position' => 0,
                'footer_position' => 0,
                'page_order' => 6,
                'status' => 1
            ]
        ]);
    }
}

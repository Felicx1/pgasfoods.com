<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebPageLayoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('web_page_layout')->insert([
            [
                'label' => 'Home',
                'layout' => 'home.blade.php',
                'status' => 1,
                'description' => 'Home'
            ],
            [
                'label' => 'About',
                'layout' => 'about.blade.php',
                'status' => 1,
                'description' => 'About'
            ],
            [
                'label' => 'Services',
                'layout' => 'services.blade.php',
                'status' => 1,
                'description' => 'Our services Layout'
            ],
            [
                'label' => 'Blogs',
                'layout' => 'blog.blade.php',
                'status' => 1,
                'description' => 'Blogs'
            ],
            [
                'label' => 'Contact',
                'layout' => 'contact.blade.php',
                'status' => 1,
                'description' => 'Contact Us'
            ],
            [
                'label' => 'General',
                'layout' => 'general.blade.php',
                'status' => 1,
                'description' => 'Contact Us'
            ]
        ]);
    }
}

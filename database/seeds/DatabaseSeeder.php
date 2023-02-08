<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(WebPageTemplateSeeder::class);
        $this->call(WebPageLayoutSeeder::class);
        $this->call(WebPageGroupSeeder::class);
        $this->call(WebPageElementSeeder::class);
        $this->call(WebPageBlocksSeeder::class);
        $this->call(WebBlogSeeder::class);
        $this->call(WebBlogCategorySeeder::class);
    }
}

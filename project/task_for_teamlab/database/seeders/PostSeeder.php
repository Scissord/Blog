<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++){
            DB::table('posts')->insert([
                'category_id' => rand(1,10),
                'title' => 'Post '.$i,
                'slug' => 'post- '.$i,
                'description' => 'Description of post '.$i,
                'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque illo impedit laudantium nesciunt! Blanditiis fuga hic pariatur placeat quasi tenetur.<br>'.$i.'</p>',
            ]);
        }
    }
}

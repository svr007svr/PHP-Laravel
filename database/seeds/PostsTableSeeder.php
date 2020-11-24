<?php

use Illuminate\Database\Seeder;
use App/Post;
use App/Category;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $category1=Category::create([
            'name'='SVR'
        ]);

        
        $category2=Category::create([
            'name'='mVR'
        ]);

        
        $category3=Category::create([
            'name'='pVR'
        ]);

        
        $category4=Category::create([
            'name'='jVR'
        ]);

        
        
        $post1 = create::Post([

            'title'=>'We relocated our office to a new garage',
            'description'=>'Hello js',
            'content'=>'its all about the JS',
            'category_id'=>$category1->id,
            'image'=>'posts/6.jpg'

        ]);

        
        $post2 = create::Post([

            'title'=>'Top 5 brilliant content marketing strategies',
            'description'=>'Hello js',
            'content'=>'its all about the JS',
            'category_id'=>$category2->id,
            'image'=>'posts/7.jpg'

        ]);
        
        $post3 = create::Post([

            'title'=>'Best practices for minimalist design',
            'description'=>'Hello Python',
            'content'=>'its all about the PY',
            'category_id'=>$category3->id,
            'image'=>'posts/8.jpg'

        ]);
        
        $post4 = create::Post([

            'title'=>'Congratulate and thank to Maryam for joining our team',
            'description'=>'Hello ruby',
            'content'=>'its all about the ruby',
            'category_id'=>$category4->id,
            'image'=>'posts/9.jpg'

        ]);


    }
}

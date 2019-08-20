<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name'=>'JavaScript',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        DB::table('categories')->insert([
            'name'=>'Laravel',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        DB::table('categories')->insert([
            'name'=>'c++',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        DB::table('categories')->insert([
            'name'=>'Bootstrap',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        DB::table('categories')->insert([
            'name'=>'PHP',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('roles')->insert([
            'name'=>'administrator',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        DB::table('roles')->insert([
            'name'=>'author',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        DB::table('roles')->insert([
            'name'=>'subscriber',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Ivars',
            'role_id' => 1,
            'status'=>1,
            'email'=>'ivars@gmail.com',
            'password'=>bcrypt('password'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Tests',
            'role_id' => 2,
            'status'=>1,
            'email'=>'tests@gmail.com',
            'password'=>bcrypt('password'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('posts')->insert([
            'user_id'=> 1,
            'category_id'=>1,
            'title'=>'first post',
            'body'=>'first post body',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('posts')->insert([
            'user_id'=> 1,
            'category_id'=>1,
            'title'=>'second post',
            'body'=>'second post body',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('posts')->insert([
            'user_id'=> 2,
            'category_id'=>2,
            'title'=>'first post',
            'body'=>'fists post body for user tests',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('photos')->insert([
            'path'=>'AND_1564599149.png',
            'imageable_id'=>1,
            'imageable_type'=>'App\User',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('photos')->insert([
            'path'=>'064_1565702679.jpg',
            'imageable_id'=>2,
            'imageable_type'=>'App\User',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('photos')->insert([
            'path'=>'Bilde_ 001_1565726630.jpg',
            'imageable_id'=>1,
            'imageable_type'=>'App\Post',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('photos')->insert([
            'path'=>'Bilde__1565769912.jpg',
            'imageable_id'=>1,
            'imageable_type'=>'App\Post',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        DB::table('photos')->insert([
            'path'=>'IMG_1447_1565785246.JPG',
            'imageable_id'=>1,
            'imageable_type'=>'App\Post',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
    }
}

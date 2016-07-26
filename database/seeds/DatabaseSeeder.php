<?php

//namespace database\seeds;

use Illuminate\Database\Seeder;
//use database\seeds\LessonsTableSeeder;
use App\Lesson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lesson::truncate(); //Eloquent\Model
        //DB::table('lessons')->truncate();
        Eloquent::unguard();

        //$this->call(LessonsTableSeeder::class);
        $this->call('database\seeds\LessonsTableSeeder');
    }
}

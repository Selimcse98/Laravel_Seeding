# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

/////////////===========================##############################
https://laracasts.com/series/incremental-api-development/episodes/1
Local: /Users/mohammadselimmiah/Sites/larademos
  
  ===================================== .env database part  =====================================
DB_CONNECTION=mysql
DB_HOST=localhost:8889
DB_DATABASE=larademos
DB_USERNAME=root
DB_PASSWORD=root


===================================== mac terminal =====================================
$ mysql -u root -p
Enter password: root

mysql> create database larademos;
mysql> show databases;
mysql> use larademos;
mysql> show tables;
mysql> select * from lessons;
mysql> DESCRIBE lessons;
mysql> DELETE FROM lessons;


===================================== migration  =====================================
$ php artisan make:migration create_lessons_table
Created Migration: 2016_07_26_131931_create_lessons_table

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->string('title');
            $table->text('body');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('lessons');
    }
}

$ php artisan help migrate
//lessons table will be created in larademos database

===================================== Seeding  =====================================
create LessonsTableSeeder in database\seeds

<?php
namespace database\seeds;

use Illuminate\Database\Seeder;
use App\Lesson;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class LessonsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,30) as $index)
        {
            Lesson::create([
                'title' => $faker->sentence(5),
                'body' => $faker->paragraph(4)

            ]);
        }
        // $this->call(UsersTableSeeder::class);
    }
}

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
        Lesson::truncate();
        //DB::table('lessons')->truncate();
        Eloquent::unguard();

        //$this->call(LessonsTableSeeder::class);
        $this->call('database\seeds\LessonsTableSeeder');
    }
}

===================================== Faker Library  =====================================
$ sudo composer search faker
$ sudo composer require fzaninotto/faker --dev
or
$ sudo composer require fzaninotto/faker
Using version ^1.6 for fzaninotto/faker

===================================== Lesson Model  =====================================
<?php

namespace App;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Tags\See;

//class Lesson extends Model
class Lesson extends \Eloquent
{
    protected $fillable = ['title', 'body'];

}

$ composer dump-autoload
or 
$ composer dump-autoload --no-dev
Generating autoload files

$ php artisan db:seed
Seeded: database\seeds\LessonsTableSeeder

===================================== Error Class Not Found  =====================================
Solved: by adding

namespace database\seeds;

and then running command:

composer dump-autoload --no-dev


===================================== Creating new sets of data  =====================================
$ php artisan migrate:refresh --seed

Rolled back: 2016_07_26_131931_create_lessons_table
Rolled back: 2014_10_12_100000_create_password_resets_table
Rolled back: 2014_10_12_000000_create_users_table
Migrated: 2014_10_12_000000_create_users_table
Migrated: 2014_10_12_100000_create_password_resets_table
Migrated: 2016_07_26_131931_create_lessons_table

Note: this will automatically truncate database so no need to use
Lesson::truncate(); //Eloquent\Model
or DB::table('lessons')->truncate();


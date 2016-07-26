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

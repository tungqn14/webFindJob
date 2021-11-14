<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Welfare extends Model
{
    protected $table="welfares";
    protected $fillable=['id','name_welfare','icon_welfare'];

}

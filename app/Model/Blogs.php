<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    protected $table="blogs";
    protected $fillable=["id","description","content","active"];
}

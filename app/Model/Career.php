<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $primaryKey = "id";
    protected $fillable = ["id","name_career","active"];
    protected $table = 'career';
}

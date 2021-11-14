<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User_Skill extends Model
{
    protected $table="user_skill";
    protected $fillable =  ["user_id","skill_id"];
}

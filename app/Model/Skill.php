<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table="skills";
    protected $fillable=["id","nameSkill"];
}

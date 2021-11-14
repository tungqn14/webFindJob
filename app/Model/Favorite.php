<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table="company_user_favorite";
    protected $fillable=["id","user_id","company_id"];
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserSavePost extends Model
{
    protected $table="user_save_post";
    protected $fillable=["user_id","post_id"];
}

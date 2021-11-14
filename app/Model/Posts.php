<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Posts extends Model
{
    protected $table="posts";
    protected $primaryKey = 'id_post';
    protected $fillable=["id_post","desPost","reqPost","typeTimePost","deadline","wage","quantity","titlePost","rankPost","tech_id","user_id"];
    protected $guarded=[];
    public $timestamps = true;
    public function users(){
        return $this->belongsTo(User::class,"user_id");
    }


}

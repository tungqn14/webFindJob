<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CvSubmit extends Model
{
    protected $table="cv_submit";
    protected $fillable=["name","email","telephone",'cv',"post_submit_id"];
    public function post(){
        return $this->belongsTo(Posts::class,"post_submit_id","id_post");
    }
}

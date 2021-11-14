<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Company extends Model
{
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;
    protected $table="company";
    protected $fillable=["id","nameCompany","officeAddress","logo","vip","aboutCompany","website","scale","career_id","welfare_id"];
    public $timestamps = true;

    public function users(){
        return $this->hasMany(User::class,"company_id");
    }
    public function userPost(){
        return $this->hasManyThrough(Posts::class,User::class,"company_id","user_id","id","id");
    }
    public function location(){
        return $this->belongsTo(Location::class,"officeAddress");
    }
    public function favorites(){
        return $this->belongsToMany(User::class,"company_user_favorite","company_id","user_id");
    }
}

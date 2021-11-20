<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

    protected $table='locations';
    protected $fillable=["id","name","code","division_type","codename","phone_code"];
    public function company(){
        return $this->hasMany(Company::class,"officeAddress");
    }

}

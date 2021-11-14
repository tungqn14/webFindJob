<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $primaryKey = "id";
    protected $fillable = ["id","tenLinhVuc","active"];
    protected $table = 'categories';

    public function subcategory()
    {
        return $this->hasMany(\App\Model\Categories::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(\App\Model\Categories::class, 'parent_id');
    }

}

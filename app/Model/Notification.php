<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table="notification";
    protected $fillable=["type","data","notifiable_type",'notifiable_id',"id","read_at"];
}

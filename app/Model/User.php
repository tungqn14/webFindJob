<?php

namespace App\Model;

use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard = "web";
    protected $fillable = [
        'id','fullName', 'email','birthDay','gender',
        'password','user_level',
        'phone','address','desiredMoney','avatar','exp','rankUser',
        'descripYourself','position','cv','typeTimeUser',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }
    public function company(){
        return $this->belongsTo(Company::class,"company_id");
    }

    public function skills(){
        return $this->belongsToMany(Skill::class,"user_skill","user_id","skill_id");
    }
    public function posts(){
        return $this->hasMany(Posts::class,"id_user");
    }
    public function companyRecruiment()
    {
        return $this->belongsToMany(Company::class, 'company_user_recruiment',
            'user_recruiment_id', 'company_id');
    }
}

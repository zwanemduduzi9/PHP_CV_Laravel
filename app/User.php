<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','Surname', 'email','Mobile_Number','status_id','role_id','password',
    ];
    //protected $guard_name='web';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // function getUserRole()
    // {
    //     return $this->hasOne('App\Role', 'id', 'role_id');
    // }
    // function getUserStatus()
    // {
    //     return $this->hasOne('App\Http\Models\Status', 'id', 'status_id');
    // }
    
    function getUserStatus(){
        return $this->hasOne('App\Http\Model\statusModel','id','status_id');
    }
    function getUserRole(){
        return $this->hasOne('Spatie\Permission\Models\Role','id','role_id');
    }
}

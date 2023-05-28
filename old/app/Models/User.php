<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'username',
    //     'email',
    //     'password',
    // ];
    protected $guarded=[]; 

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    public function relPost(){
        return $this->hasMany('App\Models\Post', 'user_id', 'id');
    }
    
    public function relUserDetail(){
        return $this->hasOne('App\Models\UserDetail', 'user_id', 'id');
    }
    
    public function relParticipate(){
        return $this->hasOne('App\Models\Participate', 'participate_from', 'id');
    }

    public function relSecret(){
        return $this->hasMany('App\Models\Secret', 'sec_from_id', 'id');
    }

    public function relSubscription(){
        return $this->hasOne('App\Models\Subscription', 'user_id', 'id');
    }

    public function relReceiverM(){
        return $this->hasMany('App\Models\Message', 'receiver_id', 'id');
    }

    public function relSenderM(){
        return $this->hasMany('App\Models\Message', 'sender_id', 'id');
    }

    public function relEvent(){
        return $this->hasMany('App\Models\Event', 'user_id', 'id')->where('active_status','active');
    }

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

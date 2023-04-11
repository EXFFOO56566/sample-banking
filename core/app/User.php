<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    protected $table = 'users';



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getNameAttribute(){
        return  $this->first_name.' '.$this->last_name;
    }

    public function user()

    {
        return $this->belongsTo(User::class)->withTrashed();

    }
    public function userName()

    {
    return $this->belongsTo(User::class)->withTrashed();

    }


    public function rating()

    {
        return $this->belongsTo(User::class)->withTrashed();

    }
    public function Ads()

    {
        return $this->belongsTo(User::class)->withTrashed();

    }
    public function hyipUser()

    {
        return $this->belongsTo(User::class)->withTrashed();

    }

    public function eplayer()
    {
        return $this->hasMany('App\Eplayer', 'id', 'user_id');
    }

    public function bplayer()
    {
        return $this->hasMany('App\Bplayer', 'id', 'user_id');
    }

    public function qplayer()
    {
        return $this->hasMany('App\Qplayer', 'id', 'user_id');
    }

    public function nplayer()
    {
        return $this->hasMany('App\Nplayer', 'id', 'user_id');
    }

    public function withdraw()
    {
        return $this->hasMany('App\Withdraw', 'id', 'user_id');
    }

    public function deposit()
    {
        return $this->hasMany('App\Deposit', 'id', 'user_id');
    }
    public function transaction()
    {
        return $this->hasMany('App\Transaction', 'id', 'user_id');
    }
}

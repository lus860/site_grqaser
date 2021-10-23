<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

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

    public static function checkAdmin($email, $password) {
        $user = self::getAdmin($email);
        if (!$user || !Hash::check($password, $user->password)) return false;
        return $user;
    }

    public static function getAdmin($email) {
        $user = self::where('email', $email)->where('admin', '>', 0)->first();
        if ($user===null) return false;
        return $user;
    }

    public static function getUsers(){
        return self::where('admin', 0)->sort()->get();
    }


    public static function getUser($email) {
        return \App\Models\User::where(['email'=>$email, 'admin'=>0])->first();
    }

    public function isAdmin() {
        return $this->admin > 0;
    }

    public function isVerified(){
        return (empty($this->verification) || $this->admin>0);
    }

}

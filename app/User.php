<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\traits\HasRoles;
use Illuminate\Support\Facades\Cache;

/**
 * Class User
 * 
 * @package App
 */
class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /** @var array $fillable The attributes that are mass assignable. */
    protected $fillable = ['firstname', 'lastname', 'email', 'password', 'last_login_at', 'last_login_ip'];

    /** @var array $hidden The attributes that should be hidden for arrays. */
    protected $hidden = ['password', 'remember_token'];

    /** @var array $casts The attributes that should be cast to native types. */
    protected $casts = ['email_verified_at' => 'datetime'];

    /** @var array $dates The attributes that should be mutated to dates. */
    protected $dates = ['last_login_at', 'created_at', 'updated_at'];

    /**
     * Method for hasing the given password in the application storage. 
     * 
     * @param  string $password The given or generated password from the application/form.
     * @return void 
     */
    public function setPasswordAttribute(string $password): void 
    {
        $this->attributes['password'] = bcrypt($password);   
    }

    /**
     * Method for tracking if the user is online or not. 
     * 
     * @return bool
     */
    public function isOnline(): bool 
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getNameAttribute(): string
    {
        return ucfirst($this->firstname) . ' ' . ucfirst($this->lastname);
    }
}

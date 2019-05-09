<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\traits\HasRoles;

/**
 * Class User
 * 
 * @package App
 */
class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /** @var array $fillable The attributes that are mass assignable. */
    protected $fillable = ['firstname', 'lastname', 'email', 'password'];

    /** @var array $hidden The attributes that should be hidden for arrays. */
    protected $hidden = ['password', 'remember_token'];

    /** @var array The attributes that should be cast to native types. */
    protected $casts = ['email_verified_at' => 'datetime'];

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
     * Get the user's full name.
     *
     * @return string
     */
    public function getNameAttribute(): string
    {
        return ucfirst($this->firstname) . ' ' . ucfirst($this->lastname);
    }
}

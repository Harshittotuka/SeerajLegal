<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use CanResetPasswordTrait;
    use Notifiable;

    // If you're using the 'admins' table, ensure it's defined here
    protected $table = 'admins';

    // Add any fillable fields
    protected $fillable = ['name', 'email', 'phone', 'type', 'profile_image', 'password', 'remember_token'];

    // If you're hashing the password on registration, ensure this is set
    protected $hidden = ['password', 'remember_token'];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new \App\Notifications\AdminResetPasswordNotification($token));
    }
}

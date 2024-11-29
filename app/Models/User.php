<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';

    protected $fillable = [
        'fullname',
        'email',
        'class',
        'role',
        'password',
    ];

    // Relationship with enrollment
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'studentid');
    }
}

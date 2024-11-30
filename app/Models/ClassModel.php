<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
        'teacherid',
        'credit_hours',
    ];

    // Relationship with sessions
    public function sessions()
    {
        return $this->hasMany(Session::class, 'classid');
    }

    // Relationship with enrollments
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'classid');
    }

    // Relationship with teacher (User model)
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacherid');
    }
}

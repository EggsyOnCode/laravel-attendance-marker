<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'studentid',
        'classid',
    ];

    // Relationship with student (User model)
    public function student()
    {
        return $this->belongsTo(User::class, 'studentid');
    }

    // Relationship with class
    public function classModel()
    {
        return $this->belongsTo(ClassModel::class, 'classid');
    }
}

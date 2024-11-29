<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'classid',
        'sessionid',
        'studentid',
        'isPresent',
        'comments',
    ];

    // Relationship with session
    public function session()
    {
        return $this->belongsTo(Session::class, 'sessionid');
    }

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

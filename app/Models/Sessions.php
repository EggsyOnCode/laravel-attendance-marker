<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'classid',
        'starttime',
        'endtime',
        'session_date',
    ];

    // Relationship with class
    public function classModel()
    {
        return $this->belongsTo(ClassModel::class, 'classid');
    }

    // Relationship with attendance
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'sessionid');
    }
}

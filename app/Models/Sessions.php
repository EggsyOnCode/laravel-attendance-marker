<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    public $timestamps = false; // Disable automatic timestamps

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

    public static function getTeacherSessionsForDay($teacherId, $date)
    {
        return self::join('class', 'sessions.classid', '=', 'class.id')
            ->where('class.teacherid', $teacherId)
            ->where('sessions.session_date', $date)
            ->get(['sessions.id AS session_id', 'class.id AS class_id', 'sessions.starttime', 'sessions.endtime', 'sessions.session_date']);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance'; 
    public $timestamps = false; // Disable automatic timestamps

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

    public static function updateOrCreateAttendance($classId, $sessionId, $studentId, $isPresent, $status)
    {
        return self::updateOrCreate(
            [
                'class_id' => $classId,
                'session_id' => $sessionId,
                'student_id' => $studentId,
            ],
            [
                'is_present' => $isPresent,
                'status' => $status,
            ]
        );
    }
}

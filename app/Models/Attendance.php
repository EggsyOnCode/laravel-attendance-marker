<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; // Import DB facade

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

    public $incrementing = false; // Disable auto-incrementing ID
    protected $primaryKey = null; // Disable the primary key completely

    // Use the unique attributes to find records
    public function updateAttendance($data)
    {
        return DB::table($this->table)
            ->where('sessionid', $data['sessionid'])
            ->where('classid', $data['classid'])
            ->where('studentid', $data['studentid'])
            ->update([
                'isPresent' => $data['isPresent'],
                'comments' => $data['comments'],
            ]);
    }


    public static function updateOrCreateAttendance($classId, $sessionId, $studentId, $isPresent, $status)
    {
        return self::updateOrCreate(
            [
                'classid' => $classId,
                'sessionid' => $sessionId,
                'studentid' => $studentId,
            ],
            [
                'isPresent' => $isPresent,
                'comments' => $status,
            ]
        );
    }

}

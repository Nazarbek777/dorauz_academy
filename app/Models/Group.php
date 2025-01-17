<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups'; // Jadval nomi

    // Mass assignable ustunlar
    protected $fillable = [
        'branch_id',
        'enrollment_id',
        'course_id',
        'teacher_id',
        'room',
        'day_table',
        'time_table',
        'group_name',
        'days_of_week',
        'start_time',
        'end_time'
    ];

    // enrollment_id atributini array (JSON) ga aylantirish
    protected $casts = [
        'enrollment_id' => 'array',
        'days_of_week' => 'array' // Cast days_of_week to array
    ];

    // Relationship with Attendance model
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'group_id');
    }

    // Relationship with Branch model
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    // Many-to-Many relationship with User model through group_enrollment table
    public function enrollments()
    {
        return $this->belongsToMany(StudentRegister::class, 'group_enrollment', 'group_id', 'student_register_id');
    }

    // Relationship with Transaction model
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'groups_id');
    }

    // Relationship with Course model
    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    // Relationship with User model for teachers
    public function teachers()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}

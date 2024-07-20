<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'user_id',
        'date',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function studentRegister()
    {
        return $this->belongsTo(StudentRegister::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_enrollment');
    }
}

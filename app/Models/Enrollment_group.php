<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment_group extends Model
{
    use HasFactory;
    protected $table = "group_enrollment";

    protected $fillable = [
        'group_id',
        'user_id',
        'date'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    
}

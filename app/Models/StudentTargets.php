<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTargets extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'competition',
        'paper_presentation',
        'online_course',
        'patent',
        'internship',
    ];

    public function student()
    {
        return $this->belongsTo(Students::class);
    }
}

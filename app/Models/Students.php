<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $fillable = [
        'roll_no',
        'name',
        'email',
        'year',
        'profile_img',
        'semester',
        'course',
        'branch',
    ];   
    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function targets()
    {
        return $this->hasMany(StudentTargets::class);
    }
}

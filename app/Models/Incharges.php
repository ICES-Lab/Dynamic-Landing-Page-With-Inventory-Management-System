<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incharges extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'department',
        'level',
        'email',
        'profile_img',
        'is_active',
    ];
    protected $casts = [
        'is_active' => 'boolean',
    ];
    public function top()
    {
        return $this->hasMany(InchargesTop::class);
    }
    public function socialMedia()
    {
        return $this->hasMany(InchargesSocialMedia::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InchargesBottom extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'medium_id',
        'is_active',
    ];

    public function medium()
    {
        return $this->belongsTo(InchargesMedium::class, 'medium_id');
    }
}

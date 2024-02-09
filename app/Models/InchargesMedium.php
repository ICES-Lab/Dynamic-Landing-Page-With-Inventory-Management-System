<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InchargesMedium extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'top_id',
        'is_active',
    ];

    public function top()
    {
        return $this->belongsTo(InchargesTop::class, 'top_id');
    }
    public function bottom()
    {
        return $this->hasMany(InchargesBottom::class);
    }
}

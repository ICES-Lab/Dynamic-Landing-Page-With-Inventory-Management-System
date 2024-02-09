<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InchargesTop extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'incharge_id',
        'is_active',
    ];

    public function incharge()
    {
        return $this->belongsTo(Incharges::class);
    }
    public function medium()
    {
        return $this->hasMany(InchargesMedium::class);
    }
}

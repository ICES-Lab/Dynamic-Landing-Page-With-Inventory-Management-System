<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InchargesSocialMedia extends Model
{
    use HasFactory;
    protected $fillable = [
        'link',
        'incharge_id',
        'is_active',
    ];
    public function incharge()
    {
        return $this->belongsTo(Incharges::class);
    }
}

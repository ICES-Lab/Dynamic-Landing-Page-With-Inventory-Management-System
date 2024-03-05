<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InchargesSocialMedia extends Model
{
    use HasFactory;
    protected $fillable = [
        'link',
        'icon_img',
        'incharge_id',
        'is_active',
    ];
    protected $casts = [
        'is_active' => 'boolean',
    ];
    public function incharge()
    {
        return $this->belongsTo(Incharges::class);
    }
}

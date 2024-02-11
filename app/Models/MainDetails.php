<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'lab_name',
        'mission',
        'vision',
        'what_we_do',
        'what_we_do_pic',
        'icon1',
        'icon2',
        'icon1_name',
        'icon2_name',
        'is_active',
    ];
    public function iconcode1()
    {
        return $this->belongsTo(Icons::class, 'icon1');
    }

    public function iconcode2()
    {
        return $this->belongsTo(Icons::class, 'icon2');
    }
}

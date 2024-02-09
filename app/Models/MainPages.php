<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainPages extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'head_icon_pic',
        'content',
        'quote',
        'page_pic',
        'inhead',
        'infoot',
        'is_active',
        'is_layout'
    ];
    public function subPages()
    {
        return $this->hasMany(SubPages::class);
    }
}

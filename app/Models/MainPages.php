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
        'is_layout',
        'in_slider',
        'in_home',
        'in_home_foot'
    ];
    protected $casts = [
        'inhead' => 'boolean',
        'infoot' => 'boolean',
        'is_layout' => 'boolean',
        'in_slider' => 'boolean',
        'in_home' => 'boolean',
        'in_home_foot' => 'boolean',
        'is_active' => 'boolean',
    ];
    public function subPages()
    {
        return $this->hasMany(SubPages::class);
    }
}

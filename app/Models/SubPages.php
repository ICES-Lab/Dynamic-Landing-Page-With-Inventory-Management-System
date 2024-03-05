<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubPages extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'main_page_id',
        'img1',
        'img2',
        'img3',
        'active_img',
        'is_active',
    ];
    protected $casts = [
        'is_active' => 'boolean',
    ];
    public function mainPage()
    {
        return $this->belongsTo(MainPages::class, 'main_page_id', 'id');
    }
    public function left()
    {
        return $this->hasMany(SubPagesLeft::class);
    }
    public function right()
    {
        return $this->hasMany(SubPagesRight::class);
    }
    public function media()
    {
        return $this->hasMany(SubPagesSocialMedia::class);
    }
}

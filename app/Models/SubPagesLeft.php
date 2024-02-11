<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubPagesLeft extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'img1',
        'img2',
        'sub_page_id',
        'is_active',
    ];
    public function subPage()
    {
        return $this->belongsTo(SubPages::class, 'sub_page_id', 'id');
    }
}

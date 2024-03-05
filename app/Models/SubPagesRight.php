<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubPagesRight extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'sub_page_id',
        'in_sub_page',
        'is_active',
    ];
    protected $casts = [
        'is_active' => 'boolean',
    ];
    public function subPage()
    {
        return $this->belongsTo(SubPages::class, 'sub_page_id', 'id');
    }
}

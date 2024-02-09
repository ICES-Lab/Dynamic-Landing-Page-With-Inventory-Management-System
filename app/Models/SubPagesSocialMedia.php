<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubPagesSocialMedia extends Model
{
    use HasFactory;
    protected $fillable = [
        'icon', 'target', 'link', 'sub_page_id', 'is_active'
    ];
    public function subPage()
    {
        return $this->belongsTo(SubPages::class, 'sub_page_id');
    }
}

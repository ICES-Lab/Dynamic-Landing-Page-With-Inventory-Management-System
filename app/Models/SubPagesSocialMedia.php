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
    protected $casts = [
        'is_active' => 'boolean',
    ];
    public function subPage()
    {
        return $this->belongsTo(SubPages::class, 'sub_page_id', 'id');
    }
    public function iconcode()
    {
        return $this->belongsTo(Icons::class, 'icon','id');
    }
}

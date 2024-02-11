<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactDetails extends Model
{
    use HasFactory;
    protected $fillable = ['contact', 'type', 'target', 'icon'];
    public function iconcode()
    {
        return $this->belongsTo(Icons::class, 'icon');
    }
}

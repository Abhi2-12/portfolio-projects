<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'project_url',
        'image',
        'status'
    ];

    // Accessor for image URL
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }
}
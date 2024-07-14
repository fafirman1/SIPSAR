<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'logo',
        'sejarah',
        'visi',
        'misi',
        'lokasi',
    ];

    protected $casts = [
        'misi' => 'array',
    ];
}


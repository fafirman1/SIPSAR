<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    // protected $table = 'gurus';

    protected $fillable = [
        'nama', 'nip', 'email', 'telp', 'alamat', 'tanggal_lahir', 'foto'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nis',
        'email',
        'laporan',
        'image',
        'photo_laporan',
    ];
}

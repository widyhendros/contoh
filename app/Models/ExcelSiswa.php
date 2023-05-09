<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcelSiswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'Jalur Pendaftaran',
        'NISN',
        'Nama',
        'NIK',
        'Tanggal Lahir'
    ];
}

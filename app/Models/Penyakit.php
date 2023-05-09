<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'penyakit';
	public $timestamps = false;
	public $incrementing = false;
}

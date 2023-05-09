<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminatan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'peminatan';
	public $timestamps = false;
	public $incrementing = false;
}

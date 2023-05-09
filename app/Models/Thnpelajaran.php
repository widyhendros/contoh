<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thnpelajaran extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'thnpelajaran';
	public $timestamps = false;
	public $incrementing = false;
}

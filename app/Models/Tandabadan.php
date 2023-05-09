<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tandabadan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'tandabadan';
	public $timestamps = false;
	public $incrementing = false;
}

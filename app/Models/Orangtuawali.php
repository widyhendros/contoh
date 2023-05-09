<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orangtuawali extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'orangtuawali';
	public $timestamps = false;
	public $incrementing = false;
}

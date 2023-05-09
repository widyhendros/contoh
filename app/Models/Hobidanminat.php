<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobidanminat extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'hobidanminat';
	public $timestamps = false;
	public $incrementing = false;
}

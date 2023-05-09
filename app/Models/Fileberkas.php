<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fileberkas extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'fileberkas';
	public $timestamps = false;
	public $incrementing = false;
}

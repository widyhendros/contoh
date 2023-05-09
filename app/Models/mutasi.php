<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mutasi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'mutasi';
	public $timestamps = false;
	public $incrementing = false;
}

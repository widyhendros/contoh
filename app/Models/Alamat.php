<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;

    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'alamat';
	public $timestamps = false;
	public $incrementing = false;

}

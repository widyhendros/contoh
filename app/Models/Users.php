<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Users extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'users';
	public $timestamps = false;
	public $incrementing = false;
    protected $fillable = [
        'nisn',
        'name',
        'password',
    ];

    public function scopeFilteruser($query, array $filters)
{
    $query->when($filters['cari_user'] ?? false, function($query, $search){
        return $query->where(function($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        });
    });
}
}



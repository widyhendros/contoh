<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'kelas';
	public $timestamps = false;
	public $incrementing = false;

    public function scopeCariKelas($query, array $filters)
    {
        $query->when($filters['carikelas'] ?? false, function($query, $search){
            return $query->where(function($query) use ($search) {
                $query->where('nama_kelas', 'like', '%' . $search . '%');
            });
        });
    }
}

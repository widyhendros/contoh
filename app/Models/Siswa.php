<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'siswa';
	public $timestamps = false;
	public $incrementing = false;
    protected $guarded = [
        'id',
    ];

    public function hobidanminat(){
        return $this->hasMany(Hobidanminat::class, "idsiswa");
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where(function($query) use ($search) {
                $query->where('nmlengkap', 'like', '%' . $search . '%');
            });
        });
    }

    public function scopeFilterkelas($query, array $filters)
    {
        $query->when($filters['filter_kelas'] ?? false, function($query, $search){
            return $query->where(function($query) use ($search) {
                $query->where('alokasi_kelas.id_kelas', $search);
            });
        });
    }

    public function scopeFiltermutasi($query, array $filters)
    {
        $query->when($filters['filter_mutasi'] ?? false, function($query, $search){
            return $query->where(function($query) use ($search) {
                $query->where('nmlengkap', 'like', '%' . $search . '%');
            });
        });
    }

    public function scopeFiltersiswakelas($query, array $filters)
    {
        $query->when($filters['filter_siswakelas'] ?? false, function($query, $search){
            return $query->where(function($query) use ($search) {
                $query->where('siswa.nmlengkap', $search);
            });
        });
    }

    public function scopeFilterthnmasuk($query, array $filters)
    {
        $query->when($filters['filter_thnmasuk'] ?? false, function($query, $search){
            return $query->where(function($query) use ($search) {
                $query->where('siswa.thn_masuk', $search);
            });
        });

    }

    public function scopeFilterjurusan($query, array $filters)
    {
        $query->when($filters['filter_jurusan'] ?? false, function($query, $search){
            return $query->where(function($query) use ($search) {
                $query->where('siswa.nmjurusan', $search);
            });
        });

    }

    // public function scopeBulanmutasi($query, array $filters)
    // {
    //     $query->when($filters['filter_bulanmutasi'] ?? false, function($query, $search){
    //         return $query->where(function($query) use ($search) {
    //             $query->where('siswa.nmjurusan', $search);
    //         });
    //     });

    // }

    public function scopeBulanmutasi($query, array $filters)
    {
        $query->when($filters['filter_bulanmutasi'] ?? false, function($query, $search){
            return $query->where(function($query) use ($search) {
                $query->where('siswa.tanggal', $search);
            });
        });

    }

    public function scopeSiswabaru($query, array $filters)
    {
        $query->when($filters['filter_siswabaru'] ?? false, function($query, $search){
            return $query->where(function($query) use ($search) {
                $query->where('siswa.thn_masuk', $search);
            });
        });

    }
}

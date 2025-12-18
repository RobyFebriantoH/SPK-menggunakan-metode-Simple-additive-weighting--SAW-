<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KriteriaModel extends Model
{
    use HasFactory;

    protected $table = 'kriteria';
    protected $primaryKey = 'id_kriteria';
    protected $fillable = ['keterangan', 'kode_kriteria', 'bobot', 'jenis'];
    public $timestamps = false;

    // Definisikan relasi ke SubKriteriaModel

    public function sub_kriteria()
    {
        return $this->hasMany(SubKriteriaModel::class, 'id_kriteria');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlternatifModel extends Model
{
    protected $table = 'alternatif';
    protected $primaryKey = 'id_alternatif';
    protected $fillable = ['nama','harga','fasilitas','jenis_lapangan','deskripsi','gambar'];
    public $timestamps = false;

    // AlternatifModel.php
public function penilaian()
{
    return $this->hasMany(PenilaianModel::class, 'id_alternatif', 'id_alternatif');
}
public function sub_kriteria()
{
    return $this->belongsTo(SubKriteriaModel::class, 'id_sub_kriteria', 'id_sub_kriteria');
}


}

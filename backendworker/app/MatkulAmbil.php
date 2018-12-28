<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatkulAmbil extends Model
{
	protected $table = 'kelas_ambil';
    protected $primaryKey = 'id_kelas_ambil';
    public $timestamps = false;
    public $incrementing = false;

    public function kelasDiambil()
    {
    	return $this->belongsTo('App\Kelas', "id_kelas");
    }
    public function matkulDiambil()
    {
    	return $this->belongsTo('App\Matkul', "id_matkul");
    }
    public function mahasiswaDiambil()
    {
    	return $this->belongsTo('App\Mahasiswa', "nrp");
    }
}

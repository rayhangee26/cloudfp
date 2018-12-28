<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
	protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    public $timestamps = false;
    public $incrementing = false;

    public function kelasAmbils()
    {
    	return $this->hasMany('App\MatkulAmbil', "id_kelas");
    }
}


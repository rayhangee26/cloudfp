<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    use Notifiable;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nrp';
    public $timestamps = false;
    public $incrementing = false;

    public function mahasiswaAmbils()
    {
    	return $this->hasMany('App\MatkulAmbil', "nrp");
    }
}

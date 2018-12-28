<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MatkulAmbil;
use App\Mahasiswa;
use App\Kelas;
use App\Matkul;
use Uuid;
use Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function admin(Request $request)
    {
        $data['kelass'] = Kelas::get();
        $data['matkuls'] = Matkul::get();
        $data['active']= 'events';
        $data['matkul_ambils']=MatkulAmbil::with(['kelasDiambil','matkulDiambil','mahasiswaDiambil'])->groupBy(['id_matkul', 'id_kelas'])->select('id_kelas','id_matkul')->get();
        // dd($data['matkul_ambils']);

        return view('admin', $data);
    }
    public function add(Request $request)
    {

        $insert= new MatkulAmbil;
        $insert->id_kelas_ambil    = Uuid::generate();
        $insert->nrp                =$request->nrp;
        $insert->id_matkul          =$request->matkul;
        $insert->id_kelas           =$request->kelas;
        $insert->save();

        return back()->with('status','Event added!');
    }

    public function list(Request $request)
    {
        $data['active']= 'events';
        $data['matkul_ambils']=MatkulAmbil::with(['kelasDiambil','matkulDiambil','mahasiswaDiambil'])->where('id_kelas', $request->id_kelas)->where('id_matkul', $request->id_matkul)->paginate(30);
        //dd($data['matkul_ambils']);
        return view('lihatkelas', $data);
        return Response::json($data['matkul_ambils']);
    }
   
    public function index()
    {
        return view('home');
    }
}

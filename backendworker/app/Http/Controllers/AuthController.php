<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Html\FormFacade;
use Illuminate\Support\Facades\Validator;
use Response;
use Redirect;
use Uuid;
use Session;
use DB;
use App\Mahasiswa;
class AuthController extends Controller
{
    public function login()
    {
    	if(Auth::user())
    		return redirect('/admin');
    	return view('auth.login');
    }
    public function register()
    {
    	return view('auth.register');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function doLogin(Request $request)
    {
    	$messagesError = [ 
            'nrp.required' => 'NRP tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            ];
        $validator = Validator::make($request->all(), [ 
                'nrp' => 'required',
                'password' => 'required',
            ], $messagesError);
        if($validator->fails()) 
        { 
            return Redirect::to('/login')
                ->withErrors($validator)->withInput();
        }
    	if(Auth::attempt(['nrp' => $request->nrp , 'password' => $request->password])){
            return redirect('/admin');
        }
        return redirect()->back()->withErrors('NRP atau Password salah');
    }
    public function doRegister(Request $request)
    {
    	$messagesError = [ 
            'nrp.required' => 'NRP tidak boleh kosong',
            'name.required' => 'Nama tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'password_confirmation.required' => 'Konfirmasi Password tidak boleh kosong'
            ];
    	$validator = Validator::make($request->all(), [ 
                'nrp' => 'required',
                'name' => 'required',
                'password' => 'required',
                'password_confirmation' => 'required|same:password'
            ], $messagesError);
        if($validator->fails()) 
        { 
	    //return dd($_POST);
            return Redirect::to('/register')
                ->withErrors($validator)->withInput();
        }
    	$pengguna = new Mahasiswa;
        $pengguna->nrp = $request->nrp;
    	$pengguna->nama = $request->name;
    	$pengguna->password = bcrypt($request->password);
        $pengguna->save();
	//dd($pengguna);
        return redirect('/login')->with('message','Anda berhasil mendaftarkan diri.');    	
    }
}

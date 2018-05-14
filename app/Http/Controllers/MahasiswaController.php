<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;

class MahasiswaController extends Controller
{
    public function index(){
    	$mahasiswa = Mahasiswa::all();
    	return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function addMahasiswa(Request $req){
    	$rules = array(
    		'nim' => 'required',
    		'nama' => 'required',
    		'jenis_kelamin' => 'required',
    		'no_hp' => 'required',
    		'foto' => 'required',
    	);

    	$validator = Validator::make ( Input::all(), $rules);
    	if ($validator->fails())
    		return Response::json(array('errors'=>$validator->getMessageBag()->toarray()));
    	
    	else{
    		$mahasiswa = new mahasiswa;
    		$mahasiswa->nim = $req->nim;
    		$mahasiswa->nama = $req->nama;
    		$mahasiswa->jenis_kelamin = $req->jenis_kelamin;
    		$mahasiswa->no_hp = $req->no_hp;
    		$mahasiswa->foto = $req->foto;
    		$mahasiswa->save();

    		return response()->json($mahasiswa);
    	}
    }

    public function editMahasiswa(request $req){
	  	$mahasiswa = Mahasiswa::find($req->id);
	  	$mahasiswa->nim = $req->nim;
	  	$mahasiswa->nama = $req->nama;
    	$mahasiswa->jenis_kelamin = $req->jenis_kelamin;
    	$mahasiswa->no_hp = $req->no_hp;
    	$mahasiswa->foto = $req->foto;
	  	$mahasiswa->save();

	 	return response()->json($mahasiswa);
	}

	public function deleteMahasiswa(request $req){
	  $mahasiswa = Mahasiswa::find($req->id)->delete();

	  return response()->json();
	}

}

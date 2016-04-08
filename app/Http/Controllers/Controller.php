<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Patients;
use App\Records;
use Auth;
use Input;
use Redirect;
use Session;

class Controller extends BaseController
{
    public function index() {
    	return view('welcome');
    }

    public function newPatient() {
    	return view('newPatient');
    }

    public function createPatient() {
    	Patients::create([
    		'nama' => Input::get('nama'),
    		'alamat' => Input::get('alamat'),
    		'umur' => Input::get('umur'),
    		'kontak' => Input::get('kontak'),
		]);
		$message = 'Pasien baru berhasil ditambah';
		return view('message', compact('message'));
    }

    public function listPatient() {
    	$patients = Patients::all();
    	return view('listPatient', compact('patients'));
    }

    public function editPatient() {
    	$patient = Patients::where('id', Input::get('id'))->first();
    	return view ('editPatient', compact('patient'));
    }

    public function updatePatient() {
    	$patient = Patients::where('id', Input::get('id'))->first();
    	$patient->nama = Input::get('nama');
    	$patient->alamat = Input::get('alamat');
    	$patient->umur = Input::get('umur');
    	$patient->kontak = Input::get('kontak');
    	$patient->save();

    	$message = "Data pasien bersangkutan sudah diperbaharui";
    	return view('message', compact('message'));
    }

    public function deletePatient() {
    	$patient = Patients::where('id', Input::get('id'))->first();
    	$patient->delete();

    	$records = Records::all();
    	if (count($records)>0) {
	    	foreach ($records as $record) {
	    		if ($record->patient_id == Input::get('id')) {
	    			$record->delete();
	    		}
	    	}
	    }

    	$message = "Data pasien bersangkutan sudah dihapus";
    	return view('message', compact('message'));
    }

    public function showRecord() {
    	$patient = Patients::where('id', Input::get('id'))->first();
    	$records = Records::where('patient_id', Input::get('id'))->get()->sortByDesc('timestamp');
    	$message = null;
    	return view ('diagnose', compact('message', 'records', 'patient'));
    }

    public function newRecord() {
    	Records::create([
    		'patient_id' => Input::get('patient_id'),
    		'tanggal' => Input::get('tanggal'),
    		'diagnosa' => Input::get('diagnosa'),
    		'terapi' => Input::get('terapi'),
		]);
		$message = 'Data berobat baru berhasil ditambah!';
		$patient = Patients::where('id', Input::get('patient_id'))->first();
    	$records = Records::where('patient_id', Input::get('patient_id'))->get()->sortByDesc('timestamp');
		return view('diagnose', compact('message', 'records', 'patient'));
    }

    public function deleteRecord() {
    	$record = Records::where('id', Input::get('record_id'))->first();
    	$record->delete();

    	$message = "Rekaman berobat berhasil dihapus";
    	$patient = Patients::where('id', Input::get('patient_id'))->first();
    	$records = Records::where('patient_id', Input::get('patient_id'))->get()->sortByDesc('timestamp');
    	return view('diagnose', compact('message', 'records', 'patient'));
    }

    public function editRecord() {
    	$record = Records::where('id', Input::get('record_id'))->first();
    	$patient = Patients::where('id', Input::get('patient_id'))->first();
    	$message = null;
    	return view('editRecord', compact('message', 'record', 'patient'));
    }

    public function updateRecord() {
    	$record = Records::where('id', Input::get('record_id'))->first();
    	$record->tanggal = Input::get('tanggal');
    	$record->diagnosa = Input::get('diagnosa');
    	$record->terapi = Input::get('terapi');
    	$record->save();

    	$records = Records::where('patient_id', Input::get('patient_id'))->get()->sortByDesc('timestamp');
    	$patient = Patients::where('id', Input::get('patient_id'))->first();
    	$message = "Rekaman berhasil diperbaharui";
    	return view('diagnose', compact('message', 'records', 'patient'));
    }

    public function showSearchPatient() {
    	return view('searchPatient');
    }

    public function searchPatient() {
    	$searchKey = Input::get('search');
    	$searchKey = '%'.$searchKey.'%';
    	$patients = Patients::where('nama', 'LIKE', $searchKey)->orWhere('alamat', 'LIKE', $searchKey)->get();
    	return view('listPatient', compact('patients'));
    }
}

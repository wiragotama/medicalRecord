@extends('layout')
@section('content')
    
    <div class="container">
       	<div class="registerForm">
       		<h3 class="well"> Edit Pasien </h3>
       		<div class="col-lg-12 well">
       		<div class="row">
            <!-- ada validasi javascript disini -->
            <form id="registerForm" onsubmit="#" action="/updatePatient" method="POST">
            	<div class="col-sm-12">
            		<div class="row">
            			<div class="col-sm-6 form-group">
			                <input type="hidden" name="_token" value="{{ csrf_token() }}">
			                <input type="hidden" name="id" value="{{$patient->id}}">
		                    <label> Nama </label>
		                    <input id="nama" name="nama" type="text" class="form-control" placeholder="nama" value="{{$patient->nama}}" required> </input>
		                </div>
		                <div class="col-sm-6 form-group">
		                    <label> Kontak </label>
		                    <input id="kontak" name="kontak" type="text" class="form-control" placeholder="telepon/handphone" value="{{$patient->kontak}}"> </input>
		                </div>
		                <div class="col-sm-6 form-group">
		                    <label> Umur </label>
		                    <input id="umur" name="umur" type="text" class="form-control" placeholder="umur" value="{{$patient->umur}}"> </input>
		                </div>
	                </div>
	                <div class="form-group">
						<label>Alamat</label>
						<input id="alamat" name="alamat" type="text" class="form-control" placeholder="alamat" value="{{$patient->alamat}}"> </input>
					</div>
					<input style="font-size:12px; background:black; border-color:black" class="btn btn-lg btn-info" type="submit" onclick="#" value="Save">
                </div>
            </form>

            </div>
            </div>
        </div>
    </div>

@endsection
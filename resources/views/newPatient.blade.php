@extends('layout')
@section('content')
    
    <div class="container">
       	<div class="registerForm">
       		<h3 class="well"> Pasien Baru </h3>
       		<div class="col-lg-12 well">
       		<div class="row">
            <!-- ada validasi javascript disini -->
            <form id="registerForm" onsubmit="#" action="/createPatient" method="POST">
            	<div class="col-sm-12">
            		<div class="row">
            			<div class="col-sm-6 form-group">
			                <input type="hidden" name="_token" value="{{ csrf_token() }}">
		                    <label> Nama </label>
		                    <input id="nama" name="nama" type="text" class="form-control" placeholder="nama" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required> </input>
		                </div>
		                <div class="col-sm-6 form-group">
		                    <label> Kontak </label>
		                    <input id="kontak" name="kontak" type="text" class="form-control" placeholder="telepon/handphone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}"> </input>
		                </div>
		                <div class="col-sm-6 form-group">
		                    <label> Umur </label>
		                    <input id="umur" name="umur" type="text" class="form-control" placeholder="umur" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}"> </input>
		                </div>
	                </div>
	                <div class="form-group">
						<label>Alamat</label>
						<input id="alamat" name="alamat" type="text" class="form-control" placeholder="alamat" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}"> </input>
					</div>
					<input style="font-size:12px; background:black; border-color:black" class="btn btn-lg btn-info" type="submit" onclick="#" value="Daftar">
                </div>
            </form>

            </div>
            </div>
        </div>
    </div>

@endsection
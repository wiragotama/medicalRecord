@extends('layout')
@section('content')
    <div class="container">
        @if ($message!=null) 
            <div class="alert alert-danger" role="alert">
                {{$message}}
             </div>
        @endif
    </div>

    <div class="container">
        <div class="col-lg-12 well">
        <div class="row">
        <h5> Data Pasien </h5> <br>
        <div class="table-responsive" style="font-size:12px">
            <table class="table">
            <tr> <td> Nama </td> <td> {{$patient->nama}} </td> </tr>
            <tr> <td> Umur </td> <td> {{$patient->umur}} </td> </tr>
            <tr> <td> Alamat </td> <td> {{$patient->alamat}} </td> </tr>
            <tr> <td> Kontak </td> <td> {{$patient->kontak}} </td> </tr>
            </table>
        </div>
        </div>
        </div>
    </div>
    <div class="container">
        <div class="registerForm">
            <div class="col-lg-12 well">
            <div class="row">
            <div class="col-sm-12">
                <h5> Isi Data Berobat Baru </h5>
            </div>
            <!-- ada validasi javascript disini -->
            <form id="recordForm" onsubmit="#" action="/newRecord" method="POST">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="patient_id" value="{{$patient->id}}">
                            <label> Tanggal </label>
                            <input id="tanggal" name="tanggal" type="text" class="form-control" placeholder="tanggal" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required> </input>
                        </div>
                    </div>
                    <div class="form-group">
                        <label> Diagnosa </label>
                        <textarea style="height:80px" id="diagnosa" name="diagnosa" class="form-control" form="recordForm" required> </textarea>
                    </div>
                    <div class="form-group">
                        <label> Terapi </label>
                        <textarea style="height:80px" id="terapi" name="terapi" class="form-control" form="recordForm" required> </textarea>
                    </div>
                    <input style="font-size:12px; background:black; border-color:black" class="btn btn-lg btn-info" type="submit" onclick="return confirm('Simpan Sekarang?')" value="Simpan">
                </div>
            </form>
            </div>
            </div>
    </div>
    <br> <br> <br>
    <div class="container">
        <h5> Catatan Rekaman Berobat </h5>
    </div>
    @if (count($records)==0)
    @else
        <div class="container">
        <div class="table-responsive" style="font-size:12px">
	        <table class="table table-hover table-bordered">
	        	<tr style="font-weight:bold">
	        		<td>
	        			#
	        		</td>
	        		<td>
	        			Tanggal
	        		</td>
	        		<td>
	        			Diagnosa
        			</td>
        			<td>
        				Terapi
    				</td>
    				<td>
        				Menu
    				</td>
	        	</tr>
                @foreach( $records as $key=>$record )
                    <tr> 
                    	<td>
                    	{{$key+1}}
                    	</td>
                    	<td>
                    	{{$record->tanggal}} 
                    	</td>
                    	<td>
                    	{{$record->diagnosa}}
                    	</td> 
                    	<td>
                    	{{$record->terapi}}
                    	</td>
                    	<td>
                        <form id="editRecord" onsubmit="#" action="/editRecord" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="record_id" value="{{ $record->id }}">
                            <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                            <input class="submitUnobvious" id="edit" type="submit" onclick="return confirm ('Apakah Anda yakin ingin mengubah rekaman ini?')" value="Edit" style="color:#2d91f2">
                        </form>
                        <form id="deleteRecord" onsubmit="#" action="/deleteRecord" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="record_id" value="{{ $record->id }}">
                            <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                            <input class="submitUnobvious" id="delete" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus rekaman ini?')" value="Delete" style="color:grey">
                        </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        </div>
    @endif
@endsection
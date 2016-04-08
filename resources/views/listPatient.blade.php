@extends('layout')
@section('content')
    
    @if (!$patients->count())
    @else
        <div class="container">
        <div class="table-responsive" style="font-size:12px">
	        <table class="table table-hover table-bordered">
	        	<tr style="font-weight:bold">
	        		<td>
	        			#
	        		</td>
	        		<td>
	        			Nama
	        		</td>
	        		<td>
	        			Alamat
        			</td>
        			<td>
        				Umur
    				</td>
    				<td>
        				Menu
    				</td>
	        	</tr>
                @foreach( $patients as $key=>$patient )
                    <tr> 
                    	<td>
                    	{{$key+1}}
                    	</td>
                    	<td>
                    	{{$patient->nama}} 
                    	</td>
                    	<td>
                    	{{$patient->alamat}}
                    	</td> 
                    	<td>
                    	{{$patient->umur}}
                    	</td>
                    	<td>
                        <form id="editPatient" onsubmit="#" action="/editPatient" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $patient->id }}">
                            <input class="submitUnobvious" id="edit" type="submit" onclick="#" value="Edit" style="color:#2d91f2">
                        </form>
                        <form id="deletePatient" onsubmit="#" action="/deletePatient" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $patient->id }}">
                            <input class="submitUnobvious" id="delete" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data pasien ini?')" value="Delete" style="color:grey">
                        </form>
                        <form id="berobat" onsubmit="#" action="/showRecord" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $patient->id }}">
                            <input class="submitUnobvious" id="delete" type="submit" onclick="#" value="Berobat" style="color:#f7677b">
                        </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        </div>
    @endif

@endsection
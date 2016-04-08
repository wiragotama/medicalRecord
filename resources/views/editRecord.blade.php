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
                <h5> Edit Data Berobat </h5>
            </div>
            <!-- ada validasi javascript disini -->
            <form id="recordForm" onsubmit="#" action="/updateRecord" method="POST">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="record_id" value="{{$record->id}}">
                            <input type="hidden" name="patient_id" value="{{$patient->id}}">
                            <label> Tanggal </label>
                            <input id="tanggal" name="tanggal" type="text" class="form-control" placeholder="tanggal" value="{{$record->tanggal}}" required> </input>
                        </div>
                    </div>
                    <div class="form-group">
                        <label> Diagnosa </label>
                        <textarea style="height:80px" id="diagnosa" name="diagnosa" class="form-control" form="recordForm" required>{{$record->diagnosa}}</textarea>
                    </div>
                    <div class="form-group">
                        <label> Terapi </label>
                        <textarea style="height:80px" id="terapi" name="terapi" class="form-control" form="recordForm" required>{{$record->terapi}}</textarea>
                    </div>
                    <input style="font-size:12px; background:black; border-color:black" class="btn btn-lg btn-info" type="submit" onclick="return confirm('Simpan Sekarang?')" value="Simpan">
                </div>
            </form>
            </div>
            </div>
    </div>
@endsection
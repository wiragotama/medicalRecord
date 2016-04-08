@extends('layout')
@section('content')
	<link href="css/searchBox.css" rel="stylesheet">

    <div class="container">
	    <div class="box">
		  <div class="container-1">
			  <form id="searchForm" onsubmit="#" action="/searchPatient" method="POST">
			      <span class="icon"><i class="fa fa-search"></i></span>
			      <input type="hidden" name="_token" value="{{ csrf_token() }}">
			      <input type="search" name="search" id="search" placeholder="Search..." />
			      &nbsp;
			      <input style="font-size:12px; height:50px; background:black; border-color:black" class="btn btn-lg btn-info" type="submit" value="GO">
			  </form>
		  </div>
		</div>
	</div>

@endsection
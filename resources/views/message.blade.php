@extends('layout')
@section('content')
    <div class="container">
	    <div class="alert alert-danger" role="alert">
	        @if ($message!=null) 
	        	{{$message}}
	        @endif
	    </div>
    </div>

@endsection
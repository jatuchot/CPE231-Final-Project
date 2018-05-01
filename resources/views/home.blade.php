@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
		    <div class="panel panel-default">
                    <div class="panel panel-heading">Greeting</div>
		    @guest
			<div class="panel panel-body"><center> Please login before using our website! </center>
		    @else
		    <div class="panel panel-body"><center>
                    You are logged in! </center>
		    @endguest
	      </div>
        </div>
    </div>
</div>
@endsection


@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
		    @if (session()->has('success'))
		    <script>
			swal("{!! session('success') !!}","Press Ok to Continue","success" );
		    </script>
		    @endif
		    <div class="card-header">
        		Greeting
    		    </div>
		    @guest
			<div class="card-body"><center> Please login before using our website! </center>
		    @else
		    <div class="card-body"><center>
                    You are logged in! </center>
		    @endguest
	      </div>
        </div>
    </div>
</div>
</div>
@endsection


@extends('layouts.app')

@section('title', 'Data Importer')

@section('content')
<div class="card">
<div class="card-header bg-light">
    @include('components.title', [
        "title" => "CSV File Data Importer",
        "desc" => "For importing .csv file into MySQL table"
    ])
    </div>
    @foreach ($errors->all() as $message)
        <div class="alert alert-danger" role="alert">{{ $message }}</div>
    @endforeach
    <div class="card-body">
    <center>
    <h5>Step 1: Upload .csv and specified table name</h5>
	<form action="{{ url('tools/data-importer/validation') }}" method="post" enctype="multipart/form-data" files=true>
        <br>
        <div class="col-sm-12">
	<div class="form-group">
	<label for="file">.csv File:</label>
            <input type="file" class="form-control" name="file" id="file" accept=".csv">
            <p class="help-block">First row of .csv file must be header of the file.</p>
        </div>
	<a href="https://drive.google.com/open?id=1n0XEoaMSwtf0dAjVdn-OTXSdt-M-cBYP" class="btn btn-info">Download .csv test file Here </a>
	</div>
    </center>  
    <center>
	<div class="col-sm-12">
        <div class="form-group"><hr>
            <label for="table_name">Insert to:</label>
            <input type="text" class="form-control" name="table_name" id="table_name" placeholder="table_name" value="subject_info">
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input class="btn btn-primary" type="submit" value="Upload" name="submit">
	<br><br></div></center>
    </form>
</div>
</div>
@endsection


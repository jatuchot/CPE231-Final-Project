@extends('layouts.app')
@section('title','Analysis Portal')

@section('content')
<div class="card">
   <div class="card-header bg-light">
   @include('components.title', [
        "title" => "Analysis Report",
        "desc" => "Show all Analysis Report"
   ])
   </div>
   <div class="card-body">
<div class="row">
	<div class="col-sm-3">
<div class="card">
<div class="card-header text-white bg-success">
<a href="/analysis/1">Analysis Report 1</a>
</div>
  <div class="card-body">
	@include('components.chart1')
  </div>
</div>
</div>
<div class="col-sm-3">
<div class="card">
<div class="card-header text-white bg-danger">
<a href="/analysis/2">Analysis Report 2</a>
</div>
  <div class="card-body">
	@include('components.chart2')
  </div>
</div>
</div>

<div class="col-sm-3">
<div class="card">
<div class="card-header text-white bg-primary">
<a href="/analysis/3">Analysis Report 3</a>
</div>
  <div class="card-body">
	@include('components.chart3')
  </div>
</div>
</div>

<div class="col-sm-3">
<div class="card">
<div class="card-header text-white bg-warning">
<a href="/analysis/4">Analysis Report 4</a>
</div>
  <div class="card-body">
        @include('components.chart4')
  </div>
</div>
</div>
</div>
<br>
<div class="row">
<div class="col-sm-6">
<div class="card">
<div class="card-header text-white bg-info">
<a href="/analysis/5">Analysis Report 5</a>
</div>
  <div class="card-body">
	@include('components.chart5')
  </div>
</div>
</div>

<div class="col-sm-6">
<div class="card">
<div class="card-header text-white bg-dark">
<a href="/analysis/6">Analysis Report 6</a>
</div>
  <div class="card-body">
	 @include('components.chart9')
  </div>
</div>
</div>
</div>
<br>
<div class="row">
<div class="col-sm-3">
<div class="card">
<div class="card-header text-white bg-secondary">
<a href="/analysis/7">Analysis Report 7</a>
</div>
  <div class="card-body">
	@include('components.chart6')
  </div>
</div>
</div>

<div class="col-sm-3">
<div class="card">
<div class="card-header text-white bg-success">
<a href="/analysis/8">Analysis Report 8</a>
</div>
  <div class="card-body">
        @include('components.chart7')
  </div>
</div>
</div>


<div class="col-sm-3">
<div class="card">
<div class="card-header text-white bg-warning">
<a href="/analysis/9">Analysis Report 9</a>
</div>
  <div class="card-body">
        @include('components.chart8')
  </div>
</div>
</div>

<div class="col-sm-3">
<div class="card">
<div class="card-header text-white bg-primary">
<a href="/analysis/10">Analysis Report 10</a>
</div>
  <div class="card-body">
	@include('components.chart10')
  </div>
</div>
</div>


</div>



</div>
</div>
<div class="push"></div>
@endsection


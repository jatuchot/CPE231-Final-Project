@extends('layouts.app')
@section('title','Analysis Portal')

@section('content')
<div class="card">
   <div class="card-header bg-light">
   @include('components.title', [
        "title" => "Analysis Report 5",
        "desc" => "Show amount of OpenCourse Between First and Second Term"
   ])
   </div>
   <div class="card-body">
        {!! $chart->html() !!}
   </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
{!! Charts::scripts() !!}
{!! $chart->script() !!}
@endsection



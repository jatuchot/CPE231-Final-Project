@extends('layouts.app')
@section('title','Enrollment Portal')

@section('content')
<div class="card">
   <div class="card-header">
   @include('components.title', [
        "title" => "Grade Manage page",
        "desc" => "Use for view grade result"
   ])

<div class="container">

<h1 style="background-color: pink" > <br> Grade <br><br> </h1>
<br>
<h4>Name : {{ $user->Firstname }} {{ $user->Lastname }}</h4>
<h4>Year : @if($curUser->role == '1')
1A
@elseif($curUser->role == '2')
2A
@elseif($curUser->role == '3')
3A
</h4>
@endif
<h3> Select Year and View your grade </h3>
<br>
<form method="get" action="/grade/viewResult/byterm">
{{csrf_field()}}

<select name="term">
  <option>{{ $term }}</option>
  <option value = "1/2017"> 1/2017 </option>
  <option value = "2/2017"> 2/2017 </option>
  <option value = "1/2018"> 1/2018 </option>
  <option value = "2/2018"> 2/2018 </option>
</select>
<button type="submit" class="btn btn-primary">Search</button>
</form>


<br><br>
<div class="table-responsive"><table class="table table-bordered ">
<thead>
<tr>
  <th>Subject</th>
  <th>Credit</th>
  <th>Grade</th>
</tr>
</thead>

<tbody>
@if($grade != null)
@foreach($grade as $g)  
  <tr>
  <td>{{ $g->subject_id}} : {{ $g->subject_name }} (sec:{{$g->section}})</td>
  <td>{{ $g->credit }} </td>
  <td>{{ $g->grade }}  </td> 
  </tr>
@endforeach
@else

Waiting For Instructor!

@endif
</tbody>



</table>
</div>
<br>

<hr>
<?php
$total = 0;
$totalCredit = 0;
foreach($grade as $a){
if($a->grade == 'A'){
  $numberGrade = 4;
}
else if($a->grade == 'B+'){
  $numberGrade = 3.5;
}
else if($a->grade == 'B'){
  $numberGrade = 3;
}
else if($a->grade == 'C+'){
  $numberGrade = 2.5;
}
else if($a->grade == 'C'){
  $numberGrade = 2;
}
else if($a->grade == 'D+'){
  $numberGrade = 1.5;
}
else if($a->grade == 'D'){
  $numberGrade = 1;
}
else if($a->grade == 'F'){
  $numberGrade = 0;
}
$credit = $a->credit;
$totalCredit = $totalCredit + $credit;
$total = $total + ($numberGrade * $credit);
}
if($totalCredit != 0){
$result = $total/$totalCredit;
}
else{
$result = 0;
$GPAX = 0;
$new = 0;
}

?>
<h4>GPA : <?php echo number_format((float)$result, 2, '.', ''); ?> </h4>
<h4>GPAX: Coming Soon.... </h4>

</div>
</div>
@endsection

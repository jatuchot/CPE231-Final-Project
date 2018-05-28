<?php
$i = 0;
$recentUser = Auth::user();
if($recentUser->role == 1 || $recentUser->role == 2 || $recentUser->role == 3){
     echo '<script type="text/javascript">';
     echo 'setTimeout(function () { swal("WOW!","Message!","success");';
     echo '}, 1000);</script>';
     header("refresh:1; url=/");
     return redirect()->route("home");
}

?>
@extends('layouts.app')
@section('title','Activity Portal')

@section('content')
<div class="card">
   <div class="card-header bg-light">
   @include('components.title', [
        "title" => "Permition for Activity Page",
        "desc" => "Use for approve activity and deny activity"
   ])
   </div>
<style>
hr{
border: 1px solid #ccc;
}

</style>

@if ($errors->any())
          <div class="alert alert-danger" role="alert">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
          </div><br>
      @endif
      @if (!empty($success))
        <div class="alert alert-success" role="alert">
          <p>{{$success }}</p>
        </div><br>
      @endif

<div class ="card-body">
<table border="1" width="100%" class="table table-bordered table-condensed table-responsive-sm table-striped">
  <tr>
    <th > <div align="center">No.</div></th>
     <th > <div align="center">ACTIVITY NAME</div></th>
    <th > <div align="center">PRESIDENT ACTIVITY</div></th>   
    <th > <div align="center">STUDENTID</div></th>
    <th > <div align="center">ADVISOR</div></th>
    <th > <div align="center">FOR</div></th>
    <th > <div align="center">APPROVE STATUS</div></th>
    <th > <div align="center">PERMIT?</div></th>
   
  </tr>
  <?php use App\ActivityInfo;
  $act = ActivityInfo::get();
  ?>

  @foreach($act as $a)
  <tr>
   <td><center>{{ $a['id'] }}</center></td>
    <td><center>{{ $a['activitiesName'] }}</center></td>
    <td><center>{{ $a['presidentAct'] }}</center></td>
    <td><center>{{ $a['presidentID'] }}</center></td>
    <td><center>{{ $a['advisor'] }}</center></td>
    <td><center>
    @if($a['participant'] == "1")
	First Year Student			
    @elseif($a['participant'] == "2")
	Second Year Student
    @elseif($a['participant'] == "3")
	Third Year Student
    @endif

    </center></td>
    <td><center>
    @if($a['status'] == "0") Pending
    @elseif($a['status'] == "1") Approved
    @elseif($a['status'] == "2") Ignored @endif
    </center></td>
    <td><center>
    <form action="/activity/update/{{ $a['id'] }}" method="post">
            {{csrf_field()}}
            <button type="submit" name="action" value="1">Yes</button>
            <button type="submit" name="action" value="2">No!</button>
    </form>
    </center></td>
</tr>
<?php
$i = $i + 1; ?>
@endforeach


   
</table>
<br><hr>
	<?php 
		if($i >= 2){
			echo "You had created " . $i . " Activities";
		}
		else{
			echo "You had created " . $i . " Activity";
		}
	?>
</div></div></div>
@endsection

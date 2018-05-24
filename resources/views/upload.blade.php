<?php $curUser = Auth::user()->username; ?> 
<!DOCTYPE html> 
<html> 
<head> 
<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"> 
</head> 
<body> 
<?php $user = App\StudentInfo::where("student_id",$curUser)->get()->first();
?> 
<div class="container-fluid"> {{csrf_field()}}
<br>
<div class="progress">
  <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50% : Success Insert Profile_data</div>
  <div class="progress-bar progress-bar-striped bg-warning progress-bar-animated" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50% : more to go </div>
</div>
<br><div class="card text-black bg-light border-danger mb-3">
<center>
    <div class="card-header">
    <h1>Keep Smiling</h1>
    </div>
    <div class="card-body">
    <div id="camera" style="width:640px; height:480px;"></div>
    <div id="result" style="width:320px; height:240px; display: none;"></div>
    <br>
    <hr>
    <button type="button" class="btn btn-primary btn-lg" id="snapshot" style="display: none;"><i class="fa fa-camera"></i> ถ่ายรูป</button>
    <div id="pic-confirmation">
        <div class="btn-group">
            <button type="button" class="btn btn-success" id="confirmed"><i class="fa fa-check"></i> ใช้รูปนี้</button>
            <button type="button" class="btn btn-danger" id="reject"><i class="fa fa-times"></i> ถ่ายใหม่</button>
        </div>
    </div>
    <div id="error" class="alert alert-danger" style="display: none;">มีปัญหาเกิดขึ้น</div>
    <div id="upload" class="well" style="display: none;">
        กำลังอัพโหลด...<br>
	@include('components.progress-bar', ["id" => "upload-progress-bar", "at" => "0"])
    </div>
    <div id="finish" class="well" style="display: none;">
        <h5>อัพโหลดเสร็จสิ้น!</h5>
	<form action="{{ url('upload/done') }}" method="get">
            <input type="submit" id="first-time-next-step-btn" class="btn btn-primary" value="ดำเนินการต่อ">
        </form>
    </div>
</div></center>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

<script src="/js/webcamjs/webcam.js" type="text/javascript"></script>
<script src="/js/app.js" type="text/javascript"> </script> 
    <script type="text/javascript">
/*	$.ajaxSetup({
    	headers: {
        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	}); */
	var APP_URL = "https://dev.bosscpe30.info";
        var init = true;

        Webcam.set({
            width: 320,
            height: 240,
            dest_width: 640,
            dest_height: 480
        });
        Webcam.attach('#camera');

        Webcam.on( 'live', function() {
            if(init){
                $("#snapshot").css("display", "block");
                init = false;
            }
        });

        $("#snapshot").click(function(){
            Webcam.freeze();
            $("#snapshot").css("display", "none");
            $("#pic-confirmation").css("display", "block");
        });

        $("#reject").click(function(){
            Webcam.unfreeze();
            $("#snapshot").css("display", "block");
            $("#pic-confirmation").css("display", "none");
        });

        $("#confirmed").click(function(){
            $("#pic-confirmation").css("display", "none");
            Webcam.snap( function(data_uri){
                $("#camera").css("display", "none");
                $("#result").css("display", "block");
                $("#result").html('<img style="width:100%; height:100%;" src="'+data_uri+'"/>');
                $("#upload").css("display", "block");
                setProgress("upload-progress-bar", 50);

                Webcam.upload(data_uri, APP_URL + '/api/v1/upload/profile/{{ $user->student_id }}/', function(code, text){
                    setProgress("upload-progress-bar", 100);
		    if(code != 200 || code != "200"){
                        $("#error").css("display", "block");
                    }else{
                        setTimeout( function(){
                            $("#upload").css("display", "none");
                            $("#finish").css("display", "block");
                        }, 100);
                    }
                });
            });
            Webcam.freeze();
        });

    </script>
</body>
</html>


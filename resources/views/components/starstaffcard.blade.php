<?php
        $servername = "localhost";
        $username = "2bkmutt";
        $password = "digital2bkmutt";
        $dbname = "ICRN";

        $i = 0;
        $j = 0;
        $link = mysqli_connect($servername,$username,$password,$dbname);
        mysqli_set_charset($link, "utf8");
        $staff = "SELECT * FROM departments";
	$result3 = mysqli_query($link,$staff);
        ?>

<style>
.btn-vote {
    background-color: #f17ea5;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;

}
.btn-vote:hover{
    background-color: #f48fb1   ;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;

}
.user-card-content2{
   background-color : #f1d5f0;
}
</style>

<div class="user-card" data-camp_id="{{ $p['camp_id'] }}">
    <div class="user-card-content">
        <div class="row">
            <div class="col-sm-8">
                <h2>พี่ {{ $p['nickname_th'] . " (P'" . $p['nickname_en']  . ")" }}</h2>
                <h5>{{ $p['title'] . $p['first_name_th'] . ' ' . $p['last_name_th'] }} ({{ $p['first_name_en'] . ' ' . $p['last_name_en'] }})</h5>
                <!-- <h6>SEC{{ $p['sec'] }} | {{ $p['department']['faculty_abbr'] }}:{{ $p['department']['department_abbr'] }}</h6> -->
		<h6>SEC{{ $p['sec'] }} 
		<?php
                        while($row = mysqli_fetch_array($result3)){
                        if($p['dept_id']==$row['id']){
                ?>
		| {{ $row['faculty_abbr'] }}</h6>

		<h6>คณะที่ดูแล:</label> {{ $row['faculty_full-th'] }}</h6>
                <h6>ภาควิชาที่ดูแล:</label> {{ $row['department_full-th'] }}</h6>
		<h6>Faculty:</label> {{ $row['faculty_full-en'] }}</h6>
                <h6>Department:</label> {{ $row['department_full-en'] }}</h6>

		<?php
		}}
		?>
                

                @if($vote == true)
                <h4>
                    <form action="" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="voteid" value="{{$p['id']}}">
                        <input type="hidden" name="startype" value="4">
                        <button class="btn btn-vote btn-block btn-primary">Vote Now</button>
                    </form>
                </h4>
                @endif
            </div>
            <div class="col-sm-4">
                <?php
                    if(isset($lazyload) && $lazyload){
                        echo '<img class="lazy img-rounded img-responsive" data-original="'. url('img/staff/'.$p['image_filename']) .'">';
                    }else{
                        echo '<img class="img-responsive" src="'. url('img/staff/'.$p['image_filename']) .'">';
                    }
                ?>
            </div>
        </div>
    </div>
</div>

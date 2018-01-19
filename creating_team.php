<?php if(isset($_POST['submit'])){
	 // print_r($_POST);
	
	$sp;
if(!empty($_POST['check_list'])){

foreach($_POST['check_list'] as $sid){
	$shiftp='p'.$sid;
	$pref=$_POST[$shiftp];
	$sp[$pref]=$sid;	
	}

ksort($sp);//sorting shifts according to priority
$shifts_applicable=implode('|',$sp);

// echo $_POST['team_name'].'<br/>';
// echo $shifts_applicable.'<br/>';

// echo $_POST['current_shift'].'<br/>';
// echo $_POST['currect_shift_rotation'].'<br/>';
$week_days = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
$cday;
foreach($week_days as $numb => $day)
if($day == (date("l"))){
	$cday=$numb;
}
$sid=$_POST['current_shift'].'|'.$_POST['currect_shift_rotation'].'|'.$cday;
$dt=date('Y-m-d');
// echo $sid;

if(($_POST['team_name'] != '')&&($shifts_applicable != '')&&($dt!='')&&($sid !='')){
include 'conn.php';
$qry="INSERT INTO `teams`(`team_name`, `shifts_applicable`, `shifts_start_date`, `starting_shift_id`) VALUES ('{$_POST['team_name']}','{$shifts_applicable}','{$dt}','{$sid}')";
// echo $qry;
$res=mysqli_query($conn,$qry);
echo $res;
if($res==1)
{
	echo"<script>window.alert('TEAM Created Successfully')</script>";
	
}
else{
		echo"<script>window.alert('Team was NOT CREATED please contact DEV ')</script>";
}
 
   echo '<script>window.location="create_team.php"</script>';

}


}
}
?>
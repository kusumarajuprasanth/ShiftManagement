<img src='images\BLoader.GIF'>Working on it......</img>
<?php 
include 'conn.php';


$lmid = $_POST['lmid'];
$date= date('Y-m-d', strtotime("now"));
$msg='';
// print_r($_POST);
 if(!is_null ($lmid) && !is_null ($date)){
 
 $qry_employee="DELETE FROM `employ` WHERE `lmid`='{$lmid}'";
 $qry_schedule="DELETE FROM `shiftschedule` WHERE `lmid`='{$lmid}' and `shift_date` >='{$date}'";
 $res_emp = mysqli_query($conn,$qry_employee);
 if(mysqli_affected_rows($conn)>0){
	 $msg.=' Employee has successfully deleted \n';
	 $res_sch = mysqli_query($conn,$qry_schedule);
	 if(mysqli_affected_rows($conn)== -1){
		$msg.=' Employees Shift Schedule was NOT deleted \n'; 		 
		 
	 }
	 else{
		 $msg.=' Employees Shift Schedule was deleted \n';
	 }
	 
 }
 else{
	 
	 $msg.='Unable to Delete Employee \n';
	 
 }
 


 
 }
	
	
	echo"<script>window.alert('{$msg} ')</script>";

    echo '<script>window.location="view_teams.php"</script>';
	

?>



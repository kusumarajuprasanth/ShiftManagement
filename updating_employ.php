<img src='images\BLoader.GIF'>Working on it......</img>
<?php 
include 'conn.php';
if(!isset($_SESSION)){ session_start();}
$msg='';

// Array ( [emp_name] => test30 [emp_id] => test30 [emp_contact] => test3 [email_id] => [project] => LOYALTY [Team_id] => 3 [submit] => Update Info )
print_r($_SESSION);
if( ((!empty($_SESSION['lmid']))&&(!empty($_SESSION['Team_id']))) && ($_POST['emp_id']!=$_SESSION['lmid'] || $_POST['Team_id']!=$_SESSION['Team_id'])){
	
	if($_POST['emp_id']!=$_SESSION['lmid']){
		// echo"<script>window.alert('{$_POST['emp_id']} ')</script>";
	    //echo"<script>window.alert('lmid changed} ')</script>";
		
	$qry_employee_lmid="UPDATE `employ` SET `lmid` = '{$_POST['emp_id']}',`name`='{$_POST['emp_name']}',`mobile`='{$_POST['emp_contact']}',`project`='{$_POST['project']}',
	`email_id`='{$_POST['email_id']}' WHERE `id` = {$_SESSION['id']}";
	//echo $qry_employee_lmid;
	$res_emp = mysqli_query($conn,$qry_employee_lmid);
	mysqli_query($conn,"commit");
	$qry_Shiftschhedule_lmid="UPDATE `shiftschedule` SET `lmid` = '{$_POST['emp_id']}' WHERE `lmid` = '{$_SESSION['lmid']}'";
	//echo $qry_Shiftschhedule_lmid;
	
	$res_emp = mysqli_query($conn,$qry_employee_lmid);
	mysqli_query($conn,"commit");
       $_SESSION['lmid']=$_POST['emp_id'];

	// 1)update lmid in employ table;
	// 2)update lmid in shiftschedule;
	}
	if($_POST['Team_id']!=$_SESSION['Team_id']){
			//echo"<script>window.alert('{$_POST['emp_id']} ')</script>";
	       //echo"<script>window.alert('teamid changed')</script>";
		   // 1)update teamid in employ table;
	
	$qry_employee_team_id="UPDATE `employ` SET `Team_id`='{$_POST['Team_id']}',`name`='{$_POST['emp_name']}',`mobile`='{$_POST['emp_contact']}',`project`='{$_POST['project']}',`email_id`='{$_POST['email_id']}' WHERE `id`={$_SESSION['id']}";
		//echo $qry_employee_team_id;
		
		$res_emp = mysqli_query($conn,$qry_employee_team_id);
		mysqli_query($conn,"commit");
		
		// 2)delete shiftschedule up today;
	
		$dt=date('Y-m-d');
		$qry_del_shift_schedule="DELETE FROM `shiftschedule` WHERE `shift_date`>='{$dt}' and `lmid` = '{$_SESSION['lmid']}'";
		echo $qry_del_shift_schedule;
		$del_sch = mysqli_query($conn,$qry_del_shift_schedule);
		mysqli_query($conn,"commit");
               $_SESSION['Team_id']=$_POST['Team_id'];
		
	

	// 3)calculate shiftid according to changed team
     //updating_shift_schedule will calculate the current day shift and Insert a new record in "shift schedule" later it will be redirected to 
     // run_shift_scheduler will take the last shift of every employ and generate further shift schedule
echo'<script>window.location="updating_shift_schedule.php"</script>';
	
		
	
	
	
	
		}
}
	
	else{
$qry_employee="UPDATE `employ` SET `name`='{$_POST['emp_name']}',`mobile`='{$_POST['emp_contact']}',`project`='{$_POST['project']}',
`email_id`='{$_POST['email_id']}' WHERE `id` = {$_SESSION['id']}";

//echo $qry_employee;
		$res_emp = mysqli_query($conn,$qry_employee);
		if(mysqli_affected_rows($conn)>0){
              session_destroy();
	 $msg.=' Employee has been Updated Sucessfully \n';
	 echo"<script>window.alert('{$msg} ')</script>";
	 echo'<script>window.location="update_employ.php"</script>';
		}
	 else{
		 $msg.='Employee NOT Updated ,details might exits earlier \n';
		 echo"<script>window.alert('{$msg} ')</script>";
		  echo'<script>window.location="run_scheduler.php?days=0"</script>';
	 }
	}
 
  

	
	


   

?>
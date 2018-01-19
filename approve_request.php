<html>
<head>

	<meta charset="UTF-8">
	<title>Loyalty Methods</title>

	<link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/css/jquery-ui.css">
     <script src="css/css/jquery-1.10.2.js"></script>
   <script src="css/css/jquery-ui.js"></script>
   <link rel="stylesheet" href="/css/css/style1.css">
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
	 $( "#datepicker" ).datepicker( "option", "showAnim","slide");
	  $( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
  });
  </script>
</head>
	
	
<!-- *******************************************************  BODY  ************************************************************************


 -->

<body>
	<div id="background">
		<div id="page">
						<?php include 'header.php'?>
			            <?php include 'conn.php' ?>
			
			
		                	  <div id="contents">

							   <form method="post" action=''>
							   <table>
							   
<tr><td>Select Resource</td> <td>
<select name="lmid"><?php 
$qry=mysqli_query($conn,"SELECT  distinct `lmid`,`name` FROM `employ` WHERE 1");
echo"<option value=''>Select Resource</option>";while($res=mysqli_fetch_assoc($qry)){echo"<option value='".$res['lmid']."'>".$res['name']."</option>";}
?>   

</select> </td></tr>
<tr><td>
Select Date</td> <td> <input type="text" id="datepicker" size="15" name='date' readonly></td></tr>

<tr><td></td><td><input type='submit' name='get_details' value='get_details'></td></tr>

<?php

if (!isset($_SESSION)) session_start();
$dt;



if(isset($_POST['get_details'])){
//print_r($_SESSION);
// echo"*******************************************";
//print_r($_POST);
$_SESSION['req_date']=$_POST['date'];
$_SESSION['resource_request_lmid']=$_POST['lmid'];
$qry="select * from shiftschedule where `lmid`='{$_POST['lmid']}' and `shift_date` ='{$_POST['date']}'";
// Check Qry 
// //echo $qry;
$rset=mysqli_query($conn,$qry);
$result=mysqli_fetch_assoc($rset);
$_SESSION['request_timings']=$result['shift_timings'];


if($result['shift_timings']=="00:00 - 00:00"){
	echo"<script>alert('As per Schedule resource has Holiday on {$_POST['date']}')</script>";
	session_destroy();
}

else{
	$qry1="select `project` from employ where `lmid`='{$_POST['lmid']}'";
// Check Qry //echo $qry;
$rset1=mysqli_query($conn,$qry1);
$result1=mysqli_fetch_assoc($rset1);

echo"<input type='text' name='idl' value='{$result['id']}' hidden>";
echo"<input type='text' name='lmidl' value='{$_POST['lmid']}' hidden>";	
echo"<input type='text' name='datel' value='{$_POST['date']}' hidden>";	
echo"<input type='text' name='prjt' value='{$result1['project']}' hidden>";	

// ************************************************************************************************
echo"<tr><td>Request Type</td><td> <select name='req_type'>";

	if($result['isbux']=='no'){
		echo"<option value='Leave'>grant Leave</option>";
		echo"</select>";
		
		?><input type='submit' name='grant_leave' value='Grant_leave'><?php
	}
	else{
		
		if($result['isbux']=='yes'){
	     	echo"<option value='Shift Swap'>Shift Swap</option>
                <option value='Shift replace'>Shift replace</option>";
			 
			echo"</select></td></tr>";
		}
       ?>
	   <tr><td></td><td><input type='submit' name='View_Resoures' value='View_Resoures'></td></tr>
	   
	   <?php		
   
		
	}		
	
}	

 



}







 if(isset($_POST['grant_leave'])){
	 	if (!isset($_SESSION)) session_start(); //print_r($_SESSION);
	 	 $_SESSION['req_type']=$_POST['req_type'];
	 
	 
		  		  $qry="UPDATE `shiftschedule` SET `shift_timings`='00:00 - 00:00',`Comments`='Leave granted for this Day' WHERE id='{$_POST['idl']}' and `shift_date` ='{$_POST['datel']}' and `lmid`='{$_POST['lmidl']}'";
				  //echo $qry;
		          $rset=mysqli_query($conn,$qry);
				  
				 
		
		if($rset==1)
{
	echo"<script>window.alert('Leave Granted Successfully')</script>";
	$qry1="SELECT `email_id` FROM `employ` WHERE `lmid`='{$_POST['lmidl']}'";
	$rset1=mysqli_query($conn,$qry1);
	$result1=mysqli_fetch_assoc($rset1);

	$mail=$result1['email_id'];
	$sub="Leave Granted on ".$_POST['datel']."";
	$msg="your request for leave on ".$_POST['datel']." has been granted, please use the following http://honeybee.webutu.com/view_schedule.php to know your schedulule ";
	
	mail($mail,$sub,$msg);
	echo"<script>window.alert('$mail')</script>";
	
   	
}
else {
	echo"<script>window.alert('Leave  Not Granted')</script>";
   	
}
   echo '<script>window.location="shiftmanagememt.php"</script>';
			 		  
	  }

	  
	  

if(isset($_POST['View_Resoures'])){
	
	
	if (!isset($_SESSION)) session_start(); //print_r($_SESSION);	
	  $_SESSION['req_type']=$_POST['req_type'];
	
	if($_POST['req_type']=='Shift Swap'){
			            
		         // Qqury for relevent project;
				 
				 $qry="select distinct e.lmid,e.name from `employ` e,`shiftschedule` s where e.project='{$_POST['prjt']}' and e.`lmid` <> '{$_POST['lmidl']}'";
				 //echo $qry;  		         
				 echo"<tr><td>Select Buffer Resource</td><td><select name='buffered_resource_id'>";
	            
			   $rset=mysqli_query($conn,$qry);
	             
				 while($res=mysqli_fetch_assoc($rset))
	             echo"<option value='".$res['lmid']."'>".$res['name']."</option>";
                         
	             echo"</select></td></tr>";
	 
	 echo"<tr><td></td><td><input type='submit' name='get_Schedule' value='Get_Schedule'></td></tr>"; 
	  }
	  
	if($_POST['req_type']=='Shift replace'){
		
				 

	// "SELECT `shift_id`, `lmid`, `shift_date`, `shift_timings`, `Comments`, `id`, `othres_shift`, `isbux` FROM `shiftschedule`  WHERE `shift_date`='{$_SESSION['req_date']}' and (`shift_timings`='00:00 - 00:00' or `isbux`='no')";
	
	$qry="SELECT s.`shift_id`, s.`lmid`,e.`name`, s.`shift_date`, s.`shift_timings`, s.`Comments`, s.`id`, s.`othres_shift`, s.`isbux` FROM `shiftschedule` s ,`employ` e WHERE `shift_date`='{$_SESSION['req_date']}' and e.lmid=s.lmid  and e.project='{$_POST['prjt']}' and ( s.`shift_timings`='00:00 - 00:00' or s.`isbux`='no') and  e.`lmid` <> '{$_POST['lmid']}'" ;
	
	  //echo $qry;
	  echo"<tr><td>Select Resource</td><td><select name='replace_lmid'>";
	  $rset=mysqli_query($conn,$qry);
	  while($res=mysqli_fetch_assoc($rset)){
	   echo"<option value='".$res['lmid']."'>".$res['name']."</option>";
        }
	  echo"</select></td></tr>";
	  echo"<tr><td></td><td><input type='submit' name='grant_replacement' value='Replace'></td></tr>";
	  	  
	  }
	  
	   
}
if(isset($_POST['grant_replacement'])){
	
	
	if (!isset($_SESSION)) session_start(); //print_r($_SESSION);
	
	
	$qry="select `shift_timings` ,`shift_date` FROM `shiftschedule`   WHERE `lmid`='{$_SESSION['resource_request_lmid']}' and
	  `shift_date`='{$_SESSION['req_date']}'";
	  
		$rset=mysqli_query($conn,$qry);
		$rset=mysqli_fetch_assoc($rset);
		
	 $_SESSION['req_time']=$rset['shift_timings'];
	 $_SESSION['replace_lmid']=$_POST['replace_lmid'];
			
		$cmt=$_SESSION['resource_request_lmid']." SHIFT replaced  WITH ".$_SESSION['replace_lmid'];
		
		
	 $qry1=" UPDATE `shiftschedule` SET `shift_timings`='00:00 - 00:00',
	  `Comments`='{$cmt}',`othres_shift`='',`isbux`='no' 
	   WHERE `lmid`='{$_SESSION['resource_request_lmid']}' and
	  `shift_date`='{$_SESSION['req_date']}'";
	   
	  $qry2= " UPDATE `shiftschedule` SET `shift_timings`='{$_SESSION['req_time']}',
	  `Comments`='{$cmt}',`othres_shift`='yes',`isbux`='yes' 
	   WHERE `lmid`='{$_SESSION['replace_lmid']}' and
	  `shift_date`='{$_SESSION['req_date']}'";
	
	
	// echo $qry1;echo $qry2;
	$rset1=mysqli_query($conn,$qry2);
	$rset2=mysqli_query($conn,$qry1);
	
	if($rset1==1 && $rset2==1 )
{
	
	$qry1="SELECT `email_id` FROM `employ` WHERE `lmid`='{$_SESSION['resource_request_lmid']}'";
	$rset1=mysqli_query($conn,$qry1);
	$result1=mysqli_fetch_assoc($rset1);

	$mail=$result1['email_id'];
	$sub="Shift replaced on ".$_POST['datel'];
	$msg="your Shift on ".$_POST['datel']." has been replaced with {$_SESSION['replace_lmid']}, please use the following http://honeybee.webutu.com/view_schedule.php to know your schedulule ";
	mail($mail,$sub,$msg);
	echo"<script>window.alert('$mail')</script>";
	
	
	$qry1="SELECT `email_id` FROM `employ` WHERE `lmid`='{$_SESSION['replace_lmid']}'";
	$rset1=mysqli_query($conn,$qry1);
	$result1=mysqli_fetch_assoc($rset1);

	$mail=$result1['email_id'];
	$sub="You have Shift  on ".$_POST['datel'];
	$msg="you have shift on ".$_POST['datel']." , please use the following http://honeybee.webutu.com/view_schedule.php to know your schedulule ";
	mail($mail,$sub,$msg);
	echo"<script>window.alert('$mail')</script>";
	
	
	
	echo"<script>window.alert('Shift Replaced Successfully')</script>";
   	
}
else {
	echo"<script>window.alert('Error Plz Contact DEV Team')</script>";
   	
}
   echo '<script>window.location="shiftmanagememt.php"</script>';
		
			 		  
	  
	
	session_destroy();
}
 
	  
	  if(isset($_POST['get_Schedule'])){
		if (!isset($_SESSION)) session_start(); //print_r($_SESSION);
		  
		  $_SESSION['buffered_resource_id']=$_POST['buffered_resource_id'];
		  $qry="SELECT `id`,`shift_date`,`shift_timings` FROM `shiftschedule` WHERE `lmid`='{$_POST['buffered_resource_id']}' and `shift_date`>=curdate() and `shift_timings`<>'00:00 - 00:00' and `isbux`='yes' " ;
		  //echo $qry;
		   echo"<tr><td>Select Buffer Resource</td><td><select name='swap_date_id'>";
	       $rset=mysqli_query($conn,$qry);
	 
	 while($res=mysqli_fetch_assoc($rset)){
	 echo"<option value='{$res['id']}'>   ".$res['shift_date'].' [ '.$res['shift_timings'].' ] '."</option>";
        }
		 echo"</select></td></tr>";  
		  echo"<tr><td></td><td><input type='submit' name='grant_swap' value='SWAP'></td></tr>";
	  }

	
	if(isset($_POST['grant_swap'])){
		if (!isset($_SESSION)) session_start(); 
		
		$qry="select `shift_timings` ,`shift_date` FROM `shiftschedule` WHERE id='{$_POST['swap_date_id']}'";
		$rset=mysqli_query($conn,$qry);
		$rset=mysqli_fetch_assoc($rset);
			
		$_SESSION['swap_time']=$rset['shift_timings'];
		$_SESSION['swap_date']=$rset['shift_date'];
		
		
		
		// to check variables print_r($_SESSION);
		
		$cmt=$_SESSION['resource_request_lmid']." SHIFT SWAPED WITH ".$_SESSION['buffered_resource_id'];
		
		
	 $qry1=" UPDATE `shiftschedule` SET `shift_timings`='00:00 - 00:00',
	  `Comments`='{$cmt}',`othres_shift`='',`isbux`='no' 
	   WHERE `lmid`='{$_SESSION['resource_request_lmid']}' and
	  `shift_date`='{$_SESSION['req_date']}'";
	   
	  $qry2= " UPDATE `shiftschedule` SET `shift_timings`='{$_SESSION['swap_time']}',
	  `Comments`='he is working for  shift swap',`othres_shift`='',`isbux`='yes' 
	   WHERE `lmid`='{$_SESSION['resource_request_lmid']}' and
	  `shift_date`='{$_SESSION['swap_date']}'";
	  
	  $qry3= "UPDATE `shiftschedule` SET `shift_timings`='00:00 - 00:00',
	  `Comments`='{$cmt}',`othres_shift`='',`isbux`='no'
	   WHERE `lmid`='{$_SESSION['buffered_resource_id']}' and
	  `shift_date`='{$_SESSION['swap_date']}'";
	   
	   $qry4=" UPDATE `shiftschedule` SET `shift_timings`='{$_SESSION['request_timings']}',
	  `Comments`='he is working for  shift swap',`othres_shift`='',`isbux`='yes'
	   WHERE `lmid`='{$_SESSION['buffered_resource_id']}' and
	  `shift_date`='{$_SESSION['req_date']}'";
		
		// echo$qry1;
		// echo$qry2;
		// echo$qry3;
		// echo$qry4;
		
		$rset1=mysqli_query($conn,$qry1);
		$rset2=mysqli_query($conn,$qry2);
	    $rset3=mysqli_query($conn,$qry3);
		$rset4=mysqli_query($conn,$qry4);

	//print_r($_SESSION);
		
		session_unset();
		session_destroy();
		
		if($rset1==1 && $rset2==1 && $rset3==1 && $rset4==1)
{
	
	
	$qry1="SELECT `email_id` FROM `employ` WHERE `lmid`='{$_SESSION['resource_request_lmid']}'";
	$rset1=mysqli_query($conn,$qry1);
	$result1=mysqli_fetch_assoc($rset1);

	$mail=$result1['email_id'];
	$sub="Shift swap between ".$_SESSION['req_date']." and ".$_SESSION['swap_date'];
	$msg="your Shift has been swaped  ".$_SESSION['req_date']." to ".$_SESSION['swap_date']."please use the following http://honeybee.webutu.com/view_schedule.php to know your schedulule ";
	mail($mail,$sub,$msg); echo"<script>window.alert('$mail')</script>";
	
	
	$qry1="SELECT `email_id` FROM `employ` WHERE `lmid`='{$_SESSION['buffered_resource_id']}'";
	$rset1=mysqli_query($conn,$qry1);
	$result1=mysqli_fetch_assoc($rset1);

    $mail=$result1['email_id'];
	$sub="Shift swap between ".$_SESSION['swap_date']." and ".$_SESSION['req_date'];
	$msg="your Shift has been swaped  ".$_SESSION['swap_date']." to ".$_SESSION['req_date']."please use the following http://honeybee.webutu.com/view_schedule.php to know your schedulule ";
	mail($mail,$sub,$msg); echo"<script>window.alert('$mail')</script>";
	
	
	
	
	
	echo"<script>window.alert('Shift Swaped Successfully')</script>";
   	
}
else {
	echo"<script>window.alert('Error Plz Contact DEV Team')</script>";
   	
}
   echo '<script>window.location="shiftmanagememt.php"</script>';
		
		
	}  
	  

	 
	 

?>



							  </table>
							  </form>
							  
							  
							  
							  
                              </div>
	    </div >
		 <?php include 'footer.php' ?>
	 </div>
		</body>
<!-- *******************************************************  BODY  ************************************************************************ -->



</html>

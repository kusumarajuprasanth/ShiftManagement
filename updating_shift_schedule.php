<?php
include 'conn.php';
include 'dt.php';
if(!isset($_SESSION)){ session_start(); }
if(isset($_SESSION) && !empty($_SESSION['Team_id']) && !empty($_SESSION['lmid']) ){
	//echo"<script>window.alert('Employ inserted successfully in emp table')</script>";
 // calc for today as per_shifts;
$sid;
$qry2="SELECT `shifts_applicable`, `shifts_start_date`, `starting_shift_id` FROM `teams` WHERE `team_id`={$_SESSION['Team_id']}";

echo $qry2;
$res2=mysqli_query($conn,$qry2);$res2=mysqli_fetch_assoc($res2);

$shifts=explode('|',$res2['shifts_applicable']);
$last_shift_date=$res2['shifts_start_date'];
$shift_id=$res2['starting_shift_id'];

$date2=$last_shift_date;
$date1=date('Y-m-d', strtotime('today'));

// $date1=date_create($date1);

$days=date_diff1($date2,$date1); //d1-d2
// $dif=$days->format("%a");
$days=$days['days'];
//echo "total diff".$days ."  last shift date asper team ".$last_shift_date." todays date ".$date1;

	// ++++++++++++++++++++++++++++
if($days==0){
// place $day=0 in day =0 after all members success
$cur_dt=$lsdt=$last_shift_date;
$sid=$shift_id;
}

else{

$shift_array_length = count($shifts);


$lwd=explode('|',$shift_id);  

    $cdiw=$lwd[2]+1; //week_day
	$crnt_shift_rtn=$lwd[1];//rotation
    $lmid=$_SESSION['lmid'];
	$cur_dt=$last_shift_date;
	$shift=$lwd[0]; //shift

	
		// fetech all the shifts applicable from team.
		while($shift!=null && $days>0){
									
								
			  for($i=$crnt_shift_rtn;$i<3 && $days>0;$i++){
		     
			      for($d=$cdiw;$d<7 && $days>0;$d++){
					  					 					  
					  $sid="$shift|$i|$d";
					  $cur_dt=date('Y-m-d',strtotime("+1 day", strtotime($cur_dt)));
					  //echo $cur_dt;
					  $days--;
					
					  //echo"<script>window.alert('{$sid}')</script>";
					 // echo"<br><br>inner fourth loop";
		                                            }
		           $cdiw=0;
			 // echo"<br><br>inner third loop";
		      }         
		     $crnt_shift_rtn=1;
				// echo"<br>inner second loop";
								
			for($s=0;$s<$shift_array_length;$s++){
				if($shift==$shifts[$s]){
				if($s==$shift_array_length-1){
					$s=0;
				}
				else{
					$s++;
				}
				$shift=$shifts[$s];break;
				}
				}
			
			
			
		    }
			
	
	
	}
	//++++++++++++++++++++++++++
	
$day=array('mon','tue','wed','thu','fri','sat','sun');
//echo $sid."****"."<br>"; 
$lwd=explode('|',$sid);
//var_dump($lwd);
$day=$day[$lwd[2]];
$dayis=$day."is";

$qry2="SELECT `{$day}`,`{$dayis}` FROM `shifts` WHERE `shift_id`={$lwd[0]}";

//echo $qry2."<br>";
$res2=mysqli_query($conn,$qry2); 
$res2=mysqli_fetch_assoc($res2);

	
 //echo"<script>window.alert('{$cur_dt}')</script>";

$qry="INSERT INTO `shiftschedule`(`shift_id`, `lmid`, `shift_date`, `shift_timings`, `Comments`, `othres_shift`, `isbux`) 
VALUES ('{$sid}','{$_SESSION['lmid']}','{$cur_dt}','{$res2[$day]}','','','{$res2[$dayis]}')";
//echo $qry."<br>";
$res=mysqli_query($conn,$qry);


//tasks we have to take the shift "starting date" and "shift_id"  and "shifts applicable" from team (based on team id)

//we have to calculate the TODAY's shift based on  the  "last shift date" of the team

session_destroy();
if($res==1)
{
         mysqli_query($conn,"commit");
		

	echo'<script>window.location="run_scheduler.php?days=0"</script>';
	
}
else{
		echo"<script>window.alert('Shifts where not allocated ! please contact DEV ')</script>";
}
 
   echo '<script>window.location="update_employ"</script>';

}
else {
	echo"<script>window.alert('Employee was NOT Updated ! please contact DEV ')</script>";
	echo '<script>window.location="update_employ.php"</script>';
}

?>
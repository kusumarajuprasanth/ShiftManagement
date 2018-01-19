<img src='images\BLoader.GIF'>Working on it......</img>
<?php 
include 'conn.php';

//variables

$Schedule_days=$_REQUEST['days'];
// echo $_POST['days'];
// $total_employs_id_qry="SELECT `lmid` FROM `employ`";
// $total_employs_shiftsapplicable_qry="SELECT `shiftsapplicable` FROM `employ`";

$total_emp_last_shift_qry="SELECT `lmid`,`shift_id`,`shift_date` from shiftschedule where `id` in (SELECT MAX(`id`) FROM shiftschedule where othres_shift<>'yes' GROUP BY `lmid`)";
$result_set=mysqli_query($conn,$total_emp_last_shift_qry);

while($row=mysqli_fetch_assoc($result_set))
{   
      // echo $row['shift_id'];
	// print_r($row);
	
	
	$lwd=explode('|',$row['shift_id']);  
	
	// lwd[] ShiftId =>   [ shift| rotation | day_of_week ]  Eg:-[0] => 2 [1] => 2 [2] => 2  
	// print_r($lwd);
    
	$days=$Schedule_days;
	$cdiw=$lwd[2]+1;
	$crnt_shift_rtn=$lwd[1];
    $lmid=$row['lmid'];
	$cur_dt=$lsdt=$row['shift_date'];
	$shift=$lwd[0];
		
		while($days>0){
		
		while($shift>0 && $days>0){
				
				$employ_last_shift_qry="SELECT  `mon`, `tue`, `wed`, `thu`, `fri`, `sat`, `sun` FROM `shifts` WHERE `shift_id`='".$shift."'";
				
				$involed_in_sbux="SELECT  `monis`, `tueis`, `wedis`, `thuis`, `friis`, `satis`, `sunis` FROM `shifts` WHERE `shift_id`='".$shift."'";
				
				// echo $involed_in_sbux;
				$swd=mysqli_query($conn,$employ_last_shift_qry);
				$swd=mysqli_fetch_array($swd);
				$isft=mysqli_query($conn,$involed_in_sbux);
				$isft=mysqli_fetch_array($isft);
						
								
			  for($i=$crnt_shift_rtn;$i<3 && $days>0;$i++){
		     
			      for($d=$cdiw;$d<7 && $days>0;$d++){
					  
					  // `shift_id`, `lmid`, `shift_date`, `shift_timings`;
					  
					  $sid="$shift|$i|$d";
					  $cur_dt=date('Y-m-d',strtotime("+1 day", strtotime($cur_dt)));
					  $swd[$d];
					  
					  $qry="INSERT INTO `shiftschedule`(`shift_id`, `lmid`, `shift_date`, `shift_timings`,`isbux`) VALUES 
					  ('{$sid}','{$lmid}','{$cur_dt}','{$swd[$d]}','{$isft[$d]}')";
					  mysqli_query($conn,$qry);
					  
					 $days--;
					 // echo"<br><br>inner fourth loop";
		                                            }
		     $cdiw=0;
			 // echo"<br><br>inner third loop";
		                                                }         
		     $crnt_shift_rtn=1;
				// echo"<br>inner second loop";
				if($shift==5){
				$shift=2;
			}
			else{
				$shift++;
			}
		    }
			
	$crnt_shift_rtn=0;
	}
	
	
	// echo"frist loop";
	echo"<script>window.alert('Shifts allocated successfully ')</script>";

    echo '<script>window.location="index.php"</script>';
	
}






?>
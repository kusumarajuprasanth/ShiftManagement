<?php 
include 'conn.php';
include 'date_diff1.php';
echo"<img src='images\BLoader.GIF'>Working on it......</img>";

//variables

echo $_REQUEST['days'];
$Schedule_days=$_REQUEST['days'];

// echo $_POST['days'];
// $total_employs_id_qry="SELECT `lmid` FROM `employ`";
// $total_employs_shiftsapplicable_qry="SELECT `shiftsapplicable` FROM `employ`";



$qry="SELECT max(`shift_date`) FROM `shiftschedule`,`employ` WHERE shiftschedule.lmid=employ.lmid";

$res=mysqli_query($conn,$qry);
$res=mysqli_fetch_assoc($res);
//echo $qry.'<br/>';

//var_dump($res);
$res=$res['max(`shift_date`)']; 
$max_shift_date=$res;


$date1= date('Y-m-d', strtotime($max_shift_date. ' +'.$Schedule_days.' days'));

//echo 'max date-->'.$date1."<br>";

// $date1=date_create($date1);
// maxdate from schedule

// try to optimize this QRY
//SELECT employ.lmid,max(`shift_date`) FROM `shiftschedule`,`employ` WHERE shiftschedule.lmid=employ.lmid GROUP by employ.lmid ;  .2698
$total_emp_last_shift_qry="SELECT employ.lmid as `lmid`,`shift_id`,max(`shift_date`) as `shift_date` FROM `shiftschedule`,`employ` WHERE shiftschedule.lmid=employ.lmid and `othres_shift`<>'yes' GROUP by employ.lmid";

// SELECT `lmid`,`shift_id`,max(`shift_date`) as `shift_date` FROM `shiftschedule`,`employ` WHERE shiftschedule.lmid=employ.lmid and  `othres_shift`<>'yes' GROUP by employ.lmid 
//.0221 
$result_set=mysqli_query($conn,$total_emp_last_shift_qry);

//echo $total_emp_last_shift_qry.'<br/>';
//var_dump($result_set);

while($row=mysqli_fetch_assoc($result_set))
{   
    // echo $row['shift_id'];
	
   // print_r($row);
	
	$qry="SELECT max(`shift_date`) FROM `shiftschedule` WHERE `lmid`= '{$row['lmid']}'";
        $res=mysqli_query($conn,$qry);
	$date2=mysqli_fetch_assoc($res);
	

        //echo $qry.'<br/>';
       //var_dump($res,$date2);

	$date2=$date2['max(`shift_date`)'];

	// $date2=date_create($date2);

	echo "Employ Max Date ->-> ".$date2."  ";
	$days=date_diff1($date2,$date1); //d1-d2
        
        // $dif=$days->format("%a");
	$days=$days['days'];

	echo "Employ Diff DAYS ".$days." <br> ";
	
	
	$qry="select t.`shifts_applicable` from `teams` t,`employ` e where e.`Team_id`=t.`team_id` and `lmid`= '{$row['lmid']}' ";
	$res=mysqli_query($conn,$qry);$shifts=mysqli_fetch_assoc($res);
	$shifts=explode('|',$shifts['shifts_applicable']);
	
//echo $qry.'<br/>';
	//print_r($res);
	//print_r($shifts);
	
	
	$shift_array_length = count($shifts);
	$lwd=explode('|',$row['shift_id']);  
	
	// lwd[] ShiftId =>   [ shift| rotation | day_of_week ]  Eg:-[0] => 2 [1] => 2 [2] => 2  
	//print_r($lwd);
    
	// $days=$Schedule_days;
	$cdiw=$lwd[2]+1;
	$crnt_shift_rtn=$lwd[1];
    $lmid=$row['lmid'];
	$cur_dt=$lsdt=$row['shift_date'];
	$shift=$lwd[0];
	
	
//echo $days."<br/>";
		
		
		$qry="INSERT INTO `shiftschedule`(`shift_id`, `lmid`, `shift_date`, `shift_timings`,`isbux`) VALUES";
		$vals=null;
		while($days>0){
		// fetech all the shifts applicable from team.
		while($shift!=null && $days>0){
				
				$employ_last_shift_qry="SELECT  `mon`, `tue`, `wed`, `thu`, `fri`, `sat`, `sun` FROM `shifts` WHERE `shift_id`='".$shift."'";
				
                                //echo $employ_last_shift_qry.'<br/>';
				$involed_in_sbux="SELECT  `monis`, `tueis`, `wedis`, `thuis`, `friis`, `satis`, `sunis` FROM `shifts` WHERE `shift_id`='".$shift."'";
				
				//echo $involed_in_sbux.'<br/>';

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
					  
					  $vals[]= "('{$sid}','{$lmid}','{$cur_dt}','{$swd[$d]}','{$isft[$d]}')";
					 // echo  $qry.'<br/>';
					 
					  
					 $days--;
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
			
	$crnt_shift_rtn=0;
	}
	if($vals!=null){
	 mysqli_query($conn,($qry.implode($vals,',')));
	}
	// echo"frist loop";
	
	
}

echo"<script>window.alert('Shifts allocated successfully ')</script>";

 echo '<script>window.location="index.php"</script>';




?>
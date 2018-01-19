<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Loyalty Methods</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/datatables_min.css"/>
 		<script type="text/javascript" src="js/datatables_min.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable();
			} );
		</script>
	
</head>
<!-- *******************************************************  BODY  ************************************************************************ -->

<body>
	<div id="background">
		<div id="page">
			
			<?php include 'header.php'?>
			<?php include 'conn.php'?>
			
			<div id="contents">
				<h4>
				shift allowance 
				</h4>
					
<table id="example" class="display" cellspacing="0" width="100%">
<thead><tr><th>LMID</th><th>Name</th><th>Morning</th><th>General</th><th>After_Noon</th><th>Night</th><th>Total_Days</th><th>Shift Allowance</th></tr></thead>

<tbody>
					
													
				<?php $qry="SELECT `lmid`,`name` FROM `employ`";  $resset=mysqli_query($conn,$qry); 
				
				while($row=mysqli_fetch_assoc($resset)){
					
					$gen_shifts=0;$morning_shifts=0;$after_noon_shifts=0;$night_shifts=0;$days=0;$allowance=0;
								
					$qry="select `shift_date`,`shift_timings`,`Comments`,`isbux` from `shiftschedule` where `lmid`='".$row['lmid']."' and DATE_FORMAT(shift_date, '%Y-%m') = '".$_POST['year']."-".$_POST['month']."' ORDER BY `shift_date`";
					// echo $qry;
					$month=mysqli_query($conn,$qry);
					
					while($day=mysqli_fetch_assoc($month)){
					
					
						if($day['isbux']=='yes'){
								$days++;
								
							if($day['shift_timings']=='08:00 - 20:00'||$day['shift_timings']=='14:00 - 23:00' ){
								$after_noon_shifts++;
								
							}
							if($day['shift_timings']=='20:00 - 08:00' || $day['shift_timings']=='23:00 - 08:00'){
								$night_shifts++;
							}
							
							if($day['shift_timings']=='08:00 - 17:00'){
								$morning_shifts++;
							}
								
							
						}
					if($day['isbux']=='no' && $day['shift_timings']=='09:00 - 18:00'){
						$days++;
						$gen_shifts++;				
					
					}
						
					
					}
					
		
												
									$allowance=($after_noon_shifts*225)+($night_shifts*325)+($morning_shifts*100);
									
									echo "<tr><td>{$row['lmid']}</td><td> {$row['name']}</td><td>$morning_shifts</td><td>$gen_shifts</td><td> $after_noon_shifts</td><td>	$night_shifts</td><td> $days</td><td>$allowance</td></tr>";
									 
				}	 
										?>
									</tbody>
									
									</div>
									</table>
								
							
							
						
					</div>
				
			</div>
		
		
		<?php include 'footer.php'?>
</body>
</html>
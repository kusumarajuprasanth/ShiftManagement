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
			
			<h3><?php $qry="SELECT `name` FROM `employ` WHERE `lmid`='{$_POST['lmid']}'";  $resset=mysqli_query($conn,$qry); 
				$row=mysqli_fetch_assoc($resset);
				echo $row['name'];  ?>'s monthly Schedule</h3>
										
<table id="example" class="display" cellspacing="0" width="100%">
<thead><tr><th>shift_date</th><th> Shift_Timinigs</th> <th> Notes</th></tr></thead>
										
									<tbody>
			<?php 									
										$qry="select `shift_date`,`shift_timings`,`Comments` from `shiftschedule` where `lmid`='".$_POST['lmid']."' and DATE_FORMAT(shift_date, '%Y-%m') = '".$_POST['year']."-".$_POST['month']."' ORDER BY `shift_date`";

										// echo $qry;
										$resset=mysqli_query($conn,$qry);
										
                                          while($row=mysqli_fetch_assoc($resset)){
											  echo "<tr> <td>{$row['shift_date']}</td> <td>{$row['shift_timings']}</td><td>{$row['Comments']}</td>
											 </tr>";
											  
											 
										  }
																			
										
										?>
									</tbody>
									
									
									</table>
								
							
							
						
					
					<?php include 'footer.php'?>
				</div>
			</div>
		</div>
		
		
		
	
</body>
</html>
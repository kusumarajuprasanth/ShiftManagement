<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Loyalty Methods</title>
        <link rel="shortcut icon" href="images/lm.ico" />
	<link rel="stylesheet" href="css/style.css" type="text/css">
	
	
</head>
<!-- *******************************************************  BODY  ************************************************************************ -->

<body>
	<div id="background">
		<div id="page">
			
			<?php include 'header.php'?>
			<?php include 'conn.php'?>
			
			
			<div id="contents">
				
				<div id="main">
				
				
				
					<div class="box">
						<div>
							<div>
								<h2><u>Today's Shift Schedule</u></h2>
								<ul>
									<li>
										<h3>People  in office and involved in starbucks on <?php echo date('Y-m-d')?></h3>
										<span></span>
									
										<table cellpadding=15px border=1>
									<tbody>
								
									<th> Project </th> <th> Name</th><th> Shift Timings</th><th> moblie </th>
										<?php 
										
										$qry="select emp.project,upper(emp.name) as name,sft.shift_timings,emp.mobile from employ emp,shiftschedule sft where emp.lmid=sft.lmid and sft.shift_date='".date('Y-m-d')."' and sft.shift_timings <> '00:00 - 00:00' order by emp.project";
									 // echo $qry;
										$resset=mysqli_query($conn,$qry);
										
                                          while($row=mysqli_fetch_assoc($resset)){
											  echo "<tr> <td>{$row['project']}</td> <td>{$row['name']}</td><td>{$row['shift_timings']}</td>
											  <td>{$row['mobile']}</td> </tr>";
											  
																					  }
																			
									
										?>
									</tbody>
									
									
								</table>
								
								
											
									</li>
									
									</ul>
							</div>
						</div>
					</div>
					
					
					
					
					<div id="testimonials" class="box">
						<div>
							<div>
								<h3><u>Buffered Resource's</u></h3>
								<p>
									<span></span>
									<table cellpadding=15px border=1>
									<tbody>
								
									<th> Project</th> <th> Name</th><th> Shift Timings</th><th> moblie </th>
										<?php 
										$qry="select emp.project,upper(emp.name) as name,sft.shift_timings,emp.mobile from employ emp,shiftschedule sft where emp.lmid=sft.lmid and sft.shift_date='".date('Y-m-d')."' and sft.shift_timings = '00:00 - 00:00'";
										// echo $qry;
										$resset=mysqli_query($conn,$qry);
										
                                           while($row=mysqli_fetch_assoc($resset)){
											  echo "<tr> <td>{$row['project']}</td> <td>{$row['name']}</td><td>{$row['shift_timings']}</td>
											  <td>{$row['mobile']}</td> </tr>";
											  
											 
										  }
																			
										
										?>
									</tbody>
									
									
								</table>
							</p>
							</div>
						</div>
					</div>
				</div>
				
				
				
				<?php include 'sidebar.php'?>
						
			</div>
		</div>
		<?php include 'footer.php'?>
		</div>
		
	</body>
<!-- *******************************************************  BODY  ************************************************************************ -->



</html>
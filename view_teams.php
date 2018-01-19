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
				
				<div id="box">
				<table id="example" class="display" cellspacing="0" width="100%">
<thead><tr><th>Team_Id</th><th>Team Name</th><th>Team_Members</th></tr></thead>

<tbody>

				<?php 
				                       $qry1="select distinct `Team_id` from `teams` order by `Team_id` asc";
									   // echo $qry1;
									   $result1=mysqli_query($conn,$qry1);
									   while($row=mysqli_fetch_assoc($result1)){
									  
									  $qry11="SELECT `team_id`, `team_name` FROM `teams` WHERE `team_id`={$row['Team_id']}";
									  $result11=mysqli_query($conn,$qry11);
									  $row11=mysqli_fetch_assoc($result11);
									  echo "<tr> <td>{$row11['team_id']}</td> <td>{$row11['team_name']}</td>";
									  
									  $qry12="SELECT `name` from `employ` where `Team_id` ={$row['Team_id']}";
									  $result12=mysqli_query($conn,$qry12);
									       echo "<td>";
									  while($row=mysqli_fetch_assoc($result12)){ echo $row['name']." , ";}
									      echo "</td></tr>";
											
										
										}
										
										
										
										
										
										
										
									 
																			
									
										?>
										
										
										</tbody>
									
									
				</table>
				
				
				
				
				
				</div>
					
			</div>
		</div>
		<?php include 'footer.php'?>
		</div>
		
	</body>
<!-- *******************************************************  BODY  ************************************************************************ -->



</html>
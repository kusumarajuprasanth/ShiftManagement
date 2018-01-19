<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Loyalty Methods</title>
        <link rel="shortcut icon" href="images/lm.ico" />
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
		    
					
				<table id="example" class="display" cellspacing="0" width="100%">
<thead><tr><th>No</th><th> issue_summary</th> <th> issue_description</th><th>Actions</th><th>A</th><th>B</th></tr></thead>

				
											
							
				
			
										
									<tbody>
									
									<form method='post' name='actions' action=''>	
									
										<?php 									
										
										$qry="SELECT * FROM `wiki` WHERE 1";
										 // echo $qry;
										 $resset=mysqli_query($conn,$qry);
										 $i=1;
										 while($row=mysqli_fetch_assoc($resset)){
											 echo "<tr>
											  <td>{$i}</td>											  								  
											  <td>{$row['instance']}</td>
											  <td>{$row['issue_summary']}</td> 
											  <td>{$row['issue_resolution']}</td>
											  <td>{$row['keywords']}</td>
											  <td>												
											  <a href='viewdetails.php?id={$row['id']}'>
											  <img src='images\prst.jpg' width='30' height='30'></a>										  						  
											  </td>
											  </tr>";
											 $i++;												  
											 
										  }
																			
																			
										?>
									</tbody>
									
									
									</table>
								<a href='add_issue.php'>New Issue</a>
													
						
					
				
			
	
		
		</div>
		
		<?php include 'footer.php'?>
		
	</div>
	</div>
</body>
</html>
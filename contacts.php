<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Loyalty Methods</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="shortcut icon" href="images/lm.ico" />
		
		
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
<thead><tr><th> Name </th> <th> Mobile_number</th><th> Project</th><th> Tier </th> <th>Email</th></tr></thead>
									
									<tbody>
								
									
									
									<form action='' method='post' name='update_log'>
									<?php

										$qry="SELECT `name`, `mobile`, `project`,`tier`,`email` FROM `contacts` order by `project`,`tier`";
										
										
										$resset=mysqli_query($conn,$qry);
									  
										  while($row=mysqli_fetch_assoc($resset))
										 {
											  echo "<tr> <td>{$row['name']}</td> <td>{$row['mobile']}</td><td>{$row['project']}</td>
											  <td>{$row['tier']}</td><td>{$row['email']}</td> </tr>";
										 
										  }
											
											
									
                               ?>
							   
							   </tbody>
							   </table>
							   <a href='create_contact.php'>Create  Contact</a>
									 
									 
		
				
		</div>
		<?php include 'footer.php' ?>
		</div>
		</div>
		
		
		
	
</body>
</html>
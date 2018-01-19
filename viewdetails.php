
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Loyalty Methods</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	
</head>
<!-- *******************************************************  BODY  ************************************************************************ -->

<body>
	<div id="background">
		<div id="page">
			
			<?php include 'header.php'?>
			<?php include 'conn.php'?>
			
			<div id="contents">
				<div class="food">
					<div>
						<div class="body">			

										
									<tbody>
									
									
									<form action='' method='post' name='update_log'>
									<a href='wiki.php'> WIKI HOME</a><br><br>
									<?php

									// print_r($_GET);
									
									//get issue details usind id
									
									// add update box 
									
									// submit the update
								
										$qry="SELECT `id`, `instance`, `issue_summary`, `issue_resolution`, `keywords` FROM `wiki` WHERE `id`={$_GET['id']}";
										 $resset=mysqli_query($conn,$qry);
									     $row=mysqli_fetch_assoc($resset);
										 // print_r($row);
										 
										 echo $row['instance']."<br>";
										 echo $row['issue_summary']."<br>";
										 echo $row['issue_resolution']."<br>";
										 echo $row['keywords']."<br>";
										 
											
									
                               ?>
									 
									 
								






</tbody>
									
									
								
								
							



							
						
					</div>
				</div>
			</div>
		</div>
		</div>
		
		<?php include 'footer.php'?>
		
	
</body>
</html>

?>
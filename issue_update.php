
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
									<?php

									// print_r($_GET);
									
									//get issue details usind id
									
									// add update box 
									
									// submit the update
								
										$qry="SELECT `id`, `issue_summary`, `issue_description`,`updates` FROM `issues` WHERE `id`={$_GET['id']}";
										 $resset=mysqli_query($conn,$qry);
									     $row=mysqli_fetch_assoc($resset);
										 // print_r($row);
										 
										 echo $row['issue_summary']."<br>";
										 echo $row['issue_description']."<br>";
									    $updts=explode("|",$row['updates']);
										
										foreach($updts as $udt)
										 {
											 
											 echo $udt;
											echo "<br>";
										 }
										 
										 echo"<input type='text' name='update' value='{$row['updates']}' hidden>";
											
									
                               ?>
									 <input type='text' name='update_info'><br>
									 <input type='submit' name='update_sbt' value='Add Update'><br>
									 </form>
									 <?php 
									 
									 if(isset($_POST['update_sbt'])&& isset($_POST['update']) && (isset($_POST['update_info'])&& $_POST['update_info']!='')){
	$time=date('Y-m-d h:i:s');
	$update=$time.' --> ';
	$update.=$_POST['update_info'].'|'.$_POST['update'];
echo"<script>window.alert('Update Added successfully ')</script>";

    echo "<script>window.location='current_issues.php'</script>";
	
	// print_r($_POST);
		
	$qry="UPDATE `issues` SET `updates`='{$update}' WHERE `id`={$row['id']}";
	$resset=mysqli_query($conn,$qry);
	
}									
      
									 
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


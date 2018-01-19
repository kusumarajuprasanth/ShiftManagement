
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
									
									
									<form action='' method='post' name='fm'>
									issue_summary<input type='text' name='issue_summary' placeholder='issue_summary'><br><br><br>
									issue_description<input type='text' name='issue_description' placeholder='issue_description'><br><br><br>
									update<input type='text' name='update_info' placeholder='update'><br><br><br>
									 <input type='submit' name='update_sbt' value='Add Issue'><br><br><br>
									 </form>
									 <?php 
									 
									 if(isset($_POST['update_sbt']) && (isset($_POST['update_info'])&& $_POST['update_info']!='') && (isset($_POST['issue_summary'])&& $_POST['issue_summary']!='') && (isset($_POST['issue_description'])&& $_POST['issue_description']!='') ){
	$time=date('Y-m-d h:i:s');
	$update=$time.' --> ';
	$update.=$_POST['update_info'];
echo"<script>window.alert('Issue Added successfully ')</script>";

    echo "<script>window.location='current_issues.php'</script>";
	
	// print_r($_POST);
		
	$qry="INSERT INTO `issues`(`issue_created_date`, `issue_summary`, `issue_description`, `issue_status`, `updates`) 
	VALUES ('{$time}','{$_POST['issue_summary']}','{$_POST['issue_description']}','open','{$update}')";
	
	$resset=mysqli_query($conn,$qry);
	
}									
      
									?>
									</form>		
									</tbody>
									</div>
				</div>
			</div>
		</div>
		</div>
		
		<?php include 'footer.php'?>
		
	
</body>
</html>
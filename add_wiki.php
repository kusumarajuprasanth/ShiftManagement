
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
									instance<input type='text' name='instance' placeholder='instance'><br><br><br>
									issue_summary<input type='text' name='issue_summary' placeholder='issue_summary'><br><br><br>
									issue_resolution<input type='text' name='issue_resolution' placeholder='issue_resolution'><br><br><br>
									keywords<input type='text' name='keywords' placeholder='keywords'><br><br><br>
									
									 <input type='submit' name='update_sbt' value='Add Issue'><br><br><br>
									 </form>
									 <?php 
									 
									 if(isset($_POST['update_sbt']) && (isset($_POST['instance'])&& $_POST['instance']!='') && (isset($_POST['issue_summary'])&& $_POST['issue_summary']!='') && (isset($_POST['issue_resolution'])&& $_POST['issue_resolution']!='') && (isset($_POST['keywords'])&& $_POST['keywords']!='') ){
	

	
	// print_r($_POST);
		
		$qry="INSERT INTO `wiki`( `instance`, `issue_summary`, `issue_resolution`, `keywords`) VALUES ('{$_POST['instance']}','{$_POST['issue_summary']}','{$_POST['issue_resolution']}','{$_POST['keywords']}')";
		
    $resset=mysqli_query($conn,$qry);
	unset($_POST);
	echo"<script>window.alert('Issue Added successfully ')</script>";
    echo "<script>window.location='wiki.php'</script>";
	
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
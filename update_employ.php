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
				
				<div id="main">
				
<form action='employee_info.php' method='post' name='fm'>
<table><tr><td>Employee ID</td>  <td>
<select name="lmid"><?php $qry=mysqli_query($conn,"SELECT  distinct `lmid`,`name` FROM `employ` WHERE 1");
echo"<option value=''>Select Resource</option>";

while($res=mysqli_fetch_assoc($qry)){	echo"<option value='".$res['lmid']."'>".$res['name']."</option>";}
?> 
</td>
</tr>  




<tr><td></td>  <td><input type='submit' name='sbt' value='Update_Employee'></td></tr>

</table>
</form>

</div>



		</div>
		<?php 
		// include 'footer.php'
		?>
		</div>
		
	</body>





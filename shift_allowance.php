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
				
<form action='calc_shift_allowance.php' method='post' name='fm'>
<table>



<tr><td>Month </td>  <td>    <select name='month'>
    <option value=''>--Select Month--</option>
    <option value='01'>Janaury</option>
    <option value='02'>February</option>
    <option value='03'>March</option>
    <option value='04'>April</option>
    <option value='05'>May</option>
    <option value='06'>June</option>
    <option value='07'>July</option>
    <option value='08'>August</option>
    <option value='09'>September</option>
    <option value='10'>October</option>
    <option value='11'>November</option>
    <option value='12'>December</option>
    </select> 
    </td></tr>
<tr><td>Year </td><td>    <select name='year'>

    <option value=''>--Select year--</option>
    <option value='2015'>2015</option>
    <option value='2016'>2016</option>
    <option value='2017'>2017</option>
	
    </select> 
    </td></td></tr>
<tr><td></td>  <td><input type='submit' name='sbt' value='Get_Schedule'></td></tr>

</table>
</form>

</div>




		</div>
		<?php 
		include 'footer.php'
		?>
		</div>
		
	</body>





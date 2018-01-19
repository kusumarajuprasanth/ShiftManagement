<html>
<head>
<link rel="icon" href="images\sbux.ico" type="image/gif" sizes="32x32">
<title>Creating New Shift..</title>
<script>
</script>

</head>
<center>
<body bgcolor="#A3FF85">
<link rel="stylesheet" type="text/css" href="dist/jquery-clockpicker.min.css">
<form method="post" name='fm' id='fm' action="create_shift.php">
<table><i>
<tr><td>Shift Name</td><td><input type='text' name="shiftname" id="shiftname" placeholder="Shift Name"></td></tr>
</table>

<table border='0'>
<tr><td><u>DAY</u></td><td><u>Shift Starts</u></td><td></td><td><u>Shift Ends</u></td></tr>
<tr></tr>

<tr ><td>Monday</td><td><div class="input-group clockpicker"><input type='text' name="mos" placeholder="HH:MM" size='5'><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></div></td> <td> To </td><td>
						<div class="input-group clockpicker"> <input type='text' name="moe" placeholder="HH:MM" size='5'><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></div></td> <td>
						
						<select name='monis'><option value='yes'>Yes</option>
						<option value='no'>No</option></select>
						
						</td></tr>

<tr><td> Tuesday</td> <td><div class="input-group clockpicker"><input type='text' name="tus" placeholder="HH:MM" size='5'><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></div></td><td>To</td> <td>
						  <div class="input-group clockpicker"> <input type='text' name="tue" placeholder="HH:MM"  size='5'><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></div></td><td>
						
						<select name='tueis'><option value='yes'>Yes</option>
						<option value='no'>No</option></select>
						
						</td> </tr>

<tr><td>Wednesday</td><td><div class="input-group clockpicker"><input type='text' name="wes" placeholder="HH:MM" size='5'><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></div></td> <td>To</td><td>
                          <div class="input-group clockpicker">  <input type='text' name="wee" placeholder="HH:MM" size='5'> <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></div>  </td><td>
						
						<select name='wedis'><option value='yes'>Yes</option>
						<option value='no'>No</option></select>
						
						</td> </tr>
										   
<tr><td>Thursday</td><td><div class="input-group clockpicker"><input type='text' name="ths" placeholder="HH:MM" size='5'><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></td><td>To</td> <td>
						 <div class="input-group clockpicker"> <input type='text' name="the" placeholder="HH:MM" size='5'> <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></div>    </td><td>
						
						<select name='thuis'><option value='yes'>Yes</option>
						<option value='no'>No</option></select>
						
						</td> </tr>
										   
<tr><td>Friday</td><td><div class="input-group clockpicker"> <input type='text' name="frs" placeholder="HH:MM" size='5'><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></div></td> <td>To</td><td>
						<div class="input-group clockpicker"> <input type='text' name="fre" placeholder="HH:MM" size='5'><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></div></td> <td>
						
						<select name='friis'><option value='yes'>Yes</option>
						<option value='no'>No</option></select>
						
						</td></tr>
										   
<tr><td>Saturday</td><td><div class="input-group clockpicker"><input type='text' name="sas" placeholder="HH:MM" size='5'><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></div></td><td>To</td> <td>

						<div class="input-group clockpicker"><input type='text' name="sae" placeholder="HH:MM" size='5'><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></div></td><td>
						
						<select name='satis'><option value='yes'>Yes</option>
						<option value='no'>No</option></select>
						
						</td> </tr>
										   
<tr><td>Sunday</td><td><div class="input-group clockpicker"><input type='text' name="sus" placeholder="HH:MM" size='5'><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></div></td> <td>To</td><td>
					   <div class="input-group clockpicker"><input type='text' name="sue" placeholder="HH:MM" size='5'><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></div></td><td>
						
						<select name='sunis'><option value='yes'>Yes</option>
						<option value='no'>No</option></select>
						
						</td> </tr>
					   
					   
					   

<tr><td></td><td><input type="reset" ></td><td></td>
<td> <input type='submit' name='sbt' value="Cerate Schedule" onclick="return fun()"></td></tr>

<script type="text/javascript">
$('.clockpicker').clockpicker({
    placement: 'bottom',
    align: 'left',
    donetext: 'Done'
});
</script>
<?php
if(isset($_POST['sbt'])){
echo "<script>window.alert('hi clicked'); </script>";

}?>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="dist/jquery-clockpicker.min.js"></script>


<script type="text/javascript">
$('.clockpicker').clockpicker({
    placement: 'bottom',
    align: 'left',
    donetext: 'Done'
});
</script>



</table>

</form>
</body>
</center>
</html>
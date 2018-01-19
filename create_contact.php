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

 

 

<form name="emp" action="creating_contact.php" method="post">
<table align="center" width=40% width="100%" cellspacing="2" cellpadding="2" border="5">
    <tr>
        <td colspan="2" align="center"><b>Contact Registration Form.</b></td>
        
    </tr>
    <tr>
        <td align="left" valign="top" width="41%">Contact Name<span style="color:red">*</span></td>
 
        <td width="57%"><input type="text" value="" name="emp_name" size="24"></td>
    </tr>
 

    <tr >
 
        <td align="left" valign="top" width="41%">Contact Number<span style="color:red">*</span></td>
        <td width="57%">
        <input type="text" value="" onkeypress="return isNumberKey(event)" name="emp_contact" size="24"></td>
    </tr>
    
 
  
    <tr>
        <td align="left" valign="top" width="41%">Email<span style="color:red">*</span></td>
        <td width="57%">
        <input type="text" value="" name="email_id" size="24"></td>
    </tr>
	 <tr >
        <td align="left" valign="top" width="41%">Project<span style="color:red">*</span></td>
        <td width="57%">
<select name="Project">
<option value="Default">Default</option>
<option value="LOYALTY">LOYALTY</option>
<option value="GSIT">GSIT</option>
<option value="HEXA-DATA">HEXA-DATA</option>
<option value="LIBRA">LIBRA</option>


</select></td>
        
 
    </tr>
	
	
	<tr><td align="left" valign="top" width="41%">Tier<span style="color:red">*</span></td><td>
	<select name="Tier">
<option value="1">Tier-1</option>
<option value="2">Tier-2</option>
<option value="3">Tier-3</option>

	</select>
	</td></tr>
	
	
    
    <tr>
        <td colspan="2">
        <p align="center">
        <input type="submit" value="  Submit" name="submit"  onsubmit="return validate_form();">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" value="  Reset All   " name="B5"></td>
    </tr>
 
</table>
</form>

 

			
	 </div>
		</div>
		<?php include 'footer.php'?>
		</div>
		
	</body>
<!-- *******************************************************  BODY  ************************************************************************ -->



</html>
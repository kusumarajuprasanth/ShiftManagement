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
			
		<?php
include 'conn.php';
?>
<SCRIPT language="javascript">
// purpose : script to populate the options in select drop-down 

// how it works: when you check the checkbox then the name & id will be added to select 
// when you check the UNcheckbox then the name & id will be deleted from the select 

function addCombo(id){

	
	 var textb=document.getElementById(id);
		// alert(textb);
		
	if(textb.checked){
	var combo=document.getElementById("current_shift");
	var option=document.createElement("option");
	option.text=textb.id;
	option.value=textb.value;
	
	try{
		combo.add(option,null);
	}catch(error){
		combo.add(option);
		}
	}
	
else{
var selectobject=document.getElementById("current_shift")
  for (var i=0; i<selectobject.length; i++){
	  var str1=selectobject.options[i].value;
	  var str2=textb.value;
      if (str1.localeCompare(str2)===0)
       selectobject.remove(i);
      }
		
	}
	
}
</SCRIPT>


<form action='creating_team.php' name='fm' method='post'>
<table align="center" width=55% width="100%" cellspacing="2" cellpadding="2" border="5">

 <tr>
        <td align="left" valign="top" width="41%">Team Name<span style="color:red">*</span></td>
 
        <td width="57%"><input type="text" value="" name="team_name" size="24"></td>
    </tr>
  <tr>
        <td align="left" valign="top" width="41%">shift's Applicable<span style="color:red">*</span></td>
 
        <td width="90%">
		<table><tr><th>SHIFT</th><th>SHIFT ORDER</th></tr>
		
		<?php  $qry='SELECT `shift_id`,`shiftname` FROM `shifts` ORDER BY `shift_id`';$rset=mysqli_query($conn,$qry);	             
				 while($res=mysqli_fetch_assoc($rset))
	             echo "<tr><td><input type='checkbox' name='check_list[]' value='{$res['shift_id']}' onclick='addCombo(this.id)' id='{$res['shiftname']}' ><label>{$res['shiftname']}</label></td><td> <input type='text' name='p{$res['shift_id']}' size='1'></td></tr>";
			    ?>
				</table>
				</td>
    </tr>   
	
 <tr>
        <td align="left" valign="top" width="41%">current Shift<span style="color:red">*</span></td>
 
        <td width="57%"><select name='current_shift' id='current_shift'></select></td>
    </tr>
    
<tr>
        <td align="left" valign="top" width="41%">current Shift Rotation<span style="color:red">*</span></td>
 
        <td width="57%"><select name='currect_shift_rotation' id='currect_shift_rotation'>
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                        </select></td>
    </tr>	

	<tr><td></td><td align="center"><input type="submit" name="submit" value="Submit"></td></tr>
</table>
	 

			 


</form>	
			
			
			
			
			
			
</div>
		</div>
		<?php include 'footer.php'?>
		</div>
		
	</body>
<!-- *******************************************************  BODY  ************************************************************************ -->



</html>
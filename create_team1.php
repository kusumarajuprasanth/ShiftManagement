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
<br>Team Name <input type='text' name='team_name'>
<br>shift's Applicable <br/><?php  
$qry='SELECT `shift_id`,`shiftname` FROM `shifts` ORDER BY `shift_id`';
$rset=mysqli_query($conn,$qry);
	             
				 while($res=mysqli_fetch_assoc($rset))
	             echo "<input type='checkbox' name='check_list[]' value='{$res['shift_id']}' onclick='addCombo(this.id)' id='{$res['shiftname']}' ><label>{$res['shiftname']}</label> <input type='text' name='p{$res['shift_id']}' size='1'><br/>";


			 ?>
			 
<br>current Shift		 
<select name='current_shift' id='current_shift'>
</select>
<br>current Shift Rotation		 
<select name='currect_shift_rotation' id='currect_shift_rotation'>
<option value='1'>1</option>
<option value='2'>2</option>
</select>			 

<input type="submit" name="submit" value="Submit"/>
</form>
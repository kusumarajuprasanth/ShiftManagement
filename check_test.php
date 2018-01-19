<html>
<SCRIPT language="javascript">
function addCombo(id){

	
	 var textb=document.getElementById(id);
		// alert(textb);
		
	if(textb.checked){
	var combo=document.getElementById("currect_shift");
	var option=document.createElement("option");
	option.text=textb.value;
	option.value=textb.value;
	try{
		combo.add(option,null);
	}catch(error){
		combo.add(option);
		}
	}
	
	
	else{
var selectobject=document.getElementById("currect_shift")
  for (var i=0; i<selectobject.length; i++){
	  var str1=selectobject.options[i].value;
	  var str2=textb.value;
  if (str1.localeCompare(str2)===0)
       selectobject.remove(i);
  }
		
	}
	
}
</SCRIPT>
<br>shift's Applicable 
<input type='checkbox' name='check_list[]' id='1' onclick="addCombo(this.id)" value='reg'><label>reg_morning</label>
<input type='checkbox' name='check_list[]' id='2' onclick="addCombo(this.id)" value='reg_morning'><label>reg_afternoon</label>
<input type='checkbox' name='check_list[]' id='3' onclick="addCombo(this.id)" value='3'><label>wek_morning</label>
<input type='checkbox' name='check_list[]' id='4' onclick="addCombo(this.id)" value='4'><label>wek_night</label>	

<select name='currect_shift' id='currect_shift'>
</select>
</html>
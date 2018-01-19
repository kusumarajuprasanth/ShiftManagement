<form action="#" method="post">
<input type="checkbox" name="check_list[]" value="C/C++"><label>C/C++</label><br/>
<input type="checkbox" name="check_list[]" value="Java"><label>Java</label><br/>
<input type="checkbox" name="check_list[]" value="PHP"><label>PHP</label><br/>
<input type="submit" name="submit" value="Submit"/>
</form>
<?php
if(isset($_POST['submit'])){//to run PHP script on submit
if(!empty($_POST['check_list'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected){
echo $selected."</br>";
}
}
}
?>
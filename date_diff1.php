<?php
function date_diff1($date1,$date2){

$diff = strtotime($date2) - strtotime($date1);

$diffr['years'] = floor($diff / (365*60*60*24));
$diffr['months'] = floor(($diff - $diffr['years'] * 365*60*60*24) / (30*60*60*24));
$diffr['days'] = floor($diff/ (60*60*24));
//$diffr['days'] = floor(($diff - $diffr['years'] * 365*60*60*24 - $diffr['months']*30*60*60*24)/ (60*60*24));

// echo "  ".$date1." ";
// echo "  ".$date2." ";

return $diffr;
}


// print_r(date_diff1("02-05-2016","03-05-2016"));
?>
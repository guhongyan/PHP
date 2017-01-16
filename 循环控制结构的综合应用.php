<?php
$bookedrooms = array('102','202','203','303','307');
for($i=0;$i<5;$i++){
	echo $bookedrooms[$i]."<br/>";
}
function checkbookedroom_while($bookedrooms){
	$i = 0;
	while(isset($bookedrooms[$i])){
		echo $i.":".$bookedrooms[$i]."<br/>";
		$i++;
	}
}
checkbookedroom_while($bookedrooms);
$i=0;
do{
	echo $i."-".$bookedrooms[$i]."<br/>";
	$i++;
}while($i<2);
?>
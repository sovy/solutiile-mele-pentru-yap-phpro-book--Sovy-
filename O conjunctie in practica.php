 Adauga conjunctiv conditia isset($names[$index+1]) la conditia deja existenta 
de pe linia 7 din codul anterior.
<?php
$names = array('Mircea', 'Claudiu', 'Ioana', 'Flavius');
$me = 'Claudiu';
$after_me = NULL;
foreach($names as $index => $name) {
	if($name === $me && isset($names[$index + 1])) {
	$after_me = $names[$index + 1];
	break;
	}

}
echo 'Dupa mine este ', $after_me;

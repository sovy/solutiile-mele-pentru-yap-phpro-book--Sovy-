<?php
/**
 * The script will display in a table preferences of some children.
 * For this I create a bidimensional array with indexed keys and 
 * values are associative arrays with their preferences.  
 */
$message = NULL;
$name = array('George', 'Costel', 'Florin');
$hobby = array('chess', 'reading', 'movies');
$sport = array('football', 'basketball', 'tennis');
$color = array('red', 'blue', 'black');
$vegetable = array('tomato', 'potato', 'salad');
$meta = array('name', 'hobby', 'sport', 'color', 'vegetable');

/*
$persons = array(
		array($name[0], $hobby[0], $sport[0], $color[0], $vegetable[0]),
		array($name[1], $hobby[1], $sport[1], $color[1], $vegetable[1]),
		array($name[2], $hobby[2], $sport[2], $color[2], $vegetable[2]),
		array($name[3], $hobby[3], $sport[3], $color[3], $vegetable[3]),
		array($name[4], $hobby[4], $sport[4], $color[4], $vegetable[4]),

);
*/

for($j=0; $j<3; $j++) {
	$persons[] = array($name[$j], $hobby[$j], $sport[$j], $color[$j], $vegetable[$j]);	
}

$i = 0;
$message[] = '<table border = "1"><tr>';
foreach($meta as $values) {
	$message[] = '<th>' . $values . '</th>'; 
}
$message[] = '</tr>'; 
foreach($persons as $key => $array_individual) {
	$i++;
	if($i % 2) {
		$message[] = '<tr style="background-color:blue">';
	}
	else {
		$message[] = '<tr style="background-color:yellow">';
	}
	foreach($array_individual as $individual_preferences) {
		$message[] = '<td>' . $individual_preferences . 
			'</td>';	
	}
	$message[] = '</tr>';	
}
$message[] = '</table>';

foreach($message as $display_elements) {
	echo $display_elements;
}


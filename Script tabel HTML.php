<?php
/**
 * The script will display in a table preferences of some children.
 * $data_store - is an array who maps the children's names with 
 * their preferences and the values of these preferences.
 * 
 * display a table with predefinite headers and alternately colored
 * rows 
 *  
 *   
 *
 * string table_display(array $a, array $table_headers)  
 */

function table_display($a, $table_headers) {
	$i = 0;
	$display = '<table border = "1"><tr>';
	foreach($table_headers as $values) {
		$display .= '<th>' . $values . '</th>'; 
	}
	$display .= '</tr>'; 
	foreach($a as $key => $preferences) {
		$i++;
		if($i % 2) {
			$display .= '<tr style="background-color:blue">';
		}
		else {
			$display .= '<tr style="background-color:yellow">';
		}
		$display .= '<td>' . $key .  '</td>';
		foreach($preferences as $name_pref => $value) {
			$display .='<td>' . $value . '</td>';
		}
		$display .= '</tr>';
		 
	}
	$display .= '</table>';
	return $display;
}

$data_store = array( 
	'George' => array(
		'hobby' => 'chess',
		'sport' => 'football',
		'color' => 'red',
		'vegetable' => 'tomato',
	 ),
	'Costel' => array(
		'hobby' => 'reading',
		'sport' => 'basketball',
		'color' => 'black',
		'vegetable' => 'potato',
	 ),
	'Florin' => array(
		'hobby' => 'movies',
		'sport' => 'tennis',
		'color' => 'blue',
		'vegetable' => 'salad',
	), 
);
$meta = array('name', 'hobby', 'sport', 'color', 'vegetable');


echo table_display($data_store, $meta);




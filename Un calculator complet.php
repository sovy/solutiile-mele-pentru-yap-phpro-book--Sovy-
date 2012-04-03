<?php
/**
 * $a  - is the first mandatory parameter;   
 * $b  - is the second mandatory parameter;
 * $op - this parameter is optional, it could be
 *		'add', 'sub', 'mul', 'div' or 'mod';
 *		 
 *
 */
 
 if( !isset($_GET['a']) || !isset($_GET['b']) || 0 === (int)$_GET['b']) {
	echo 'Data error';
 }
 else {
	$a = (int)$_GET['a'];
	$b = (int)$_GET['b'];
	$op = isset($_GET['op']) &&(
		'add' === $_GET['op'] ||
		'sub' === $_GET['op'] ||
		'mul' === $_GET['op'] ||
		'div' === $_GET['op'] ||
		'mul' === $_GET['op']
		) ? $_GET['op'] : 'all';
	switch($op) {
		case 'all' :
			echo 'You didn\'t select any valid operation: <br />';
		case 'add' :
			echo $a, ' + ', $b, ' = ', $a + $b, '<br />';
			if('all' !== $op) {
				break;
			}			
		case 'sub' :
			echo $a, ' - ', $b, ' = ', $a - $b, '<br />';
			if('all' !== $op) {
				break;
			}
		case 'mul' :
			echo $a, ' * ', $b, ' = ', $a * $b, '<br />';
			if('all' !== $op) {
				break;
			}
		case 'div' :
			echo $a, ' / ', $b, ' = ', $a / $b, '<br />';
			if('all' !== $op) {
				break;
			}
		case 'mod' :
			echo $a, ' % ', $b, ' = ', $a % $b, '<br />';		
	}
 
 }

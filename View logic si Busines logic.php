<?php
/**
 * a  - is the first mandatory parameter;   
 * b  - is the second mandatory parameter;
 * op - this parameter is optional, it could be
 *		'add', 'sub', 'mul', 'div' or 'mod';
 * message - atomic information of aplication	 
 * error -will keep the error messages
 */
 
 $message = NULL;
 $error = NULL;
 const DATA_ERROR = 1;
 if(isset($_POST['submit'])) {
	if( !isset($_POST['a']) || !isset($_POST['b']) || !(int)$_POST['b']) {
		$error = DATA_ERROR ;
	}
	else {
		$a = (int)$_POST['a'];
		$b = (int)$_POST['b'];
		$op = isset($_POST['op']) &&(
			'add' === $_POST['op'] ||
			'sub' === $_POST['op'] ||
			'mul' === $_POST['op'] ||
			'div' === $_POST['op'] ||
			'mul' === $_POST['op']
			) ? $_POST['op'] : 'all';
		switch($op) {
			case 'all' :
				$message[] = 'You didn\'t select any valid operation: <br />';
				
			case 'add' :
				$message[] = $a . ' + ' . $b . ' = ' . ($a + $b) . '<br />';
				if('all' !== $op) {
					break;
				}			
				
			case 'sub' :
				$message[] = $a . ' - ' . $b . ' = ' . ($a - $b) . '<br />';
				if('all' !== $op) {
					break;
				}
				
			case 'mul' :
				$message[] = $a . ' * ' . $b . ' = ' . $a * $b . '<br />';
				if('all' !== $op) {
					break;
				}
			case 'div' :
				$message[] = $a . ' / ' . $b . ' = ' . $a / $b . '<br />';
				if('all' !== $op) {
					break;
				}
			case 'mod' :
				$message[] = $a . ' % ' . $b . ' = ' . $a % $b . '<br />';			
		}
	}
}
if(1 === $error) {
	echo 'DATA ERROR';
}
else {
	foreach($message as $value) {
		echo $value;
	}
}

?>

<form method="POST"> 
	<label for="a">First parameter:</label>
	<input type="text" name="a" id="a" /><br /><br />
	<label for="b">Scond parameter:</label>
	<input type="text" name="b" id="b" /><br /><br />
	<label for="op">Optional parameter:</label>
	<input type="text" name="op" id="op" /><br /><br />
	<input type="submit" name="submit" value="submit" />
</form>

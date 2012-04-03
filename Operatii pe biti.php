<?php
/**
 * Creaza un script care accepta doua numere a si b, 
 * cu b mai mic sau egal cu 8*PHP_INT_SIZE-1,
 * si care afiseaza rezultatele operatiilor a&b, a|b, 
 * a<<b, a>>b, a^b, ~a, ~b ¸si (a>>b)&0x1.
 */
 
$error = NULL;
$message = NULL;
const ERROR_DATA = 1;
const ERROR_SMALLER_THAN = 2;
if(isset($_GET['submit'])) {
	if(isset($_GET['a']) && isset($_GET['b'])
		&& (int)$_GET['a'] && (int)$_GET['b']) {		
		if($_GET['b'] <= 8 * PHP_INT_SIZE - 1) {
			$a = $_GET['a'];
			$b = $_GET['b'];
			$message['a & b'] = $a & $b;
			$message['a | b'] = $a | $b;
			$message['a << b'] = $a << $b;
			$message['a >> b'] = $a >> $b;
			$message['a ^ b'] = $a ^ $b;
			$message['~a'] = ~$a;
			$message['~b'] = ~$b;
			$message['(a>>b)&0x1'] = ($a >> $b) & 0x1;
		}
		else {
			$error = ERROR_SMALLER_THAN;
		}
	}
	else {
		$error = ERROR_DATA;
	}
}

//VL
if(NULL !== $error) {
	switch($error){
		case ERROR_SMALLER_THAN :
			echo 'b must be smaller than ', (8 * PHP_INT_SIZE - 1);
			break;
		case ERROR_DATA :
			echo 'data error';
			break;
	}
}
else {
	foreach($message as $key => $value) {
		echo $key, '=', $value, PHP_EOL, '<br />';
	}
}

?>
<form method="get">
<label for="a">a</label>
<input type="text" name="a" id="a" /><br />
<label for="b">b</label>
<input type="text" name="b" id="b" /><br />
<input type="submit" name="submit" /><br />
</form>

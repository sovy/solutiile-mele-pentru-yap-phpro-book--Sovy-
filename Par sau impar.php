<?php
$N = 42;
while($N >= -42) {
	echo $N, ' este ', $N % 2 === 0 ? 'par' : 'impar', '<br />';
	$N--;
}

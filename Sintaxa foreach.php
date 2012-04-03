 Scrie un program care itereaza toate elementele dintr-un array si 
afiseaza pentru fiecare 'Elementul <I> are valoarea <V>', unde <I>
este indexul, <V> este valoarea.

<?php
$a = array(2, 200, 115, 'mar');
foreach( $a as $index => $value) {
	echo 'Elementul ', $index, ' are valoarea ', $value, ' unde ', 
	$index, ' este indexul ', $value, ' este valoarea.<br />';
}


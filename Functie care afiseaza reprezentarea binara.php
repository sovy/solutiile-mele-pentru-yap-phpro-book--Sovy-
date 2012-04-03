<?php
/**
 * this function will display binary representation of an integer;  
 * 
 * void binary_form(int $n);
 */
function binary_form($n) {
	for($i=8 * PHP_INT_SIZE - 1; $i >= 0; $i--) {
	echo ($n >> $i) & 1 ? 1 : 0; 
	}
}

binary_form(45);

<?php

/**
 *
 * insert at right position a third number($c) knowing the other two's 
 * order($a <= $b)
 *
 * array insert_at_right_position(int $a, int $b, int $c)
 *
 *
 */

function insert_at_right_position($a, $b, $c) {
    if($c <= $a) {
        $m = array($c, $a, $b); 
    }
    elseif($c >= $b) {
        $m = array($a, $b, $c);
    }
    else {
        $m = array($a, $c, $b);
    }
    return $m;
}

/**
 *
 * descending sorting of three numbers
 *
 * array sort_triplet_desc(int $a, int $b, int $c)
 *
 */

function sort_triplet_desc($a, $b, $c) {
    if($a <= $b) {
        list($a, $b, $c) = insert_at_right_position($a, $b, $c);
        $m = array( $c, $b, $a); 
    }
    else {
        list($a, $b) = array($b, $a);
        list($a, $b, $c) = insert_at_right_position($a, $b, $c);
        $m = array( $c, $b, $a); 
    }
    return $m;
}

$a = (int) $_GET['a'];
$b = (int) $_GET['b'];
$c = (int) $_GET['c'];
list($a, $b, $c) = sort_triplet_desc($a, $b, $c);

echo $a, ' <= ', $b, ' <= ', $c;

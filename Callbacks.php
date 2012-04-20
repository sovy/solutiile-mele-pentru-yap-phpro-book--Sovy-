<?php

/**
 * return TRUE for all the positive numbers less or equal with 42 
 *
 * bool my_cb(int $key)
 *
 */

function my_cb($key) {
    if(is_int($key) && $key >0 && $key <=42) {
        $m = TRUE;
    }
    else {
        $m = FALSE;
    }
    return $m;
}


/**
 *
 * test if all the elements of an array are positive numbers less or equal with 
 * 42. 
 * Put the elements who meet the condition in an array $r;
 *
 * array call_and_filter(array $array, callback $cb)
 *
 */

 
function call_and_filter($a, $cb) {
    $r = array();
    foreach($a as $value) {
        if($cb($value)) {
            $r[] = $value;
        }
    } 
    return $r;
}

$a = array(3, 56, -2, 45, 42, 0, 12);

foreach(call_and_filter($a, 'my_cb') as $value) {
    echo  $value, ' ';
}

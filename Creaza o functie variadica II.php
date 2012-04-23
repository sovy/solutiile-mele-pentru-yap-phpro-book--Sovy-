<?php
/**
 *
 * int array_product(mix $par[, mix $...]);
 *
 * This function returns the product array elements; 
 * in case if the value passed as parameter is array() or at least one
 * array element isn't numeric , the retval will be 0;
 *
 */

function array_products($par) { 
    $product = 0;
    if($par !== array()) {
        $product = 1;
        foreach($par as $key => $value) {
            if(!is_numeric($value)) {
                $product = 0;
                break;
            }
        $product *= $value;
        }
    }
        return (int) $product;
        
}

$par = array();

echo array_products($par);

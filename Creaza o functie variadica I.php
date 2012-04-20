<?php
/**
 *
 * int foo(int $par[, int $...]);
 *
 * variadic function -returns the product of its arguments; 
 * 
 */

function foo() {
    for($i = 0, $arg_prod = 1; $i < func_num_args(); $i++) {
        $arg_prod *= func_get_arg($i);
    }
    return $arg_prod;
}


echo foo(2, 3, 5);


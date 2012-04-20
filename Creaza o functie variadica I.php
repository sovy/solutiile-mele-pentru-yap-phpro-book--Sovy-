<?php
/**
 *
 * int foo(int $par[, int $...]);
 *
 * variadic function -returns the product of its arguments; 
 * in case of no arguments passed or at least one argument isn't 
 * integer , the retval will be 0;
 */

function foo() {
    for($i = 0, $arg_prod = 1; $i < func_num_args(); $i++) {
        if(!is_int(func_get_arg($i))){
            $arg_prod = 0;
            break;
        }
        $arg_prod *= func_get_arg($i);
    }
    return $arg_prod;
}


echo foo(2, 1.2);


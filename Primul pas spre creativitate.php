<?php
/**
 *	This script will calculate:
 *  - circle surface;
 *  - circle diameter;
 *  - square surface;
 *  - rectangle perimeter;
 *  - cube volume.
 *    
 *  Variables:
 *  $r - radius;
 *  $d - diameter;
 *  $a - square side ;  
 *  $l - lower side of the rectangle;
 *  $L - long side of the rectangle;
 *  $c - cube side;  
 *  $Sc - circle surface;
 *  $Ss - square surface;
 *  $Pr - rectangle surface;
 *  $Vc - cube volume.
 */

$r = 5;
$a = 10;
$l = 2;
$L = 6;
$c = 8;
$pi = 3.14;

//calculations

$Sc = $pi * $r * $r;
$d = 2 * $r;
$Ss = $a * $a;
$Pr = 2 * ($l + $L);
$Vc = $c * $c * $c;

//output 

echo 'The circle surface with radius ', $r, ' is ', $Sc, '.<br />';
echo 'The circle diameter with radius ', $r, ' is ', $d, '.<br />';
echo 'The square surface with side ', $a, ' is ', $Ss, '.<br />';
echo 'The rectangle surface with lower side ', $l, ' and long side ',$L, ' is ', $Pr, '.<br />';
echo 'The cube volume with side ', $c, ' is ', $Vc, '.'; 


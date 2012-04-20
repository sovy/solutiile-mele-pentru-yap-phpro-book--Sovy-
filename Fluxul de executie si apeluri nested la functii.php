<?php
function foo($a) {
	return $a +1;
}
function bar($b) {
	return $b *42;
}
echo foo(bar(foo(foo (38))+2));

 Explica pe rand pe unde trece fluxul de executie si perechile de operatii
de adunare si de inmultire care sunt executate.

Fluxul de executie ajunge la linia 8. Aici parserul php trebuie sa evalueze 
valoarea expresiei de dupa echo pentru a i-o pasa acestuia. 

I. prima oara va fi apelata functia foo avand valoarea parametrului 38(fluxul 
de executie sare la linia 2), valoarea returnata in urma acestui apel la 
functia foo este 39(38+1);
II. fluxul de executie revine la linia 8 unde retvalue-ul functiei
foo de mai devreme este adunat cu 2 (39 + 2 = 41), dupa care
functia foo va fi apelata din nou, dar de data aceasta valoarea 
parametrului este 41; 
III. deci fluxul de executie sare din nou la linia 2, retvalue-ul
functiei foo va fi 41 + 1 = 42;
IV. fluxul de executie revine la linia 8. Va fi apelata functia bar
avand ca paramatru valoarea returnata de functia foo in urma apelului
anterior.
V. fluxul de executie sare la linia 5, retvalue-ul functiei bar va fi 
 42 * 42 = 1764;
VI. fluxul de executie revine din nou la linia 8. Va fi apelata din nou 
functia foo avand valoarea parametrului 1764;
VII. fluxul de executie sare la linia 2, retavalue-ul functiei foo 
este 1764 + 1 = 1765. Aceasta valoarea ii va fi pasata lui echo.


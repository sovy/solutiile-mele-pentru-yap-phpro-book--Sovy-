 Fie codul:
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

 Prima oara este apelata functia foo avand valoarea parametrului 38, 
valoarea returnata in urma acestui apel la functia foo este 39(38+1),
dupa care functia foo este apelata din nou dar de data aceasta valoarea 
parametrului este retvalue-ul functiei foo(adica 39) in urma apelului 
de mai devreme a functiei foo, valoarea returnata de acest apel este 
40(39+1), aceasta valoarea se aduna cu 2 rezultand valoarea 42, se 
apeleaza functia bar, iar valoarea parametrului pasat acestei functii 
are valoarea rezultata in urma adunarii de mai devreme
adica 42, dupa care se apeleaza din nou functia foo avand valoarea
parametrului, retval-ul functiei bar(42*42), adica 1764. 
 Valoarea finala returnata este de 1765(1764+1). Aceasta valoare ii 
este pasata lui echo pentru a fi afisata.
 


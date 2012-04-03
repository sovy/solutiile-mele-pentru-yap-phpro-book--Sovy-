		Partea I
 Cum se citeste llinia 2 din listingul 2.8? Incepe raspunsul asa:
Daca ....

R: Daca valoarea asociata cheii a din array-ul $_GET nu este setata sau 
este NULL sau daca valoarea asociata cheii b din aray-ul $_GET nu este setata
sau este NULL executa urmatorul bloc de instructiuni...

	Partea II
 Rescrie conditia intr-o forma "mai compacta" folosind legile lui De Morgan.
Explica inca o data cum se citeste aceasta noua linie de cod, asa cum ai
facut in partea I a exercitiului pentru conditia initiala.

<?php
if(!(isset($_GET['a']) && isset($_GET['b']))) {
..........
} 
R: Daca valoarea asociata cheii a din array-ul $_GET este setata si este 
diferita de NULL si daca valoarea asociata cheii b din aray-ul $_GET 
este setata si este diferita de NULL, totul negat este evaluat ca TRUE 
executa urmatorul bloc de instructiuni...



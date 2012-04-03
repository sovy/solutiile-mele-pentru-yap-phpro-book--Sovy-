		Partea I
 Explica ce face urmatorul algoritm pas cu pas si ce reprezinta rezultatul
final.
<?php
$the_answer = 42;
$foo = 0;
while($the_answer--) {
	$foo +=$the_answer;
}
echo $foo;
R: Acest algoritm calculeaza suma numerelor de la 0 la 41 astfel:
-variabilei $the_answer i se atribuie valoarea constanta de tip integer 42
-variabilei $foo ii este atribuita valoarea 0
-atata timp cat valoarea variabilei $the_answer decrementata este evaluata 
ca TRUE executa instructiunile din cadrul buclei while, adica "salveaza in 
variabila $foo valoarea variabilei $the_answer(bineinteles acum e decrementata
cu o unitate).

		Partea II
<?php
$the_answer = 42;
$foo = 0;
while(--$the_answer) {
	$foo +=$the_answer;
}
echo $foo;



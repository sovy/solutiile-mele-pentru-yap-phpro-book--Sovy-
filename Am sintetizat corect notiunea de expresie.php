		Partea I
 Scrie un cod PHP care sa afiseze valoarea booleana a unei comparatii 
stricte dintre o expresie matematica si un string.
 Expresia matematica trebuie sa contina cel putin o operatie de gradul I, 
una de gradul II, si sa foloseasca cel putin o data parantezele rotunde pentru
grupare.

<?php
var_dump(2 + 3 * (5 + 6) === '35');
		
		Partea II
 Explica in cuvinte ce face urmatorul cod:
<?php
$foo = 4 == '5';

R: Acest cod atribuie variabilei $foo valoarea expresiei conditionale din 
dreapta operatiei de atribuire care va fi de tip boolean.
 Deoarece expresia conditionala e reprezentata de compararea unui int cu 
un string, stringul '5' este convertit la valoarea sa numerica si apoi este 
comparat cu valoarea int 4. Deoarece cele doua valori sunt diferite valoarea 
comparatiei este booleanul FALSE.
 
 

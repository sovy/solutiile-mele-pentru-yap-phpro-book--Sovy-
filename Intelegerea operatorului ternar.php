		Partea I
 Explica incuvinte ce face linia 3 din exemplul anterior.
$este_administrator = 'administrator' === $rol ? TRUE : FALSE;

R: Ii este atribuita, variabilei $este_administrator, valoarea rezultata in
urma evaluarii operatorului ternar. Valuarea constanta de tip string 
'administrator' este comparata strict cu valoarea variabilei $rol(adica 
valoarea constanta de tip string 'administrator').Deoarece ambele valori 
sunt egale si tipul de date este identic valoarea expresiei rezultate in 
urma evaluarii operatorului ternar va fi booleanul TRUE.

		Partea II
 Explica in cuvinte ce se intampla concret in acest cod:
<?php 
$rol = 'administrator';
if('test' === ($rol === 'administrator' ? 'test' : 'test2')) {
	echo 'administrator';
}
 Pentru doua cazuri, cand $rol are valoarea 'administrator', si cand 
area o alta valoare.
R:
 Evaluarea conditiei din cadrul constructului if consta in comparatia stricta 
daca valoarea stringului 'test' este identica cu valoarea rezultata in urma
evaluarii operatorului ternar.
 Daca valoarea variabilei $rol este stringul 'administrator'atunci conditia din
cadrul operatorului ternar este evaluata ca TRUE iar valoarea cu care 
operatorulternar va fi inlocuit va fi a stringului 'test'. Deci in cadrul 
constructului if valoarea stringului 'test' va fi comparata strict cu valoarea 
stringului 'test' (rezultat de la operatorul ternar). Aceasta va fi evaluata 
ca TRUE, iar fluxul de executie va trece prinramura TRUE a constructului if, 
adica va fi executa instructiunea de pe linia 4 care va genera outputul 
administrator.
 Daca valoarea variabilei $rol are o alta valoare decat 'administrator' atunci
conditia din cadrul operatorului ternar va fi evaluta ca FALSE, iar valoarea 
cu care se va inlocui operatorul ternar va fi stringul 'test2', iar in 
cadrul constrctului if se va face comparatia stricta dintre 'test' si 
'test2' care va fi evaluata ca FALSE, ceea ce face ca fluxul de executie 
sa treaca prin ramura else --pe care in aceasta situatie nu o avem. Deci 
pentru aceasta situatie nu se va genera output.   

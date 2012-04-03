 Explica de ce functia pass_is_correct este apelata in cazul urmator:
<?php
function pass_is_correct ( $password ) {
echo 'vom confrunta parola cu valoarea corecta ';
return 'foo ' === $password ;
}
$input = 'bar ';
if (! empty ( $input ) && pass_is_correct ( $input )) {
echo 'autentificat ';
}

dar nu este apelata in cazul urmator:

<?php
function pass_is_correct ( $password ) {
echo 'vom confrunta parola cu valoarea corecta ';
return 'foo ' === $password ;
}
$input = '';
if (!empty ( $input ) && pass_is_correct ( $input )) {
echo 'autentificat ';
}

 Pentru primul caz functia pass_is_correct este apelata deoarece:
- avem o expresie conditionala care e formata din unirea conjunctiva
a doua expresii booleene.
- deoarece operatorul si logic (&&) este left associative mai intai 
e evaluata expresia !empty($input); 
- valoarea expresiei !empty($input) este evaluata ca TRUE ($input are 
o valoare) dupa care se trece la evaluarea celei de-a doua expresie
adica mai intai se apeleaza functia pass_is_correct, iar retvalue-ul 
functiei este evaluat ca TRUE sau FALSE, dupa care se face unirea 
conjunctiva a celor doua expresii.

 Pentru cazul doi deoarece expresia conditionala e o conjunctie logica
a doua expresii booleene, iar prima expresie booleana este evaluata ca
FALSE, parserul se opreste din parsat si atribuie imediat expresiei 
conditionale valoarea FALSE, deoarece el stie ca nu are rost 
sa evalueze in continuare restul expresiilor, deoarece oricare ar fi
valoarea lor booleana rezultatul ar fi tot FALSE.
 

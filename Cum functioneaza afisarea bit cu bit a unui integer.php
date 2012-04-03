
Explica cum functioneaza codul din listingul 2.10.
<?php
$a = 42;
for($i=8*PHP_INT_SIZE-1;$i>=0;$i--) {
   echo ($a>>$i) & 1 ? ’1’:’0’;
}

 Variabilei a i se atribuie valoarea 42, dupa care fluxul de executie trece la
bucla for. Inainte de a intra in executia propriuzisa a buclei for variabila
$i este initializata cu valoarea 8*PHP_INT_SIZE-1(constanta PHP_INT_SIZE ia
valoarea 4 sau 8 in functie de tipul sistemului de operare de 32 sau 64 biti),
in cazul meu windows-32 biti, PHP_INT_SIZE ia valoarea 4 deci variabila $i e 
initializata cu valoarea 31,dupa care se face verificarea conditiei care este 
evaluata ca TRUE, dupa care se trece la executia instructiunilor din cadrul
buclei for astfel:
- constructului echo ii este pasata valoarea rezultata din urma evaluarii
operatorului ternar. In urma evaluarii conditiei din cadrul operatorului 
ternar daca bitul curent este 1(conditia din cadrul operatorului fiind evaluata
ca TRUE) constructului echo i se va pasa valoarea 1, iar in caz contrar 0.
- la fiecare iteratie a buclei for val variabilei $i va fi decrementata, se va
face verificarea conditiei din cadrul constructului for si in caz de e evaluata 
TRUE se vor executa instructiunile din cadrul buclei for( se va verifica daca 
bitul curent este 0 sau 1 cu ajutorul operatorului ternar, in functie de 
rezultat i se va pasa lui echo 0 sau 1).

-- ($a>>$i) & 1--la fiecare iteratie a buclei in functie de valoarea lui 
variabilei i se va face shiftarea catre dreapta cu i biti a lui a si apoi cu 
valorea rezultata se va face si logic cu valoarea 1, astfel se verifica daca 
bitul curent este 1.(intr-un cuvant in binar valoarea lui a dupa ce i se aplica
un shift de n \biti--n maxim 31-- va arata ceva de genul 000000000010101010110,
iar celalalt operand cu care se face and-ul este 00000000000000000..01 - 32 de
caractere prin urmare valoarea rezultata va fi 000000000.0000 --deoarece 
caracterul curent--ultimul--- al lui a este 0).

- bucla for se va itera pana cand conditia va deveni falsa($i = -1) si se
va iesi din bucla.
 In urma executiei acestului script in canvas-ul browserului va fi afisata
reprezentarea binara a valorii variabilei $a de la stanga la dreapta.
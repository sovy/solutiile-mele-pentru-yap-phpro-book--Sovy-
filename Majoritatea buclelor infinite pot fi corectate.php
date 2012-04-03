 Rescrie condul anterior mutand (si eventul modificand) conditia de 
intrerupere a buclei (deci conditia din if, si renuntand complet la 
folosirea break.

<?php
$N = 391;
while(0 !== $N % 10) {
	$N++;
}
echo 'N rotunjit prin adaugire este ', $N;

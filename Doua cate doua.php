		Partea I
 Scrie un program folosind bucla for cu initializari si expresii multiple
care calculeaza suma fiecarui numar par de la 0 la 50 cu numarul impar care
il succeda. Altfel spus, 0+1, 2+3 ....

<?php
for($i = 0, $j = 0, $sum =0, $N = 50; $i <= $N; $i += 2) {
	$j = $i + 1;
	$sum = $i + $j;
	echo $i, ' + ', $j, ' = ', $sum, '<br />';
}


		Partea II
 Rescrie programul folosind o singura variabila.
<?php
for($i = 0; $i <= 50; $i += 2) {
	echo $i, ' + ', $i + 1, ' = ', $i + $i + 1, '<br />';
}

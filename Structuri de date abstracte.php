 Modifica scriptul din listiningul 2.9 astfel incat sa genereze
dinamic formularul HTML pe baza structurii de date asociative
$fructe.
 Imbunatateste scriptul astfel incat sa nu dea erori pentru 
imputuri precum:
/fructe.php?fructe[]=capsuni&submit=Trimite	

<?php
/**
 *  This script will show you an information message about one   
 * 	or many other selected fruits.
 *  $fructe - fruits dictionary 
 *		
 */
$fructe = array(
	'mere' => 'Merele contin multi antioxidanti.',
	'pere' => 'Perele sunt bogate in vitamina C si in potasiu.',
	'alune' => 'Alunele sunt bogate in proteine, grasimi si vitamina B6.',
	'piersici' => 'Piersicile nu au ce cauta aici.',
);
if(isset($_GET['submit']) && isset($_GET['fructe'])) {
	foreach($_GET['fructe'] as $fruct) {
		if(isset($fructe[$fruct])) {
			echo '<p>', $fructe[$fruct], '</p>';
		}
	}
}

echo '<form method="GET">';
foreach($fructe as $fruct => $descriere) {
	echo '<input type="checkbox" name="fructe[]" value="'. $fruct . '" id="' . $fruct . '-id" />
		<label for="' . $fruct . '-id">' . $fruct . '</label><br />';
}
echo '<input type="submit" name="submit" value="Trimite" />
	</form>';

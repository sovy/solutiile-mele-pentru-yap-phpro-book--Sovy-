		Partea I
 Scrie un cod care pornind de la un array precum
$menu = array('Home', 'Contact', 'Despre');
genereaza un meniu de navigare.

<?php 
$menu = array('Home', 'Contact', 'Despre');
echo '<ul>', "\n";
foreach($menu as $option) {
	echo "\t", '<li><a href="#', $option, '">', $option, '</a></li>', "\n";
}
echo '</ul>';
		Partea II
 Imbunatateste codul astfel incat daca $menu este initializat gol, sa nu mai 
genereze un meniu, ci output-ul 'Meniu inexistent'.
<?php 
//$menu = array('Home', 'Contact', 'Despre');
if(!empty($menu)) {
	echo '<ul>', "\n";
	foreach($menu as $option) {
		echo "\t", '<li><a href="#', $option, '">', 
		$option, '</a></li>', "\n";
	}
	echo '</ul>';
}
else {
	echo 'Meniu inexistent.';
}

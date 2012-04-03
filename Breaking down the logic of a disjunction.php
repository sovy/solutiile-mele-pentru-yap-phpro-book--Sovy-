 Creaza tabelul de adevar al disjunctiei  A V B si rupe-i logica in
partile componente dupa tabelul creat.

if(A) {
	if(B) {
	//cazul T V T = T
	}
	else {
	//cazul T V F = T
	}
}
else {
	if(B) {
	//cazul F V T = T
	}
	else {
	//cazul F V F = F
	}
}

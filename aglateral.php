<?php
foreach ($alglinks as $clave => $valor) {
	if (is_int($clave)) {
		echo "<p><a class=texto href=\"$valor[1]\">" . $valor[0] . '</a></p>';
	} else {
		echo '<p><a class=texto href="./index.php?pag=' . $clave . '&sub=alg">' . $valor[0] . '</a></p>';
	}
}
?>

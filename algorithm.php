<h1 class=subt>Algoritomos matemáticos</h1>

<?php
foreach ($alglinks as $clave => $valor) {
	if (is_int($clave)) {
        if ($clave == 0) {
           echo "<h1 class=subt>Descargas</h1>";
        }
		echo "<p><a class=texto href=\"$valor[1]\">" . $valor[0] . '</a><span class=p>' . $valor[2] . '</span></p>';
	} else {
		echo '<p><a class=texto href="./index.php?pag=' . $clave . '&sub=alg">' . $valor[0] . '</a><span class=p>' . $valor[2] . '</span></p>';
	}
}
?>

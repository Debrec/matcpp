<?php
$title=true;
foreach ($alglinks as $clave => $valor) {
	if (is_int($clave)) {
        if ($clave == 0) {
           echo "<h2 class=subt>Descargas</h2>";
        }
		echo "<p><a class=texto href=\"$valor[1]\">" . $valor[0] . '</a></p>';
	} else {
        if ($title) {
           echo "<h2 class=subt>Paginas</h2>";
            $title = false;        
        }
		echo '<p><a class=texto href="./index.php?pag=' . $clave . '&sub=alg">' . $valor[0] . '</a></p>';
	}
}
?>

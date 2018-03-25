<?php
foreach ($matlinks as $clave => $valor) {
	echo '<p><a class=texto href="./index.php?pag=' . $clave . '&sub=mat">' . $valor[0] . '</a></p>';
}
?>

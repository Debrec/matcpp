<h1 class=subt>Curso de Matemática</h1>

<?php
foreach ($matlinks as $clave => $valor) {
	echo '<p><a class=texto href="./index.php?pag=' . $clave . '&sub=mat">' . $valor[0] . '</a><span class=p>' . $valor[2] . '</span></p>';
}
?>

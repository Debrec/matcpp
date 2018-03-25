<?php

$regpp = 6;

function agregarcomentario($nombre,$email,$texto) {
	include('./conectar.php');

	if((strlen($texto)<=500) && (strlen($nombre)<=30) && (strlen($email)<=30)) {	
		if(isset($email) && isset($texto)) {
			$texto = trim($texto);
			$texto = nl2br($texto);
			$query="INSERT INTO comentarios (nombre,email,comentario) VALUES ('$nombre','$email','$texto')";
			if (! $mysqli->query($query)) {
				//error_log("ERROR: Could not execute $query. " . $mysqli->error,3,'./log/error_log');
				echo "<p class=failure>¡Error al agregar el comentario al realizar query!</p>";
			} else {
				echo "<p class=succes>¡El comentario se ha agregado con exito!</p>";
			}
		} else {
			echo "<p class=failure>¡Error al agregar el comentario!</p>";
		}
	} else {
		echo "<p class=failure>¡Error cadena demasiado larga!</p>";		
	}
	$mysqli->close();
}

function contarceldas($mod) {
	global $imax;
	include('./conectar.php');
	$querymax = "SELECT COUNT(*) FROM comentarios where moderado=$mod";
	$imax = $mysqli->query($querymax);
	return $imax->fetch_array()[0];
}

function paginas($numpag,$pag,$regpp) {
	$mod = ($pag == 'login') ? 0 : 1;
	//$regpp=$GLOBALS['regpp'];;// = 6;
	$imax = contarceldas($mod);
	$maxpag = (int) ceil($imax/$regpp);
	$numpag = (int) (isset($numpag) ? $numpag : 1);
	//echo "<h1>$numpag &nbsp; $imax &nbsp; $maxpag &nbsp;</h1>";
	echo '<div class="center"><p align="center">';
	if ($maxpag == 0) {

	} else if ($maxpag == (int)1 ) {
		echo '<a href="index.php?pag='.$pag.'&numpag=1">1</a>&nbsp;';
	} else if ($maxpag == (int)2) {
		echo '<a href="index.php?pag='.$pag.'&numpag=1">1</a>&nbsp;';
		echo '<a href="index.php?pag='.$pag.'&numpag=2">2</a>&nbsp;';
	} else if ($maxpag == $numpag) {
		echo '<a href="index.php?pag='.$pag.'&numpag='.($maxpag-1).'">'.($maxpag-1).'</a>&nbsp;';
		echo '<a href="index.php?pag='.$pag.'&numpag='.$maxpag.'">'.$maxpag.'</a>&nbsp;';
	} else {
		$base = ($numpag == 1) ? $numpag : $numpag-1;
		for ($i = $base;$i <= ($base+2); $i++) {
			echo "<a href=\"index.php?pag=$pag&numpag=$i\">$i</a>&nbsp;";
		}
	}
	echo '</p></div>';
}

function mostrarcomentarios($numpag,$pag,$regpp) {
	//$regpp=$GLOBALS['regpp'];// = 6;
	$numpag = isset($numpag) ? $numpag : 1;
	$offset = ($numpag-1) * $regpp;
	$mod = ($pag == 'login') ? 0 : 1;
	include('./conectar.php');
	$query = "SELECT" . " id, timestamp, nombre, comentario, moderado FROM  comentarios  where moderado = $mod limit ".$offset.","."$regpp"; 
	if ($result = $mysqli->query($query)) {
	  if ($result->num_rows > 0) {
	    echo "<tr><th>Fecha</th> <th>nombre</th> <th>comentario</th>";
		if ($pag == 'login') {
			echo "<th>Moderar</th>";
		}
		echo "</tr>\n";
		$i = 0;
		while(($row = $result->fetch_object())) {
			echo "<tr bgcolor=" . (($i%2) ? "#552729" : "#774949") ."><td>".$row->timestamp.'</td> <td>' . $row->nombre . '</td> <td>' .$row->comentario.'</td>';
			if ($pag == 'login') {
				echo '<td><a href="index.php?pag=login&id='.$row->id.'">moderar</a></td>';
			}
			echo "</tr>\n";
			$i++;
		}
	    $result->close();
	  } else {
		  if($pag == 'login') {
			echo "<p>No hay ningún comentario para moderar</p>";			  
		  } else {
			echo "<p>Todavía no hay ningún comentario, se el primero en comentar</p>";
		  }
	  }
	} else {
		echo "<p class=failure>Error al ejecutar query : $query</p>";
		//error_log("ERROR: Could not execute $query. " . $mysqli->error,3,"./log/error_log");
	}
}
?>
<?php
$mysqli = new mysqli("localhost", "hernan", "test", "comentarios");
if ($mysqli === false) {
  die("ERROR: Could not connect. " . mysqli_connect_error());
}
$mysqli->set_charset('utf8');
?>

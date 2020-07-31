<?php

function getConnection(){
	$conex = mysqli_connect("localhost", "root", "galito.97", "examenweb");

	if (!$conex) {
		echo "<p> Error: No se pudo conectar a MySQL." . PHP_EOL;
		echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
		echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		echo "</p>";
		exit;
	}
	//echo "<p>Conectado con éxito</p>" . PHP_EOL;
	return $conex;
}

?>
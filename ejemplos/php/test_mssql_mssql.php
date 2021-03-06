<?php

if (!function_exists('mssql_connect')) {
  exit( "Solo disponible para versiones inferiores a PHP 5.3" );
}

// Se realiza la conex?n de forma segura, no es necesario especificar un usuario y password

$conn = mssql_connect( 'localhost', '', '' );
if (!$conn) {
	exit( "Error al conectar: " . $conn);
} else {
	// seleccionamos la base de datos
	mssql_select_db( 'testconndb');

	// Se define la consulta que va a ejecutarse
	$sql = "SELECT * FROM Tabla";

	// Se ejecuta la consulta y se guardan los resultados en el recordset rs
	$rs = mssql_query( $sql );

	if ( !$rs ) {
		exit( "Error en la consulta SQL" );
	}

	// Se muestran los resultados
	$resultado=mssql_result($rs, 0,"Campo");
	echo $resultado;

	// Se cierra la conexi?n
	mssql_close( $conn );
}
?>

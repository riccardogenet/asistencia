<?php
	$timezone = 'America/La_Paz';
	date_default_timezone_set($timezone);

	setlocale(LC_ALL, 'es_ES'); // Configura la localización en español para Bolivia

	// Ahora puedes obtener la fecha en español
	echo strftime("%A, %d de %B de %Y");
?>
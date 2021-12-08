<?php 
echo <<<ENDHTML
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Comentarios</title>
	<style>
	table{
		width:100%;
		border:1px solid;
	}
	td{
		padding:2%;
		
	}
	.nota{
		text-align:center;
	}
	</style>
	</head>
	<body>
		<table>
			 <tr>
				<td colspan="4">
					Seguro que se podría hacer mejor, pero para poder hacerlo mas visual y no tener que preguntar literalmente si es un director y un actor he dejado un desplegable donde puedes elegir uno otro u ambos.
                    He tenido que crear una funcion transform() en el commit para poder poner los valores que queria del actor
				</td>
			</tr>

			
			<tr class="nota">
				<td>Nota Documento: </td>
				<td > 5</td>
				<td>Nota ExplicaciÃ³n: </td>
				<td>5 </td>
			</tr>
			<tr class="nota">
				<td>Nota Alumno: </td>
				<td>5</td>
			</tr>
		</table>
	</body>
	</html>
ENDHTML;
?>
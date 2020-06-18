<?php 
	include 'db.php';

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Chat PHP/MYSQL/AJAX</title>
	<link rel="stylesheet" type="text/css" href="styles.css">

	<script type="text/javascript">
		function ajax(){
			var req = new XMLHttpRequest();

			req.onreadystatechange = function () {
				if (req.readyState == 4 && req.status == 200) {
					document.getElementById('chat').innerHTML = req.responseText;
				}
			}

			req.open('GET', 'chat.php', true );
			req.send();
		}

		//refresca la pagina cada segundo
		setInterval (function () {ajax();}, 100);

	</script>

</head>
<center>
<h1 id="color-blanco">Bienvenido a la sala de chat V 1.0</h1>
<h2>TP Nº 3 Diseño de Aplicaciones Web</h2>
</center>
<br>
<br>

<body onload="ajax();">
	<div id="contenedor">
		<div id="caja-chat">
			<div id="chat">
				
		</div>
	</div>
	<form method="POST" action="index.php">
		<input type="text" name="nombre" placeholder="Ingresa Tu Nombre">
		<textarea name ="mensaje" placeholder="Ingresa tu Mensaje"></textarea>
		<input type="submit" name="enviar" value="Enviar">
	</form>
	<?php 
		if (isset($_POST['enviar'])) {
			$nombre = $_POST['nombre'];
			$mensaje = $_POST['mensaje'];

			$consulta = "INSERT INTO chat (nombre, mensaje) VALUES ('$nombre', '$mensaje')";
			$ejecutar = $conexion->query($consulta);

			if ($ejecutar) {
				echo "<embed loop = 'false' src='beep.mp3' hidden='true' autoplay='true'>";
			}

		}


	 ?>

	</div>
</body>
<br>
<footer class="page-footer font-small blue">
<center>
            <div >© 2020 Copyright:
                <p class=>Figueras Gonzalo, Galarza Agustin, Gutierrez Marcelo</p>
            </div>
</center>
        </footer>
</html>
<!DOCTYPE HTML>

<html>
	<body>
		<div id="contenido">
			<div id="contenidoCont">
				<div class="centrar">
					<p>Seleccione el cliente a cotizar.</p>

					<br />
					<br />
					<br />

					<form action="partidas.php" method="POST">

						<?php

							if($permiso== 1)
							$sql = "SELECT * FROM Clientes WHERE desactivado = 0  ORDER BY empresa";
							else
							$sql = "SELECT * FROM Clientes WHERE desactivado = 0 AND id_usuario = '$id_usuario' ORDER BY empresa";# code...

							$resultado = query($sql, $conexion);

							echo '<select name=empresa>';

							while ($campo = mysql_fetch_array($resultado))
							{
								echo
								'
									<option>'
										.$campo["empresa"].
									'</option>
								';
							}
							echo '</select>';

						?>

						<br />
						<br />
						<br />

						<input type="submit" value="Cotizar" class="botonChico">
					</form>
				</div>
			</div>
		</div>
	</body>
</html>

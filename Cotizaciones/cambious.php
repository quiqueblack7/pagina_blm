<!DOCTYPE html>

<html>
	<body>
		<div id="contenido">
			<div id="contenidoCont">
				<div class="centrar">

					<br />
					<br />

					<p>Seleccione el usuario a modificar:</p>

					<br />
					<br />
					<br />

					<form action="index.php" method="GET">

						<?php
							$sql = "SELECT nombre, apellido_p FROM `Usuarios` WHERE activo='1'";
							$resultado = query($sql, $conexion);
							echo
							'
								<select id=cambioselect name=nombreCambio class="inputChico">

								<option class="selectDefault" disabled selected>
									Seleccione...
								</option>
							';

							while ($campo = mysql_fetch_array($resultado))
							{
								echo
								'
									<option value="'.$campo["nombre"].'">'
										. $campo["nombre"].
									'</option>
								';
							}

							echo
							'
								</select>
							';
						?>

						<br />
						<br />
						<br />

						<input type="submit" value="Modificar" class="botonChico">
					</form>
				</div>
			</div>
		</div>

		<?php

			if(isset($_GET['cambioUs']) && $_GET['cambioUs'] == "hecho")
			{
		?>
		
				<script>

					alert("Los cambios se realizaron con éxito");
					location.href="index.php?sec=cambious"

				</script>

		<?php
			}
		?>

	</body>
</html>

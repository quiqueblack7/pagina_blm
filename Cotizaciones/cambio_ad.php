<!doctype html>

<html>
	<body>
		<div id="contenido">
			<div id="contenidoCont">
				<div class="centrar">

					<?php

						$sql = "SELECT * FROM Usuarios WHERE id_usuario = '$id_usuario'";
						$resultado = query($sql, $conexion);
						$campo = mysql_fetch_assoc($resultado);
						$permiso=$campo["permiso"];

						$cont = 0;

						$sql = "SELECT * FROM Clientes";
						$resultado = query($sql, $conexion);
						while ($campo = mysql_fetch_array($resultado))
						{
							$cont = 1;
						}

						if ($cont == 1)
						{
					?>
					<p>Seleccione el cliente a modificar:</p>

					<br />
					<br />
					<br />

					<form action="cambiousuario.php" method="POST">
						<?php
						if($permiso==1)
							$sql = "SELECT * FROM Clientes WHERE desactivado = 0  ORDER BY empresa ";
						else
							$sql = "SELECT * FROM Clientes WHERE desactivado = 0 AND id_usuario = '$id_usuario' ORDER BY empresa ";
							
							$resultado = query($sql, $conexion);

							echo
							'
								<select id=cambioselect name=empresa class="inputChico">
							';

							while ($campo = mysql_fetch_array($resultado))
							{
								$empresa=$campo["empresa"];
								echo
								'
									<option>'
										.$empresa.
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


					<?php
						}

						if ($cont == 0)
						{
					?>

					<div class="errorRegistros centrar">NO HAY REGISTROS</div>

					<?php
						}
					?>

				</div>
			</div>
		</div>
	</body>
</html>

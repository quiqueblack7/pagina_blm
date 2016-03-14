<!DOCTYPE html>

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

					<p>Seleccione el cliente que desea eliminar:</p>

					<br />
					<br />
					<br />

					<form action="bajausuario.php" method="POST">
						<?php

							if($permiso==1)
								$sql = "SELECT * FROM Clientes WHERE desactivado = 0  ORDER BY empresa ";
							else
								$sql = "SELECT * FROM Clientes WHERE desactivado = 0 AND id_usuario = '$id_usuario' ORDER BY empresa ";

							$resultado = query($sql, $conexion);

							echo
							'
								<select id=bajaselect name=empresa class="inputChico">
							';

							while ($campo = mysql_fetch_assoc($resultado))
							{
								echo
								'<option>'
										.$campo['empresa'].
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

						<input type="submit" value="Eliminar" class="botonChico" >

					</form>

					<?php

						}

						else
						{

					?>

					<div class="errorRegistros centrar">NO HAY REGISTROS</div>

					<?php

						}

					?>

				</div>
			</div>
		</div>

		<script type="text/javascript">

			function irAlIndice()
			{
				if (confirm("¿Quieres Eliminarlo"))
				{
					document.location.href = 'bajausuario.php';
				}
			}

		</script>

	</body>
</html>

<!DOCTYPE html>

<html>
	<body>

		<script>

			function Eliminar(id_cotizacion) {
				if (confirm("Esta seguro que desea eliminar la cotizacion?"))
				{
					dire = "eliminar_cotizacion.php?id_cotizacion=";
					var union = dire.concat(id_cotizacion);
					window.location = union;
				}

			}

			function Restaurar(id_cotizacion) {
				if (confirm("Esta seguro que desea activar de nuevo la cotizacion?"))
				{
					dire = "activar_cotizacion.php?id_cotizacion=";
					var union = dire.concat(id_cotizacion);
					window.location = union;
				}

			}

		</script>

		<div id="contenido">
			<div id="contenidoCont">

				<?php

					$cont = 0;

					//Obtener Datos de la empresa a cambiar "tabla clientes"
					$sql = "SELECT * FROM Cotizaciones";
					$resultado = query($sql, $conexion);

					while ($campo = mysql_fetch_array($resultado))
					{
						$cont = 1;
					}

					if ($cont == 1)
					{

				?>

				<div class="CSSTableGenerator" >
					<table>
						<tr>
							<td>No</td>
							<td>Fecha</td>
							<td>Cliente</td>
							<td>Vendedor</td>
							<td colspan="4">Gesti&oacute;n</td>
						</tr>

						<?php

						$sql = "SELECT * FROM Cotizaciones ORDER BY id_cotizacion DESC";
						$resultado = query($sql, $conexion);
						while ($campo = mysql_fetch_array($resultado))
						{
							$activo = $campo['activo'];
							$id_cotizacion = $campo['id_cotizacion'];
							$id_cliente = $campo['id_cliente'];

							echo
							"
								<tr>
							";

							echo
							"
								<td align='center'>"
									.$campo['id_cotizacion'].
								"</td>
							";

							$sql3 = "SELECT * FROM Cotizaciones WHERE id_cotizacion = '$id_cotizacion'";
							$resultado3 = query($sql3, $conexion);
							$campo3 = mysql_fetch_array($resultado3);
							$id_usuario = $campo3['id_usuario'];

							$sql0 = "SELECT * FROM Usuarios WHERE id_usuario = '$id_usuario'";
							$resultado0 = query($sql0, $conexion);
							$campo0 = mysql_fetch_array($resultado0);
							$vendedor = $campo0['nombre']. ' ' .$campo0['apellido_p'];
							//$id_num_cliente = $campo['id_num_cliente'];

							echo
							"
								<td align='center'>"
									.$campo['fecha'].
								"</td>
							";

							$sql2 = "SELECT * FROM Clientes WHERE id_num_cliente = '$id_cliente'";
							$resultado2 = query($sql2, $conexion);
							$campo2 = mysql_fetch_array($resultado2);
							$empresa = $campo2['empresa'];
							$permiso = $campo2['permiso'];

							echo
							"
								<td>"
									.$campo2['empresa'].
								"</td>
							";

							if($permiso == "Administrador")
							{
								echo
								"
									<td>"
										.$permiso.
									"</td>
								";
							}

							else
							{
								echo
								"
									<td>"
										.$vendedor.
									"</td>
								";
							}

							echo
							"
								<td>
									<a href='ver_cotizacion.php?id_cotizacion=".$id_cotizacion."' class='gestion'>
										Ver
									</a>
								</td>

								<td>
									<a href='editar_cotizacion.php?id_cotizacion=".$id_cotizacion."' class='gestion'>
										Editar
									</a>
								</td>

								<td>
									<a href='reusar.php?id_cotizacion=".$id_cotizacion."' class='gestion'>
										Reusar
									</a>
								</td>

								<td>
							";

							if ($activo == 1)
							{
								echo
								"
									<div class='eliminart gestion' align='center' onclick='Eliminar(".$id_cotizacion.")'>
										Eliminar
									</div>
								</td>
								";
							}

							if ($activo == 0)
							{
								echo
								"
									<div class='restaurar gestion' align='center' onclick='Restaurar(".$id_cotizacion.")'>
										Activar
									</div>
								</td>
								";
							}

							echo "</tr>";
						}

						?>
					</table>
				</div>

				<?php
					}

					if ($cont == 0)
					{
				?>

				<div class="errorRegistros centrar">
					NO HAY REGISTROS
				</div>

				<?php
					}
				?>

			</div>
		</div>
	</body>
</html>

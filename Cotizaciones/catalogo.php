<!DOCTYPE html>
<html>
	<body>
		<div class="CSSTableGenerator">
			<table class="centrar">
				<tr>
					<td>
						No
					</td>

					<td>
						Catálogo
					</td>

					<td>
						Unidad
					</td>

					<td>
						Descripción
					</td>
				</tr>

				<?php
					$sql = "SELECT * FROM Catalogo WHERE activo = 1";
					$resultado = query($sql, $conexion);

					while ($campo = mysql_fetch_array($resultado))
					{
						$numero = $campo['id_catalogo'];
						$numero= $numero+1;
						echo
						"
							<tr>
								<td>"
									.$numero.
								"</td>

								<td>"
									.$campo['catalogo'].
								"</td>

								<td>"
									.$campo['unidad'].
								"</td>

								<td>"
									.$campo['descripcion'].
								"</td>
							</tr>
						";


					}
				?>
			</table>
		</div>
	</body>
</html>

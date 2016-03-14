<!DOCTYPE html>

<html>
	<body>
		<div id="contenido">
			<div id="contenidoCont">
				<div class="centrar">

					<?php
						$cont = 0;
						$sql = "SELECT * FROM Catalogo WHERE activo = '1'";
						$resultado = query($sql, $conexion);
						while ($campo = mysql_fetch_array($resultado))
						{
							$cont = 1;
						}

						if ($cont == 1)
						{
					?>

					<p>Seleccione el producto que desea eliminar:</p>

					<br />
					<br />
					<br />

					<?php

							echo '<form action="index.php" method="GET">';

							$sql = "SELECT catalogo FROM Catalogo WHERE activo = 1";
							$resultado = query($sql, $conexion);

							echo
							'
								<select id=bajaselect name=catalogo class="inputChico">

								<option class="selectDefault" disabled selected>
									Seleccione...
								</option>
							';

							while ($campo = mysql_fetch_array($resultado))
							{
								$catalogo = $campo['catalogo'];

								echo
								'
									<option value="'.$catalogo.'">'
										.$catalogo.
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

		<?php
			if(isset($_GET['catalogo']))
			{
		?>
				<script>

					function myFunction()
					{
						var catalogo = "<?php echo $_GET['catalogo'];?>";
						var r = confirm("¿Seguro que desea eliminar el producto " + catalogo + "?");

						if (r == true)
						{
							location.href="bajaproducto.php?catalogo="+catalogo;
						}

						else
						{
							location.href="index.php?sec=baja_p";
						}
					}

					myFunction()
				</script>
		<?php
			}

			if(isset($_GET['borrar']))
			{
		?>
				<script>

					alert("El producto ha sido borrado");
					location.href="index.php?sec=baja_p"

				</script>
		<?php
			}
		?>

	</body>
</html>

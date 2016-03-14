<!DOCTYPE html>

<html>
	<body>
		<div id="contenido">
			<div id="contenidoCont">
				<div class="centrar">
				
					<?php

						$cont = 0;
						
						$sql = "SELECT * FROM Usuarios Where id_usuario = '$id_usuario'";
						$resultado = query($sql, $conexion);
						while ($campo = mysql_fetch_array($resultado)) 
						{
							$permiso = $campo['permiso'];
						}
								
						if($permiso==1)
						{	
							$sql = "SELECT * FROM `Clientes` WHERE `desactivado` = '0' ";
						}
						
						else
						{
							$sql = "SELECT `empresa` FROM `Clientes` WHERE `id_usuario` = '$id_usuario' AND `desactivado` = '0' ";
						}
						
						$resultado = query($sql, $conexion);
						while ($campo = mysql_fetch_array($resultado)) {
							$cont = 1;
						}

						if ($cont == 1) {
							
						?>

						<div id="addcliente"><div style="margin-top: -180px;">Seleccione el cliente que desea eliminar:</div></div>
						<form action="bajausuario.php" method="POST">



							<?php
				//Seleccionamos Los nombres de los clientes segun usuario
							$sql = "SELECT `empresa` FROM `Clientes` WHERE `id_usuario` = '$id_usuario' AND `desactivado` = '0' order by empresa";
							$resultado = query($sql, $conexion);

							//Generamos el menu desplegable
							echo '<select id=bajaselect name=empresa>';
							while ($campo = mysql_fetch_array($resultado)) {
								echo '<option style="width:520px;">' . $campo["empresa"] . "</option>";
							}
							echo '</select>';
							?>

							<input type="submit" value="Eliminar" class="formu-button" >

						<?php }
						if ($cont == 0) {
							?>

							<div class="errorRegistros centrar">NO HAY REGISTROS</div>
				<?php } ?>


				</div>
			</div>
		</div>
		<script type="text/javascript">
			function irAlIndice() {

				if (confirm("¿Quieres Eliminarlo")) {

					document.location.href = 'bajausuario.php';

				}

			}

		</script>
	</body>
</html>

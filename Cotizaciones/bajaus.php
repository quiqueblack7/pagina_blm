<!DOCTYPE html>

<html>
	<body>
		<div id="contenido">
			<div id="contenidoCont">
				<div class="centrar">

					<br />
					<br />
					
					<p>Seleccione el usuario que desea eliminar:</p>
					
					<br />
					<br />
					<br />
					
					<form action="index.php" method="GET">
					
					<?php
						$sql = "SELECT * FROM Usuarios WHERE activo='1'";
						$resultado = query($sql, $conexion);
						
						echo 
						'
							<select id=bajaselect name=nombreBajaUs class="inputChico">
							
							<option class="selectDefault" disabled selected>
								Seleccione...
							</option>
						';
						
						while ($campo = mysql_fetch_array($resultado)) 
						{
							$nombre = $campo['nombre'];
							
							echo 
							'
								<option value="'.$nombre.'">' 
									.$campo["nombre"].
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
				</div>
			</div>
		</div>
		
		<?php 
			if(isset($_GET['nombreBajaUs']))
			{
		?>
		
				<script>
				
					function myFunction() 
					{
						var nombreus = "<?php echo $_GET['nombreBajaUs'];?>";
						var r = confirm("¿Seguro que desea eliminar al usuario " + nombreus + "?");
						
						if (r == true) 
						{
							location.href="bajausuarion.php?nombre="+nombreus;
						} 
						
						else 
						{
							location.href="index.php?sec=bajaus";
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
				
					alert("El usuario ha sido borrado");
					location.href="index.php?sec=bajaus"
					
				</script>
		<?php
			}
		?>
	</body>
</html>



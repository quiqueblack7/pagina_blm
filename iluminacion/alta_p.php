<?php 
	session_start();
	
	if (!isset($_GET['producto']))
		$producto = NULL;
	
	else
		$producto = $_GET['producto'];
?>

<!DOCTYPE html>

<html>
	<body>
		<div id="contenido">
			<div id="contenidoCont">
				<div class="centrar">
					<p>Ingrese los datos del producto que desea agregar:</p>
					
					<br />
					<br />
					<br />

					<form action="altaproducto.php" method="POST">   
						<input type="text" class="inputChico" placeholder="C&aacute;talogo" name="catalogo" autofocus required>
						<select class="inputChico" name="unidad" required>
							<option class="selectDefault" disabled selected>
								Unidad
							</option>
							
							<option value="PZA." >
								PZA.
							</option>
							
							<option value="JGO.">
								JGO.
							</option>
							
							<option value="METRO">	
								METRO.
							</option>
							
							<option value="CJTO.">
								CJTO.
							</option>
							
							<option value="ROLLO">
								ROLLO
							</option>
							
							<option value="N/A">
								N/A
							</option>
							
							<option value="S/N">
								S/N
							</option>
						</select>
						
						<br />
						<br />
						
						<textarea class="areaText" placeholder="Descripci&oacute;n" name="descripcion" required></textarea>
						
						<br />
						<br />
						
					   <input type="submit" value="Agregar" class="botonChico">
					</form>
				</div>
			</div>
		</div>
		
		<?php		
			if($producto == "agregado")
			{
		?>		
				<script>
				
					function agregado() 
					{
						alert("Se ha agregado el producto con exito");
					}
					
					agregado()
				</script>
		<?php
			}
		?>
	</body>
</html>
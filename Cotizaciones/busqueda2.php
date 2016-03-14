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
					$numero = 1;
					$sql = "select * from Catalogo where descripcion like '%$descripcion%'";
					$resultado = query($sql, $conexion);
					
					while ($campo = mysql_fetch_array($resultado)) 
					{
						echo
						"
							<tr>
								<td>" 
									.$numero.
								"</td>
								
								<td>" 
									.$campo['id_catalogo']. 
								"</td>
								
								<td>" 
									.$campo['unidad']. 
								"</td>
								
								<td>" 
									.$campo['descripcion']. 
								"</td>
							</tr>
						";
						
						$numero++;
					}
					
				?>
			</table>
		</div>
	</body>
</html>

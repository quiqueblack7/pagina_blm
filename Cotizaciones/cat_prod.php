<?php
    if (!isset($_GET['opcion']))
        $opcion = null;
	
    else
        $opcion = $_GET['opcion'];

    if (!isset($_GET['producto']))
        $producto = "nada";
	
    else
        $producto = $_GET['producto'];

    if (!isset($_POST['descripcion']))
        $descripcion = "nada";
	
    else
        $descripcion = $_POST['descripcion'];
	
	if(isset($_GET['busquedaProductoCatalogo']))
		$producto = $_GET['busquedaProductoCatalogo'];
	
	if(isset($_GET['busquedaProductoDescripcion']))
		$descripcion = $_GET['busquedaProductoDescripcion'];
?>
<html>
	<body>
	
		<script>
			function todo()
			{
				location.href="?sec=verP&opcion=todo";
			}
		</script>
		
		<div id="contenido">
			<div id="contenidoCont">
				<div class="centrar">				
					<p>Cat&aacute;logo de productos</p>
					
					<br />
					<br />
					<br />

					<div id="buscadoresCentrados2">					
						<div class="alineaIzquierda centrar">
							Por catalogo:
							
							<br />
							<br />
							
							<form action="index.php" method="GET">
								<input type=text name=busquedaProductoCatalogo class="inputChico" required> 
								
								<br />
								<br />
								
								<input type=submit value="Buscar" class="botonChico">
							</form>
						</div>
						
						<div class="alineaIzquierda centrar">		
							
							<br />
							<br />
							<br />
							<br />
							<br />
							
							<input type="button" value="Mostrar todo" class="botonChico" onclick="todo()">
						</div>
						
						<div class="alineaIzquierda centrar">
							Por descripción:
							
							<br />
							<br />
							
							<form action="index.php" method="GET">
								<input type=text name=busquedaProductoDescripcion class="inputChico" required> 
								
								<br />
								<br />
								
								<input type=submit value="Buscar" class="botonChico">
							</form>
						</div>				
					</div>

					<div id="busquedaCatalogo">

							<?php
								if ($opcion == "todo") 
								{
									require_once("catalogo.php");
								}

								if ($producto != "nada") 
								{
									require_once("busqueda.php");
								}

								if ($descripcion != "nada") 
								{
									require_once("busqueda2.php");
								}
							?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>




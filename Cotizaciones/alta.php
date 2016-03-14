<!DOCTYPE html>

<html>
	<body>
		<div id="contenido">
			<div id="contenidoCont">
				<div class="centrar">
				<p>Ingrese los datos del cliente que desea agregar:</p><br /><br /><br />
					<form action="altacliente.php" method="POST">
						<input type="text" class="inputChico" placeholder="RFC de la empresa" name="rfc">
						<input type="text" class="inputChico" placeholder="Raz&oacute;n social" name="empresa" required>

						<br />
						<br />

						<input type="text" class="inputChico" placeholder="Calle y número" name="calle_num">
						<input type="text" class="inputChico" placeholder="Municipio/Delegacion" name="municipio">

						<br />
						<br />

						<input type="text" class="inputChico" placeholder="Estado" name="estado">
						<input type="text" class="inputChico" placeholder="C&oacute;digo Postal" name="cp">

						<br />
						<br />

						<input type="text" class="inputChico" placeholder="Nombre del contacto" name="contacto">
						<input type="text" class="inputChico" placeholder="Departamento" name="departamento">

						<br />
						<br />

						<input type="text" class="inputChico" placeholder="Tel&eacute;fono" name="telefono1">
						<input type="text" class="inputChico" placeholder="Tel&eacute;fono Alternativo" name="telefono2">

						<br />
						<br />

						<input type="text" class="inputChico" placeholder="E-mail" name="email">

						<br />
						<br />
						<br />

						<input type="submit" value="Agregar" class="botonChico">
					</form>
				</div>
			</div>
		</div>
	</body>
</html>

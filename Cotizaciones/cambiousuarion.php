<?php
$nombre = $_GET['nombreCambio'];


//Obtener Datos de la empresa a cambiar "tabla clientes"
$sql = "SELECT * FROM Usuarios WHERE nombre = '$nombre'";
$resultado = query($sql, $conexion);
while ($campo = mysql_fetch_array($resultado)) 
{
    $id_usuario = $campo['id_usuario'];
    $permiso = $campo['permiso'];
    $nombre = $campo['nombre'];
    $apellido_p = $campo['apellido_p'];
    $apellido_m = $campo['apellido_m'];
    $e_mail = $campo['e_mail'];
    $no_usuario = $campo['no_usuario'];
}

//Obtener Datos de la empresa a cambiar "tabla clientes"
$sql2 = "SELECT * FROM `Log_In` WHERE `no_usuario` = '$no_usuario'";
$resultado2 = query($sql2, $conexion);
while ($campo2 = mysql_fetch_array($resultado2)) {
    $password = $campo2['password'];
}
?>

<!DOCTYPE html >
<html>
    <body>
        <div id="contenido">
            <div id="contenidoCont">
				<p class="centrar">Modifique los apartados del usuario:</p>
				
				<br />
				<br />
				
				<div id="inputsForm" class="centrar">
					<?php echo '<form action="cambiousuarion2.php?usuario='.$id_usuario.'" method="POST">'; ?>
						<div class="alineaIzquierda">
							<div id="mensaje1" class="mensaje">Nombre de Usuario</div>
							<div onmouseover="mensaje1()" onmouseout="noMensaje1()"><input type="text" class="inputChico"  name="usuario" value="<?php echo$id_usuario; ?>" disabled="disabled"></div>
						</div>
						<div class="alineaIzquierda">
							<div id="mensaje2" class="mensaje">Nombre</div>
							<input onfocus="mensaje2()" onblur="noMensaje2()" type="text" class="inputChico"  name="nombre" value="<?php echo$nombre; ?>" required>
						</div>						
						
						<div class="break"></div>
						<br />						
						
						<div class="alineaIzquierda">
							<div id="mensaje3" class="mensaje">Apellido paterno</div>
							<input onfocus="mensaje3()" onblur="noMensaje3()" type="text" class="inputChico"  name="apellido_p" value="<?php echo$apellido_p; ?>" required>
						</div>
						<div class="alineaIzquierda">
							<div id="mensaje4" class="mensaje">Apellido materno</div>
							<input onfocus="mensaje4()" onblur="noMensaje4()" type="text" class="inputChico"  name="apellido_m" value="<?php echo$apellido_m; ?>">
						</div>
						
						<div class="break"></div>
						<br />
						
						<div class="alineaIzquierda">
						<div id="mensaje5" class="mensaje">E-mail</div>
						<input onfocus="mensaje5()" onblur="noMensaje5()" type="email" class="inputChico"  name="e_mail" value="<?php echo$e_mail; ?>" required>
						</div>
						<div class="alineaIzquierda">
						<div id="mensaje6" class="mensaje">Permisos</div>
						<select onfocus="mensaje6()" onblur="noMensaje6()" class="inputChico"  name="permiso">
							<option value="1" <?php if($permiso == 1)echo"selected" ?>>Administrador</option>
							<option value="2" <?php if($permiso == 2)echo"selected" ?>>Vendedor</option>
						</select>	
						</div>
						
						<div class="break"></div>
						<br />
						
						
						
						<div id="mensaje7" class="mensaje">Password</div>
						<input onfocus="mensaje7()" onblur="noMensaje7()" type="password" class="inputChico"  name="password" value="<?php echo $password; ?>"required>
						
						<div class="break"></div>
						<br />
						<br />
						<br />

						<input type="submit" value="MODIFICAR!" class="botonChico">								
					</form>
				</div>
			</div>
		</div>
	</body>
</html>







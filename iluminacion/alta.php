<?php if (!isset($_SESSION['usuario'])) {
    header('Location: relogin.php'); ?>

<?php } else { ?>
    <html>
        <div id="addcliente"><div style="margin-top: -180px;">Ingrese los datos del cliente que desea agregar:</div></div>
        <form action="altacliente.php" method="POST">

            <input type="text" class="formu" placeholder="RFC de la empresa" name="rfc" autofocus >
            <input type="text" class="formu" placeholder="Raz&oacute;n social" name="empresa" autofocus required>
            <textarea name="calle_num" class="areaform" placeholder="Calle y número"></textarea>
            <input type="text" class="formu" placeholder="Colonia" name="colonia" autofocus >
            <input type="text" class="formu" placeholder="Municipio/Delegacion" name="municipio" autofocus >    
            <input type="text" class="formu" placeholder="Estado" name="estado" autofocus >
            <input type="text" class="formu" placeholder="C&oacute;digo Postal" name="cp" autofocus >
            <input type="text" class="formu" placeholder="Nombre del contacto" name="contacto" autofocus >
            <input type="text" class="formu" placeholder="Departamento" name="departamento" autofocus>
            <input type="text" class="formu" placeholder="Tel&eacute;fono" name="telefono1" autofocus >
            <input type="text" class="formu" placeholder="Tel&eacute;fono Alternativo" name="telefono2" autofocus>
            <input type="text" class="formu" placeholder="E-mail" name="email" autofocus >
            <input type="submit" value="Agregar" class="formu-button">
        </form>
    <?php } ?>
</html>

<?php if (!isset($_SESSION['usuario'])) {
    header('Location: relogin.php'); ?>

<?php } else { ?>
    <html>
        <br><br>

        <div id="adouser" align="center">Ingrese los datos del usuario que desea agregar:</div>
        <br><br>
        <form method="POST" onSubmit="return Password()" action="altausuario.php">

            <input type="text" class="formu" placeholder="Nombre de usuario" name="id_usuariog" autofocus required>

            <select name="permiso" class="formu" required>
                <option disabled selected>Seleccione un tipo de usuario</option>
                <option value="2">Vendedor</option>
                <option value="1">Administrador</option>
            </select> 

            <input type="text" class="formu" placeholder="Nombre" name="nombre"  required>

            <input type="text" class="formu" placeholder="Apellido paterno" name="apellido_p"  required>

            <input type="text" class="formu" placeholder="Apellido materno" name="apellido_m" required>

            <input type="text" class="formu" placeholder="E-mail" name="e_mail" required>

            <input type="password" id="passwd" class="formu" placeholder="Password" name="password" required >

            <input type="password" id="passwd2"  class="formu" placeholder="Repetir password" name="passwordy" required >




            <input type="submit" value="Agregar" class="formu-button">
        </form>


    <?php } ?>

</html>

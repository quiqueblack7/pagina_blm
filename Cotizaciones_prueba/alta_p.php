<?php if (!isset($_SESSION['usuario'])) {
    header('Location: relogin.php'); ?>

<?php } else { ?>
    <html>
        <div id="addproducto">Ingrese los datos del producto que desea agregar:</div>

        <form action="altaproducto.php" method="POST">   
            <input type="text" class="formu" placeholder="C&aacute;talogo" name="catalogo" autofocus required>
            <select style="background-color: white" class="formu" name="unidad" required>
                <option style="background-color: #DADADA" disabled selected>Unidad</option>
                <option value="PZA." >PZA.</option>
                <option value="JGO.">JGO.</option>
                <option value="METRO">METRO.</option>
                <option value="CJTO.">CJTO.</option>
                <option value="ROLLO">ROLLO</option>
                <option value="N/A">N/A</option>
                <option value="S/N">S/N</option>
            </select>
            <textarea class="areatext" placeholder="Descripci&oacute;n" name="descripcion" required></textarea>
            <input type="submit" value="Agregar" class="formu-button">
        </form>
    <?php } ?>
</html>
<html>
    <?php
    if (!isset($_GET['op']))
        $seccion = null;
    else
        $seccion = $_GET['op'];
    ?>

    <script src="ajax.js" language="JavaScript"></script> 
    <div id=cliente>
        Agregar Cliente 
    </div>
    <div id=cliente> 
        Borrar Cliente
    </div>
    <div id=cliente>
        Modificar Cliente 
    </div>

    <div id="mover">
        <ul>

            <li>
                <a id="enlace1">
                    <img src="images/alta.png" width="70px" href="alta.php">
                </a>
            </li>

            <li>
                <a  id="enlace2">
                    <img src="images/baja.png" width="70px" href="baja.php">
                </a>
            </li>

            <li>
                <a  id="enlace3">
                    <img src="images/cambio.png" width="70px" href="cambio.php">
                </a>
            </li>
        </ul>
    </div>

    <div id="detalles">


    </div>

</html>

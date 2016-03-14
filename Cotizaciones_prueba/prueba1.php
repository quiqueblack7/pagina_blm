<!DOCTYPE html >
<html>
    <head>

    </head>

    <script language="javascript">
        function fAgrega()
        {
            document.getElementById("Text2").value = document.getElementById("Text1").value;
        }
    </script>

    <body>

        <input id="Text1" type="text" onkeyup="fAgrega();" />
        <br />
        <br />
        <input id="Text2" type="text" />

    </body>

</html>

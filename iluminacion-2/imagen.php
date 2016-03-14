<html>
<body>

<img src="caracteristicas.jpg" value="Mostrar" onclick="mostrar()">  <img src="beneficios.jpg" value="Mostrar2" onclick="mostrar2()"> 


<div id='carac' style='display:none;'>
Caracteristicas
</div>

<div id='bene' style='display:none;'>
Beneficios
</div>

<script type="text/javascript">
function mostrar(){
document.getElementById('carac').style.display = 'block';
document.getElementById('bene').style.display = 'none';
}

function mostrar2(){
document.getElementById('bene').style.display = 'block';
document.getElementById('carac').style.display = 'none';
}

</script>

</body>
</html>


<html>
<body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51891618-1', 'auto');
  ga('send', 'pageview');

</script>
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


<!DOCTYPE html>
<html lang="es-MX">
	<head>
		<meta name="keywords" content="HTML, CSS, PHP, JavaScript" />
		<meta name="description" content="Venta de artefactos fotoluminiscentes" />
		<meta charset="UTF-8" />
    <meta name=viewport content="width=device-width, initial-scale=1">
		<meta name="author" content="Nevin Santana" />
		<title>Best Light México</title>
		<style type="text/css">
		
		*,
*:after,
*:before {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}

.switch {
  margin: 50px auto;
  bottom: 0;
  right: 50%;
  position: absolute;
}

.switch label {
  width: 100%;
  height: 100%;
  position: relative;
  display: block;
}

.switch input {
  top: 0; 
  right: 0; 
  bottom: 0; 
  left: 0;
  opacity: 0;
  z-index: 100;
  position: absolute;
  width: 100%;
  height: 100%;
  cursor: pointer;
}
			#body
			{
				background-color: black;
				transition: 0.7s;
				overflow: hidden;
			}
			h1#especial
			{
				font-family: georgia;
				position: absolute;
				margin: 0.5em 0 0 0.4em;
				padding: 0;
				font-size: 300px;
				transition: color 0.7s;
				text-align: center;
				color: black;
			}
			
			h4#autor
			{
				position: absolute;
				font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif;
				right: 0;
				bottom: 0;
				margin-right: 1em;
				margin-bottom: 1em;
				color: #838383;
			}
			
			#nombreCompleto
			{
				float: right;
				margin-top: 6.5em;
				margin-right: 2em;
				font-size: 65px;
				transition: opacity 1s, margin 1s;
				opacity: 0;
			}		
			
			#movimientoLogo
			{
				width: 54em;
				height: 31.5em;
				margin: 5em auto;
				overflow: hidden;
			}
			
			#curva
			{
				position: absolute;
				transition: 0.7s;
				opacity: 0;
			}
			
			
			.switch.demo1 {
			  width: 30px;
			  height: 30px;
			}

			.switch.demo1 label {
			  border-radius: 30%;
			  background: #eaeaea;
			  box-shadow: 
				  0 3px 5px rgba(0,0,0,0.25),
				  inset 0 1px 0 rgba(255,255,255,0.3),
				  inset 0 -5px 5px rgba(100,100,100,0.1),
				  inset 0 5px 5px rgba(255,255,255,0.3);
			}

			.switch.demo1 label:after {
			  content: "";
			  position: absolute;
			  top: -8%; right: -8%; bottom: -8%; left: -8%;
			  z-index: -1;
			  border-radius: inherit;
			  background: #ddd;
			  box-shadow: 
				inset 0 2px 1px rgba(0,0,0,0.15),
				0 2px 5px rgba(200,200,200,0.1);
			}

			.switch.demo1 label:before {
			  content: "";
			  position: absolute;
			  width: 30%;
			  height: 30%;
			  border-radius: 50%;
			  left: 35%;
			  top: 35%;
			  background: #969696;
			  background: radial-gradient(40% 35%, #ccc, #969696 60%);
			  box-shadow:
				  inset 0 2px 4px 1px rgba(0,0,0,0.3),
				  0 1px 0 rgba(255,255,255,1),
				  inset 0 1px 0 white;
			}

			.switch.demo1 input:checked ~ label {
			  background: #dedede;
			  background: -moz-linear-gradient(#dedede, #fdfdfd);
			  background: -ms-linear-gradient(#dedede, #fdfdfd);
			  background: -o-linear-gradient(#dedede, #fdfdfd);
			  background: -webkit-gradient(linear, 0 0, 0 100%, from(#dedede), to(#fdfdfd));
			  background: -webkit-linear-gradient(#dedede, #fdfdfd);
			  background: linear-gradient(#dedede, #fdfdfd);
			}

			.switch.demo1 input:checked ~ label:before {
			  background: rgba(255,214,163,1);
			  background: radial-gradient(ellipse at center, rgba(255,214,163,1) 0%, rgba(255,146,10,1) 51%, rgba(255,231,201,1) 100%);
			  box-shadow:
				  inset 0 3px 5px 1px #e09c48,
				  0 1px 0 #c77e24,
				  0 0 10px 2px #f56f31;
			}
			
			#luminaria
			{
				position: absolute;						
				z-index: 2;
				opacity: 0.5;
				transition: 0.8s;
			}	
			
			#luces
			{
				position: absolute;	
				margin: 2em 0 0 10em;
				z-index: 0;
				transition: 0.1s;
				opacity: 0;
			}			
			
			#luminaria1
			{
				position: absolute;
				width: 23em;
				height: 20em;
				left: 5em;
				top: 5em;
				margin: 0 2em;
			}
			
			#flecha
			{
				z-index: 20;
				position: absolute;
				right: 0.5em;
				top: 50%;
				opacity: 0.5;
				transition: 0.7s;
			}
			
			#flecha:hover
			{
				opacity: 1.6;
			}
			
			#areaFlecha
			{
				min-height: 100%;
				width: 4em;
				top: 0;
				right: 0;
				opacity: 0.6;
				position: absolute;
				background-color: #d4d4d4;
			}
		</style>
		<script>
			function cambiaTodo()
			{
				if(document.getElementById('checkbox').checked)
				{
					document.getElementById('especial').style.color = "black";
					document.getElementById('body').style.background = "black";
					document.getElementById('nombreCompleto').style.marginRight = "4em";
					document.getElementById('nombreCompleto').style.opacity = "0";
					document.getElementById('curva').style.opacity = "0";
					document.getElementById('curva').style.transition = "4s";
					document.getElementById('luces').style.opacity = "0";
					document.getElementById('luces').style.transition = "3s";
					document.getElementById('luminaria').style.opacity = "0.5";
					document.getElementById('switch').style.opacity = "0.5";					
				}
				else
				{					
					document.getElementById('body').style.background = "white";
					document.getElementById('especial').style.color = "#db6e2c";
					document.getElementById('nombreCompleto').style.marginRight = "0";
					document.getElementById('nombreCompleto').style.opacity = "1";
					document.getElementById('curva').style.opacity = "1";
					document.getElementById('curva').style.transition = "0.7s";
					document.getElementById('luces').style.opacity = "1";
					document.getElementById('luces').style.transition = "0.7s";
					document.getElementById('luminaria').style.opacity = "1";
					document.getElementById('switch').style.opacity = "1";
				}
			}
			
			function primerCambio()
			{
				document.getElementById('body').style.background = "white";
				document.getElementById('especial').style.color = "#db6e2c";
				document.getElementById('nombreCompleto').style.marginRight = "0";
				document.getElementById('nombreCompleto').style.opacity = "1";
				document.getElementById('curva').style.opacity = "1";
				document.getElementById('curva').style.transition = "0.7s";
				document.getElementById('luces').style.opacity = "1";
				document.getElementById('luces').style.transition = "0.7s";
				document.getElementById('luminaria').style.opacity = "1";
				document.getElementById('switch').style.opacity = "1";
			}
		</script>
	
	</head>
    <body id="body" onload="primerCambio()">
		<div id="movimientoLogo">
			<div id="curva">
				<img alt="Curva del logo de BLM" src="curva.png" />				
			</div>
			<h1 id="especial">BLM</h1>
			<h3 id="nombreCompleto">Best Light M&eacute;xico</h3>
		</div>
		<div id="areaFlecha">
			<a href="iluminacion/index.php">
				<img alt="Botón para ir a iluminacion/index.php" id="flecha" src="flecha.png" />
			</a>
		</div>
		<div id="luminaria1">
			<img alt="Imágen de luminaria tipo 1" id="luminaria" src="Luminaria1.png" />
			<img alt="Efecto de luz para luminaria" id="luces" src="brillito.png" />
		</div>
		<div class="switch demo1">
			<input id="checkbox" type="checkbox" onchange="cambiaTodo()">
			<label></label>
		</div>		
	</body>
</html>
<?php
	function fechaHoy()
	{		
		/*Día*/
		if(date('l') == "Monday")
		{
			$dia = "Lunes";
		}
		
		if(date('l') == "Tuesday")
		{
			$dia = "Martes";
		}
		
		if(date('l') == "Wednesday")
		{
			$dia = "Miércoles";
		}
		
		if(date('l') == "Thursday")
		{
			$dia = "Jueves";
		}
		
		if(date('l') == "Friday")
		{
			$dia = "Viernes";
		}
		
		if(date('l') == "Saturday")
		{
			$dia = "Sábado";
		}
		
		if(date('l') == "Sunday")
		{
			$dia = "Domingo";
		}
		/**/
		
		/*Mes*/
		
		if(date('F') == "January")
		{
			$mes = "Enero";
		}
		
		if(date('F') == "February")
		{
			$mes = "Febrero";
		}
		
		if(date('F') == "March")
		{
			$mes = "Marzo";
		}
		
		if(date('F') == "April")
		{
			$mes = "Abril";
		}
		
		if(date('F') == "May")
		{
			$mes = "Mayo";
		}
		
		if(date('F') == "June")
		{
			$mes = "Junio";
		}
		
		if(date('F') == "July")
		{
			$mes = "Julio";
		}
		
		if(date('F') == "August")
		{
			$mes = "Agosto";
		}
		
		if(date('F') == "September")
		{
			$mes = "Septiembre";
		}
		
		if(date('F') == "October")
		{
			$mes = "Octubre";
		}
		
		if(date('F') == "November")
		{
			$mes = "Noviembre";
		}
		
		if(date('F') == "December")
		{
			$mes = "Diciembre";
		}
			
		$diaNumero = date('d');
		$anio = date('Y');
		$fecha = $dia." ".$diaNumero." de ".$mes." del ".$anio;
		
		return $fecha;
	}
?>
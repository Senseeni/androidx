<?php
	include_once('../entidad/Profesion.php');
	if(isset($_POST['metodo']) && $_POST['metodo'] == "grabar") // BOTÓN PRESIONADO
	{
		if(!$_POST['txtNombre'])
			echo "No especifico nombre";
		else
		{
			$profesion = new Profesion();
			$profesion->setId($_POST['txtId']);
			$profesion->setNombre($_POST['txtNombre']);
			$profesion->setActivo(isset($_POST['chkActivo'])?1:0);
			$res = $profesion->grabar();
			if($res == 1)
				echo 'Guardado con éxito';
			else
				echo 'Error en la ejecución de la solicitud';
		}		
	}
	else if(isset($_POST['metodo']) && $_POST['metodo'] == "listar")  // BOTÓN PRESIONADO
	{
		$profesion = new Profesion();
		$profesion->setNombre($_POST['txtNombre']);
		echo $profesion->listar();
	}
?>
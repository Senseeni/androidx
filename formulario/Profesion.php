<?php
	include_once('../entidad/Profesion.php');
	/*
	if(isset($_POST['btnGrabar']) && $_POST['btnGrabar']) // BOTÓN PRESIONADO
	{
		if(!$_POST['txtNombre'])
			echo "No especifico nombre";
		else
		{
			$profesion = new Profesion();
			$profesion->setId($_POST['txtId']);
			$profesion->setNombre($_POST['txtNombre']);
			$profesion->setActivo(isset($_POST['chkActivo'])?1:0);
			$profesion->grabar();
		}		
	}
	else if(isset($_POST['btnListar']) && $_POST['btnListar']) // BOTÓN PRESIONADO
	{
		$profesion = new Profesion();
		$profesion->setNombre($_POST['txtNombre']);
		$tabla = $profesion->listar();
	}*/
	$js = "Profesion.js"; // es el archivo js para esta página
	include_once('../HTML/Head.php');	
?>
	<form action=Profesion.php method=post>
		<h2>Profesión</h2>
		<div class="row">
			<div class="col-12">
				Nombre
			</div>
			<div class="col-12">
				<input type=hidden name=txtId class="txtId" value=0> 
				<input type=text name=txtNombre class="txtNombre form-control" 
						size=20 maxlength=50
						placeholder="Ingrese nombre de la locación"
						title="La locación es el lugar donde vota la persona">
			</div>
			<div class="col-12">
				Activo
			</div>
			<div class="col-12">
				<input type=checkbox name=chkActivo class="chkActivo" value=1>
			</div>			
		</div>
		<div class="row">
			<div class="col-12">
				<input type=button name=btnGrabar  class="btnGrabar btn btn-outline-danger float-right" value=Grabar>
				<input type=button name=btnListar  class="btnListar btn btn-outline-success float-right" value=Listar>
				<input type=button name=btnLimpiar  class="btnLimpiar btn btn-outline-dark float-right" value=Limpiar>
			</div>		
		</div>
	</form>
<?php
	include_once('../HTML/Footer.php');
?>
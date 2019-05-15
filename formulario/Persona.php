<?php
	include_once('../entidad/Persona.php');
	
	if(isset($_POST['btnGrabar']) && $_POST['btnGrabar']) // BOTÓN PRESIONADO
	{
		if(!$_POST['txtNombre'])
			echo "No especifico nombre";
		else
		{
			$persona = new Persona();
			$persona->setId($_POST['txtId']);
			$persona->setIdLocacion($_POST['cmbLocacion']);
			$persona->setRut($_POST['txtRut']);
			$persona->setDigito($_POST['txtDigito']);
			$persona->setNombre($_POST['txtNombre']);
			$persona->setApellido($_POST['txtApellido']);
			$persona->setEsCandidato(isset($_POST['chkEsCandidato']));
			if(isset($_FILES['txtFoto']) && $_FILES['txtFoto']['name'])
			{
				/*Se transfiere al servidor*/ 
				$ruta = '../imagenes/'.$_FILES['txtFoto']['name'];
				move_uploaded_file($_FILES['txtFoto']['tmp_name'],$ruta);
				$persona->setUrlFoto($ruta);
			}
			else
			{
			$persona->setUrlFoto('');
		}
		$persona->grabar();
		}		
	}
	else if(isset($_POST['btnListar']) && $_POST['btnListar']) // BOTÓN PRESIONADO
	{
		$persona = new Persona();
		$persona->setNombre($_POST['txtNombre']);
		$tabla = $persona->listar();
	}
	$js = "Locacion.js"; // es el archivo js para esta página
	include_once('../HTML/Head.php');	
?>
	<form action=Persona.php method=post enctype="multipart/form-data">
		<h2>Personas</h2>
		<div class="row">
			<div class="col-12">
				Locación
			</div>			
			<div class="col-12">
			<?php
				$persona= new persona();
				echo $persona -> cmbLocacion();
			?>
			</div>
			<div class="col-12">
				Rut
			</div>			
			<div class="col-2">
				<input type=text name=txtRut class="txtRut form-control" >
			</div>		
			<div class="col-1">
				<input type=text name=txtDigito class="txtDigito form-control" >
			</div>	
			<div class="col-9">
			</div>
			<div class="col-12">
				Nombre
			</div>
			<div class="col-12">
				<input type=hidden name=txtId class="txtId" value=0> 
				<input type=text name=txtNombre class="txtNombre form-control" 
						size=20 maxlength=50
						placeholder="Ingrese nombre"
						title="el nombre de la persona">
			</div>
			<div class="col-12">
				Apellido
			</div>
			<div class="col-12">
				<input type=text name=txtApellido class="txtApellido form-control" 
						size=20 maxlength=50
						placeholder="Ingrese apellido"
						title="Apellido de la persona">
			</div>
			<div class="col-12">
				Es candidato
			</div>
			<div class="col-12">
				<input type=checkbox name=chkEsCandidato class="chkEsCandidato" value=1>
			</div>	
			<div class="col-12">
				Foto
			</div>
			<div class="col-12">
				<input type=file name=txtFoto class="txtFoto form-control">
			</div>		
		</div>
		<div class="row">
			<div class="col-12">
				<input type=submit name=btnGrabar  class="btnGrabar btn btn-outline-danger float-right" value=Grabar>
				<input type=submit name=btnListar  class="btnListar btn btn-outline-success float-right" value=Listar>
				<input type=submit name=btnLimpiar  class="btnLimpiar btn btn-outline-dark float-right" value=Limpiar>
			</div>		
		</div>
	</form>
<?php
	include_once('../HTML/Footer.php');
?>
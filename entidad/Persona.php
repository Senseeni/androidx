<?php
include_once('../entidad/IOperaciones.php');
include_once('../entidad/Conectar.php');

class Persona implements IOperaciones
{
	private $id;
	private $idLocacion;
	private $rut;
	private $digito;
	private $nombre;
	private $apellido;
	private $esCandidato;
	private $urlFoto;
	
	public function __construct()
	{
		$this->limpiar();
	}
	
	function setId($id)
	{
		$this->id= $id;
	}

	function getId()
	{
		return $this->id;
	}

	function setIdLocacion($idLocacion)
	{
		$this->idLocacion= $idLocacion;
	}

	function getIdLocacion()
	{
		return $this->idLocacion;
	}

	function setRut($rut)
	{
		$this->rut= $rut;
	}

	function getRut()
	{
		return $this->rut;
	}

	function setDigito($digito)
	{
		$this->digito= $digito;
	}

	function getDigito()
	{
		return $this->digito;
	}

	function setNombre($nombre)
	{
		$this->nombre= $nombre;
	}

	function getNombre()
	{
		return $this->nombre;
	}

	function setApellido($apellido)
	{
		$this->apellido= $apellido;
	}

	function getApellido()
	{
		return $this->apellido;
	}

	function setEsCandidato($esCandidato)
	{
		$this->esCandidato= $esCandidato;
	}

	function getEsCandidato()
	{
		return $this->esCandidato;
	}

	function setUrlFoto($urlFoto)
	{
		$this->urlFoto= $urlFoto;
	}

	function getUrlFoto()
	{
		return $this->urlFoto;
	}


	function grabar()
	{
		if($this->id > 0)
			$sql = "UPDATE Persona SET ".
					" nombre 		= '$this->idLocacion',".
					" rut 			= '$this->rut',".
					" digito 		= '$this->digito',".
					" nombre 		= '$this->nombre',".
					" apellido 		= '$this->apellido',".
					" esCandidato	= '$this->esCandidato',".
					" urlFoto 		= '$this->urlFoto'".
					" WHERE idPersona = '$this->id'";
		else			
			$sql = "INSERT INTO Persona VALUES (NULL, '$this->idLocacion','$this->rut', '$this->digito','$this->nombre', '$this->apellido','$this->esCandidato', '$this->urlFoto')";
		
		$con = new Conectar();
		return $con->grabar($sql);
	}	
	function listar()
	{
		$sql = "SELECT * FROM Persona WHERE NOMBRE LIKE '%$this->nombre%'";
		$con = new Conectar();
		return $con->listar($sql);
	}
	function limpiar()
	{
		$this->id			= 0;
		$this->idLocacion	= 0;
		$this->rut			= 0;
		$this->digito		= '';
		$this->nombre		= '';
		$this->apellido		= '';
		$this->esCandidato	= 2;
		$this->urlFoto		= '';
	}
	
	function cmbLocacion()
	{
		$con = new Conectar();
		return $con->comboBox('cmbLocacion',
							'idLocacion',
							'Nombre',
							'Locacion',
							'activo = 1',
							'cmbLocacion');
		
	}
}
?>
<?php
include_once('../entidad/IOperaciones.php');
include_once('../entidad/Conectar.php');

class Locacion implements IOperaciones
{
	private $id;
	private $nombre;
	private $activo;
	
	public function __construct()
	{
		$this->limpiar();
	}
	function getId()
	{
		return $this->id;
	}
	function getNombre()
	{
		return $this->nombre;
	}
	function getActivo()
	{
		return $this->activo;
	}
	function setId($id)
	{
		$this->id=$id;
	}
	function setNombre($nombre)
	{
		$this->nombre=$nombre;
	}
	function setActivo($activo)
	{
		$this->activo=$activo;
	}	
	function grabar()
	{
		if($this->id > 0)
			$sql = "UPDATE Locacion SET ".
					" nombre = '$this->nombre',".
					" activo = '$this->activo'".
					" WHERE idLocacion = '$this->id'";
		else			
			$sql = "INSERT INTO Locacion VALUES (NULL, '$this->nombre','$this->activo')";
		
		$con = new Conectar();
		return $con->grabar($sql);
	}	
	function listar()
	{
		$sql = "SELECT * FROM LOCACION WHERE NOMBRE LIKE '%$this->nombre%'";
		$con = new Conectar();
		return $con->listar($sql);
	}
	function limpiar()
	{
		$this->id 		= 0;
		$this->nombre	='';
		$this->activo 	= 2;
	}
}
?>
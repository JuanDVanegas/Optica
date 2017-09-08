<?php
class Entidad
{
	private $id_entidad;
	private $nombre;
	private $address;
	private $codigo;
	private $detalles;
	
	public function __construct($Id_entidad,$Nombre,$Address,$Codigo,$Detalles)
	{
		$this->id_entidad = $Id_entidad;
		$this->nombre = $Nombre;
		$this->address = $Address;
		$this->codigo = $Codigo;
		$this->detalles = $Detalles;
	}
	
	public function cambiarEstadoEntidad($estado)
	{
		include('database/conexion.php');
		$sql = "UPDATE entidad SET estadoEntidad = '".$estado."' WHERE id_entidad = '$this->id_entidad'";
		if($db->query($sql) == true)
		{
			$_SESSION["next"] = "Entidad";
		}
		else;
	}
	
	public function editarEntidad($from)
	{
		include('database/conexion.php');
		$sql = "UPDATE entidad SET nombreEntidad='$this->nombre',address='$this->address',detalles='$this->detalles'  WHERE id_entidad='$this->id_entidad'";
		if($db->query($sql) == true)
		{
			$_SESSION["success"] = "Entidad actualizada";
			header($from);
		}
		else
		{
			$_SESSION["error"] = "Error al actualizar";
			header($from);
		}
	}
	
	public function agregarEntidad($from)
	{
		include('database/conexion.php');
		$sql = "INSERT INTO entidad(nombreEntidad,address,codigo,detalles,estadoEntidad) VALUES ('$this->nombre','$this->address','$this->codigo','$this->detalles',1)";
		if($db->query($sql) == true)
		{
			$_SESSION["success"] = "Se ha agregado una nueva entidad";
			header($from);
		}
		else
		{
			$_SESSION["error"] = "Error al agregar nueva entidad";
			header($from);
		}
	}
}
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
	
	public function eliminarEntidad()
	{
		include('database/conexion.php');
		$sql = "DELETE FROM entidad WHERE id_entidad = '$this->id_entidad'";
		if($db->query($sql) == true)
		{
			$_SESSION["success"] = "Entidad eliminada &radic;";
			header("Location: cuentaAdminEntidades.php");
		}
		else
		{
			$_SESSION["error"] = "Error al eliminar &Chi;";
			header("Location: cuentaAdminEntidades.php");
		}
	}
	
	public function editarEntidad()
	{
		include('database/conexion.php');
		$sql = "UPDATE entidad SET nombre='$this->nombre',address='$this->address',detalles='$this->detalles'  WHERE id_entidad='$this->id_entidad'";
		if($db->query($sql) == true)
		{
			$_SESSION["success"] = "Entidad actualizada &radic;";
			header("Location: cuentaAdminEntidades.php");
		}
		else
		{
			$_SESSION["error"] = "Error al actualizar";
			header("Location: cuentaAdminEntidades.php");
		}
	}
	
	public function agregarEntidad()
	{
		include('database/conexion.php');
		$sql = "INSERT INTO entidad(nombre,address,codigo,detalles) VALUES ('$this->nombre','$this->address','$this->codigo','$this->detalles')";
		if($db->query($sql) == true)
		{
			$_SESSION["success"] = "Se ha agregado una nueva entidad &radic;";
			header("Location: cuentaAdminEntidades.php");
		}
		else
		{
			$_SESSION["error"] = "Error al agregar nueva entidad";
			header("Location: cuentaAdminEntidades.php");
		}
	}
}
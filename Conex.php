<!-- Ejemplo de Conexion -->
<?php
function Conectarse()
{
	$link = mysqli_connect("localhost", "usrUsuario", "usrPassword","base_datos");
	
	if(mysqli_connect_errno())
	{
		echo "Error conectando a la base de datos";
		exit();
	}
	else
	{
		echo $link->host_info . "\n";
	}
	
	if(!$link->select_db("base_datos"))
	{
		echo "Error seleccionando la base de datos";
		exit();
	}
	else
	{
		/* devuelve el nombre de la base de datos actualmente seleccionadae */
		if ($result = $link->query("SELECT DATABASE()")) 
		{
			$row = $result->fetch_row();
			echo "La base de datos seleccionada es ".$row[0]; 
			$result->close();
		}
	}
	
	return $link;
}
?>
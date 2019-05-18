<?php	
	session_start();	
	
	if (isset($_SESSION["usuario"])) {
		$usuario = $_SESSION["usuario"];
		unset($_SESSION["usuario"]);
		
		require_once("../../modelo/GestionBD.php");
		require_once("../../modelo/gestionar/gestionar_usuarios.php"); 
		
        $conexion = crearConexionBD();
        if($usuario["solicitante"] == "Sí"){
            echo eliminar_solicitante($conexion,$usuario["dni"]);
        }else{
            eliminar_familiar($conexion,$usuario["dni"]);
        }	
		cerrarConexionBD($conexion);
		Header("Location: ../../vista/listas/lista_usuario.php"); 
	}
	else Header("Location: ../../vista/listas/lista_usuario.php"); 
?>
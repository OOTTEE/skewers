<?php 
include_once($GLOBALS['MODEL_PATH'].'Model.php');
class Comentario extends Model{
	public $usuario_id;
	public $pincho_id;
	public $comentario;
	
	//Inserta un comentario en la base de datos
	public function crearComentario(){

		$sentencia= $GLOBALS['DB']->prepare('INSERT INTO comentarios (usuario_id, pincho_id, comentario) VALUES (:usuario_id, :pincho_id, :comentario)');
		$sentencia->execute(array(':usuario_id' => $_SESSION['user']['usuario_id'], ':pincho_id' => $_REQUEST['codigo_pincho'], ':comentario' => $_REQUEST['comentario']));
			
		
	}
	
	// FIN
}

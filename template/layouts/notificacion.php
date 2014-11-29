<?php 
	/** Control de notificaciones del usaurio 
	*	
	*/
if(isset($_SESSION['notificaciones'])){
	foreach($_SESSION['notificaciones'] as $not){	
		echo '<div class="alert alert-'.$not['level'].'" role="alert">';
			echo $not['message'];
		echo "</div>";
	}
	unset($_SESSION['notificaciones']);
}
?>
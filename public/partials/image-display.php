<?php require_once( PLUGIN_PATH . 'includes/My-images-table.php'); 
	$obj= new My_images();
	$images= $obj->find_images_slider($arg);
	var_dump($images);
?>
<h3>Display slider . </h3>
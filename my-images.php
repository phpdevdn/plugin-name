<?php 
 	require_once('../../../wp-config.php');
  	require_once('includes/My-images-table.php');
	$my_images= new My_images();
	if(empty($_GET['act'])){
		die('display');
	}
	switch ($_GET['act']) {
		case 'add':
			$result=$my_images->add(array(
			'title'=>$_POST['img_title'],
			'description'=>$_POST['img_des'],
			'href'=>$_POST['img_href'],
			'src'=>$_POST['img_src'],
			'status'=>$_POST['img_status'],
			'slider_id'=>$_POST['img_slider_id'],
			));
			if($result){
				$result='save success';
			}
			header('location:'.$_SERVER['HTTP_REFERER'].'&save='.$result);
			break;
		case 'del':
			if(!empty($_GET['id'])){
				$admin->delete($_GET['id']);
				header('location:'.$_SERVER['HTTP_REFERER']);
			}
			break;
		default:
			# code...
			break;
	}
	
	
 ?>
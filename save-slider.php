<?php 
 	require_once('../../../wp-config.php');
  	require_once('includes/My-slider-table.php');
	$admin= new My_slider();
	if(empty($_GET['act'])){
		die('display');
	}
	switch ($_GET['act']) {
		case 'add':
			$result=$admin->add(array(
			'name'=>$_POST['sl_name'],
			'status'=>$_POST['sl_status']
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
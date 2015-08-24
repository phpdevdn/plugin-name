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
		case 'edit':
			if(!isset($_GET['id']) || empty($_GET['id'])){
				die('error');
			}
			$result=$my_images->edit($_GET['id'],array(
					'title'=>$_POST['img_title'],
					'description'=>$_POST['img_des'],
					'href'=>$_POST['img_href'],
					'src'=>$_POST['img_src'],
					'status'=>$_POST['img_status'],
					'slider_id'=>$_POST['img_slider_id']
				));
			if($result){
				header('location:'.admin_url('admin.php?page=edit_image&id='.$_POST['img_slider_id']));
			} else{
				header('location:'.$_SERVER['HTTP_REFERER'].'&error=true');
			}
			break;
		case 'del':
			if(!empty($_GET['id'])){
				$my_images->delete($_GET['id']);
				header('location:'.$_SERVER['HTTP_REFERER']);
			}
			break;
		default:
			# code...
			break;
	}
	
	
 ?>
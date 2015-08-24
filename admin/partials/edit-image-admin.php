<?php if(isset($_GET['result'])){
	echo "<p>".$_GET['result']."</p>";
} 
	if(!isset($_GET['id']) || empty($_GET['id'])){
		echo 'not found';
		return;
	}
?>
<?php require_once( PLUGIN_PATH . 'includes/My-slider-table.php');
		$sl_obj=new My_slider();
		$slider=$sl_obj->select($_GET['id'],'name');
		$slider=$slider[0];
 ?>
<h2>Add image to "<?php echo $slider['name'] ?>"</h2>
<?php require_once(PLUGIN_PATH.'includes/My-images-table.php') ;
		$images= new My_images();
		$img_list=$images->find_images_slider($_GET['id']);
		//var_dump($img_list);
?>
<div class="my-block">
	 <table class="wp-list-table widefat fixed striped">
	 	<caption><h3>List images.</h3></caption>
	 	<thead>
	 		<tr>
	 			<th>Id</th>
	 			<th>image</th>
	 			<th>Title</th>
	 			<th>description</th>
	 			<th>create</th>
	 			<th>status</th>
	 			<th>action</th>
	 		</tr>
	 	</thead>
	 	<tbody>
	 		<?php foreach($img_list as $result) : ?>
	 		<tr>
	 			<td><?php echo $result['id'] ?></td>
	 			<td><img src="<?php echo $result['src'] ?>" width="50px" height="50px"></td>
	 			<td><?php echo $result['title'] ?></td>
	 			<td><?php echo $result['description'] ?></td>
	 			<td><?php echo $result['date_create'] ?></td>
	 			<td><?php echo ($result['status'] == 1) ? 'active' : 'disable' ; ?></td>
	 			<td>
	 				<span><a href="<?php echo admin_url('admin.php?page=edit_image_slider&id='.$result['id']) ; ?>" title="edit">edit</a> </span>
	 				&nbsp;&nbsp;&nbsp;
	 				<span><a href="<?php echo PLUGIN_URL.'my-images.php?act=del&id='.$result['id'] ?>" title="delete">delete</a> </span>
	 			</td>
	 		</tr>
	 	<?php endforeach; ?>
	 	</tbody>
	 </table>
</div>
<div class="my-block">
	<form action="<?php echo PLUGIN_URL.'my-images.php?act=add' ?>" method="post" accept-charset="utf-8">
		<table class="form-table">
 			<thead>
				<tr>
					<th><h3>Add image.</h3></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><label for="img-title">title :</label></td>
					<td> 
						<input type="text" name="img_title" id="img-title" class="regular-text" value >
					</td>
				</tr>
				<tr>
					<td> <label for='img-des'>description</label> </td>
					<td>
						<textarea name="img_des" id="img-des" class="large-text code" rows=3 placeholder="text..."></textarea>
					</td>
				</tr>
				<tr>
					<td><label for="img-href">href :</label></td>
					<td> 
						<input type="text" name="img_href" id="img-href" class="regular-text" value >
					</td>
				</tr>
				<tr>
					<td><label for="img-src">src :</label></td>
					<td style="vertical-align:bottom"> 
						<div class="image-brow">
						<img src="" alt="image" width="150px" height="150px" class="image-dis">
						<button class="button button-primary image-butt ">Browser</button>
						<input type="hidden" name="img_src" id="img-src" class="regular-text image-in" value >
						</div>
					</td>
				</tr>

				<tr>
					<td> <label for="img-status">Status</label></td>
					<td><input type="checkbox" name="img_status" id="img-status" value="1" checked ></td>
				</tr>
				<tr>
					<input type="hidden" name="img_slider_id" value="<?php echo $_GET['id'] ?>">
				</tr>
			</tbody>
		</table>
		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
		</p>
	</form>
</div>
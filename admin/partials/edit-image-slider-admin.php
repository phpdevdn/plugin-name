<?php 
	if(!isset($_GET['id'])){
	die('no found image');
	}
	if(isset($_GET['error']) && $_GET['error']== 'true'){
		echo "edit fail";
	}
	if(isset($_GET['error']) && $_GET['error']== 'false'){
		echo "edit success";
	}
	require_once( PLUGIN_PATH . 'includes/My-images-table.php');
	$obj= new My_images();
	$image= $obj->find($_GET['id']);
	$image= $image[0];
	//var_dump($image);
?>
<h2>Edit image :</h2>
<div class="my-block">
	<form action="<?php echo PLUGIN_URL.'my-images.php?act=edit&id='.$image['id'] ?>" method="post" accept-charset="utf-8">
		<table class="form-table">
			<tbody>
				<tr>
					<td><label for="img-title">title :</label></td>
					<td> 
						<input type="text" name="img_title" id="img-title" class="regular-text" value="<?php echo $image['title'] ?>" >
					</td>
				</tr>
				<tr>
					<td> <label for='img-des'>description</label> </td>
					<td>
						<textarea name="img_des" id="img-des" class="large-text code" rows=3 placeholder="text..."><?php echo $image['description'] ?></textarea>
					</td>
				</tr>
				<tr>
					<td><label for="img-href">href :</label></td>
					<td> 
						<input type="text" name="img_href" id="img-href" class="regular-text" value="<?php echo $image['href'] ?>" >
					</td>
				</tr>
				<tr>
					<td><label for="img-src">src :</label></td>
					<td> 
  						<div class="image-brow">
						<img src="<?php echo $image['src'] ?>" alt="image" width="150px" height="150px" class="image-dis">
						<button class="button button-primary image-butt ">Browser</button>
						<input type="hidden" name="img_src" id="img-src" class="regular-text image-in" value="<?php echo $image['src'] ?>" >
						</div>
					</td>
				</tr>

				<tr>
					<td> <label for="img-status">Status</label></td>
					<td><input type="checkbox" name="img_status" id="img-status" value="1" <?php echo ($image['status']==1) ? 'checked' : '' ; ?> ></td>
				</tr>
				<tr>
					<th><label for="slider-id">Slider:</label></th>
					<th>
					<input type="number" name="img_slider_id" id="slider-id" value="<?php echo $image['slider_id'] ?>">
					</th>
				</tr>
			</tbody>
		</table>
		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
		</p>
	</form>
</div>

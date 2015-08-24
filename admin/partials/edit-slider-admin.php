<?php 
	if(!isset($_GET['id'])){
		die('no found slider');
	}
	if(isset($_GET['error'])){
		echo "<p class='notify'>can not edit</p>";
	}
		require_once( PLUGIN_PATH . 'includes/My-slider-table.php');
		$obj= new My_slider();
		$slider= $obj->find($_GET['id']);
		$slider=$slider[0];
		//var_dump($slider);
 ?>
<h2>Edit slider:</h2>
<div class="my-block">
	<form action="<?php echo PLUGIN_URL.'save-slider.php?act=edit&id='.$slider['id'] ; ?>" method="post" accept-charset="utf-8">
		<table class="form-table">
			<tbody>
 				<tr>
					<td><label for="sl-name">name :</label></td>
					<td> 
						<input type="text" name="sl_name" id="sl-name" class="regular-text" value="<?php echo $slider['name'] ; ?>" >
					</td>
				</tr>
				<tr>
					<td> <label for="sl-status">Status</label></td>
					<td><input type="checkbox" name="sl_status" id="sl-status" value="1" <?php echo ($slider['status']==1)? 'checked': '' ; ?> ></td>
				</tr>
			</tbody>
		</table>
		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
		</p>
	</form>
</div>
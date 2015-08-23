<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php if(isset($_GET['save'])){
		echo "<p class='notify'>". $_GET['save'] ."</p>";
		//echo PLUGIN_PATH;
} ?>
<?php require_once(PLUGIN_PATH.'includes/My-slider-table.php'); 
		$slider= new My_slider();
?>
<h2>Setting images in slider</h2>
<div class="my-block">
	<?php $res=$slider->find_all();
			//var_dump($res);
 	 ?>
	 <table class="wp-list-table widefat fixed striped">
	 	<caption><h3>List sliders.</h3></caption>
	 	<thead>
	 		<tr>
	 			<th>Id</th>
	 			<th>Name</th>
	 			<th>Status</th>
	 			<th>Action</th>
	 		</tr>
	 	</thead>
	 	<tbody>
	 		<?php foreach($res as $result) : ?>
	 		<tr>
	 			<td><?php echo $result['id'] ?></td>
	 			<td><?php echo $result['name'] ?></td>
	 			<td><?php echo ($result['status'] == 1) ? 'active' : 'disable' ; ?></td>
	 			<td>
	 				<span><a href="<?php echo admin_url('admin.php?page=edit_image&id='.$result['id'].'&name='.$result['name']); ?>" title="edit">edit</a> </span>
	 				&nbsp;&nbsp;&nbsp;
	 				<span><a href="<?php echo PLUGIN_URL.'save-slider.php?act=del&id='.$result['id'] ?>" title="delete">delete</a> </span>
	 			</td>
	 		</tr>
	 	<?php endforeach; ?>
	 	</tbody>
	 </table>
</div>
<div class="my-block">
	<form action="<?php echo PLUGIN_URL.'save-slider.php?act=add'; ?>" method="post" accept-charset="utf-8">
		<table class="form-table">
 			<thead>
				<tr>
					<th><h3>Add Slider.</h3></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><label for="sl-name">name :</label></td>
					<td> 
						<input type="text" name="sl_name" id="sl-name" class="regular-text" value >
					</td>
				</tr>
				<tr>
					<td> <label for="sl-status">Status</label></td>
					<td><input type="checkbox" name="sl_status" id="sl-status" value="1" checked ></td>
				</tr>
			</tbody>
		</table>
		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
		</p>
	</form>
</div>

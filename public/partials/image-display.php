<?php require_once( PLUGIN_PATH . 'includes/My-images-table.php'); 
	$obj= new My_images();
	$images= $obj->find_images_slider($arg);
	//var_dump($images);
?>
				<div id="car-slider">
                    <div class='car-images'>
                    	<?php foreach($images as $img) : ?>
                        <div class='car-img'>
                            <img src="<?php echo $img['src'] ?>">
                            <div class="car-content">
                                <a href="<?php echo $img['href'] ?>"><?php echo $img['title'] ?></a>
                             </div>
                        </div>  
                        <?php endforeach; ?>                     
                    </div>
                    <div class="car-direct">
                        <a href="javacript:void(0)" class="prev">&lt;</a>
                        <a href="#" class="next">&gt;</a>
                    </div>
                    <ol class="car-pos"></ol>
                </div>
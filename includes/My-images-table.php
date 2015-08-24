<?php 
class My_images{
	private $table_name;
	private $chaset_collate;
	private $ref_table;
	public function __construct(){
		global $wpdb;
		$this->chatset_collate=$wpdb->get_charset_collate();
		$this->table_name=$wpdb->prefix.'my_images';
		$this->ref_table=$wpdb->prefix.'my_slider';
	}
	public function create(){
		require_once(ABSPATH.'wp-admin/includes/upgrade.php');
		$sql_1="CREATE TABLE IF NOT EXISTS ".$this->table_name." (
			  id int(11) NOT NULL AUTO_INCREMENT,
			  title varchar(225) NOT NULL,
			  description text DEFAULT NULL,
			  src varchar(225) NOT NULL,
			  href varchar(225) DEFAULT NULL,
			  date_create datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			  status tinyint(1) NOT NULL DEFAULT '1',
			  slider_id int(11) NOT NULL,
			  PRIMARY KEY (id),
			  CONSTRAINT `foreign_slider` FOREIGN KEY (`slider_id`) REFERENCES ".$this->ref_table."(`id`) 
 			)".$this->chaset_collate.";";
		dbdelta($sql_1);
	}
	public function find_images_slider($arg){
		global $wpdb;
		return $wpdb->get_results(
			"SELECT * 
			FROM  ".$this->table_name." 
			WHERE  `slider_id` = $arg ",
			'ARRAY_A'
			);
	}
	public function add($args=array()){
		global $wpdb;
		return $wpdb->insert(
			$this->table_name,
			$args
			);
	}
	public function find($id){
		global $wpdb;
		return $wpdb->get_results(
				"SELECT *
				FROM ".$this->table_name."
				WHERE id= $id ",
				'ARRAY_A'
			);
	}
	public function edit($id,$args){
		global $wpdb;
		return $wpdb->update(
			$this->table_name,
			$args,
			array('id'=>$id)
			);

	}
	public function delete($id){
		global $wpdb;
		$wpdb->delete(
			$this->table_name,
			array('id'=>$id)
			);
	}
}
 ?>
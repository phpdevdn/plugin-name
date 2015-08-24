<?php 
class My_slider{
	private $table_name;
	private $chaset_collate;
	public function __construct(){
		global $wpdb;
		$this->chatset_collate=$wpdb->get_charset_collate();
		$this->table_name=$wpdb->prefix.'my_slider';
	}
	public function create(){
		require_once(ABSPATH.'wp-admin/includes/upgrade.php');
		$sql_2="CREATE TABLE IF NOT EXISTS ".$this->table_name." (
				  id int(11) NOT NULL AUTO_INCREMENT,
				  name varchar(225) NOT NULL,
				  status tinyint(1) NOT NULL DEFAULT '1',
				  PRIMARY KEY (id)
				)".$this->chaset_collate.";";
		dbdelta($sql_2);
	}
	public function add($args=array()){
		global $wpdb;
		return $wpdb->insert(
			$this->table_name,
			$args
			);
	}
	public function find_all(){
		global $wpdb;
		return $wpdb->get_results(
			"SELECT * 
			FROM  `wp_my_slider`",
			'ARRAY_A'
			);
	}
	public function delete($id){
		global $wpdb;
		return $wpdb->delete(
			$this->table_name,
			array('id'=>$id)
			);
	}
	public function find($id){
		global $wpdb;
		return $wpdb->get_results(
				"SELECT * 
				FROM  ".$this->table_name."
				WHERE id= $id
				",
				'ARRAY_A'
			);
	}
	public function edit($id,$args){
		global $wpdb;
		return $wpdb->update(
				$this->table_name,
				$args,
				array('id'=> $id )
			);
	}
	public function select($id,$fields){
		global $wpdb;
		return $wpdb->get_results(
			"SELECT $fields
			FROM ".$this->table_name."
			WHERE id= $id ",
			'ARRAY_A'
			);
	}
}
 ?>
<?php
class Simpletask_Mystream_Model_Mysql4_Mystream extends Mage_Core_Model_Mysql4_Abstract {
	public function _construct() {
		$this->_init ( 'mystream/mystream', 'mystream_id' );
	}
}
?>
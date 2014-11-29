<?php
class Simpletask_Flashgames_Model_Mysql4_Flashgames extends Mage_Core_Model_Mysql4_Abstract {
	public function _construct() {
		$this->_init ( 'flashgames/flashgames', 'flashgames_id' );
	}
}
?>
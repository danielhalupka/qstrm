<?php
class Simpletask_Flashgames_Model_Flashgames extends Mage_Core_Model_Abstract
{
	public function _construct()
	{
		parent::_construct();
		$this->_init('flashgames/flashgames');
	}
	
}
?>
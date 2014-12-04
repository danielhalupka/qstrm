<?php
class Simpletask_Mystream_Model_Mystream extends Mage_Core_Model_Abstract
{
	public function _construct()
	{
		parent::_construct();
		$this->_init('mystream/mystream');
	}
	
	public function getRemoveUrl(){
		return Mage::getBaseUrl().'mystream/add/remove?id='.$this->getId();
	}
	
}
?>
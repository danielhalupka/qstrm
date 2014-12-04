<?php
class Simpletask_Mystream_IndexController extends Mage_Core_Controller_Front_Action
{
	public function indexAction(){
		 $this->loadLayout();
            $this->renderLayout();
	}
	
	public function getstreamsAction(){
		header ( "Access-Control-Allow-Origin: *" );
		;

		$customer = Mage::getSingleton('customer/session');
		$customerId = $customer->getId();
		
		$mystreamModel = Mage::getModel ( 'mystream/mystream' )->getCollection()->addFieldToFilter('customer_id', $customerId);
		
		foreach($mystreamModel as $mystream){
		echo "<div onclick=\"thisGame('".$mystream->getStreamUrl()."')\" class=\"col-xs-12 col-sm-12 col-md-12 streamLinks\" style=\"\">".$mystream->getStreamTitle()."<div style=\"width:auto;float: right;color: red;  height: auto\" onclick=\"removeId('".$mystream->getRemoveUrl()."')\">X</div></div>";
		 }
	}
}
?>
<?php
class Simpletask_Mystream_AddController extends Mage_Core_Controller_Front_Action {
	public function indexAction() {
		header ( 'Content-type: text/javascript' );
		echo "Not available right now!";
	}
	public function addedAction() {
		echo "Product added to mystream";
	}
	
	public function allAction(){
		$mystreamModel = Mage::getModel ( 'mystream/mystream' );
		foreach($mystreamModel->getCollection() as $cat){
			echo $cat->getStreamTitle();
		}
		
	}
	
	public function removeAction(){
		$streamId = $this->getRequest ()->getParam ( 'id' );
		$mystreamModel = Mage::getModel ( 'mystream/mystream' );
		foreach($mystreamModel->getCollection() as $cat){
			if($cat->getId()==$streamId){
				$cat->delete();
			}
		}
	
	}
	public function listAction() {
		header ( "Access-Control-Allow-Origin: *" );
		$streamUrl = $this->getRequest ()->getParam ( 'link' );
		$streamTitle = $this->getRequest ()->getParam ( 'title' );
		$customer = Mage::getSingleton('customer/session');
		$customerId = $customer->getId();
		if ($streamUrl) {
			try {
				$mystreamModel = Mage::getModel ( 'mystream/mystream' );
				
				$mystreamModel->setStreamTitle ( $streamTitle )
				->setStreamUrl ( $streamUrl )
				->setCustomerId($customerId)
				->setStatus ( 1 )
				->save ();
				echo "tadaa";
				return;
			} catch ( Exception $e ) {
				echo $e;
				return;
			}
		}
	}
}
?>
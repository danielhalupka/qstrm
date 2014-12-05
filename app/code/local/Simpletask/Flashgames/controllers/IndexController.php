<?php
class Simpletask_Flashgames_IndexController extends Mage_Core_Controller_Front_Action
{
	public function indexAction(){
		 $this->loadLayout();
            $this->renderLayout();
	}
	
	public function helpAction(){
		$this->loadLayout();
		$this->renderLayout();
	}
	
	
	public function itemAction(){
		$this->loadLayout();
		$this->renderLayout();
	}
	
	
	public function countflaAction(){
		ini_set('max_execution_time', 600);
		$flashes = Mage::getModel('flashgames/flashgames')->getCollection();
		$input = array();
		
		foreach($flashes as $fla){
			array_push($input,$fla->getSwfUrl());
		}
		
		$result = array_unique($input);
		
		if($this->getRequest()->getParam('index')){
			$index=0;
			foreach ($result as $key => $flash_link){
				if($index==$this->getRequest()->getParam('index')){
				echo '<object width="100%" height="100%" data="'.$flash_link.'"></object>';
			break;
			}
				$index++;
			}
		}	else{	
			$index=0;
		foreach ($result as $key => $flash_link){
			echo '<li><a href="http://www.magma.com/index.php/flashgames/index/countfla?index='.$index.'">'.$flash_link.'</a></li>';
			$index++;
		}
		echo(count($result));
		}
	}
	
	public function deleteproloAction(){
		$itemCollection = Mage::getModel('flashgames/flashgames')->getCollection();
		foreach($itemCollection as $item) {
			if (strpos($item->getSwfUrl(), '.swf') === false){
			echo $item->getId();
				$item->delete();
		}
		}
	}
	
	public function deleteprolorelativeAction(){
		$itemCollection = Mage::getModel('flashgames/flashgames')->getCollection();
		foreach($itemCollection as $item) {
			if (strpos($item->getSwfUrl(), 'http:') === false){
				echo $item->getId();
				$item->delete();
			}
		}
	}
	
	public function clearcolAction(){
		$itemCollection = Mage::getModel('flashgames/flashgames')->getCollection();
		foreach($itemCollection as $item) {
			$item->delete();
		}
	}
	
	
	public function getuniqueAction(){
		ini_set('max_execution_time', 600);
		$flashes = Mage::getModel('flashgames/flashgames')->getCollection();
		$input = array();
		
		foreach($flashes as $fla){
			array_push($input,$fla->getSwfUrl());
		}

		$result = array_unique($input);
		
		$itemCollection = Mage::getModel('flashgames/flashgames')->getCollection();
		foreach($itemCollection as $item) {
			$item->delete();
		}
		
		foreach ($result as $in){
		echo $in;	
		$flashgamesTitle = $in;
		$customer = Mage::getSingleton('customer/session');
		$customerId = $customer->getId();
		if($flashgamesTitle){
			try {
				$flashgamesModel = Mage::getModel('flashgames/flashgames');
				 
				$flashgamesModel->setGameTitle("")
				->setSwfUrl($in)
				->setStatus(1)
				->save();
		
		
				return;
			} catch (Exception $e) {
				echo $e;
				return;
			}
		}
		}
		
		
		//print_r($result);
		echo count($result);
	}
	
	
	public function removelistAction(){
				$flashgamesId = $this->getRequest()->getParam('child_id');
                $flashgamesModel = Mage::getModel('flashgames/flashgames')->load($flashgamesId);
                $flashgamesModel->delete();
                
                $this->_redirect('*/*/');
                return;
	}

}
?>
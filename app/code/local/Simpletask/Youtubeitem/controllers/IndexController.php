<?php
class Simpletask_Youtubeitem_IndexController extends Mage_Core_Controller_Front_Action
{
	public function indexAction(){
		 $this->loadLayout();
            $this->renderLayout();
	}
	
	public function itemAction(){
		$this->loadLayout();
		$this->renderLayout();
	}
	
	public function cistiAction(){
		$itemCollection = Mage::getModel('youtubeitem/youtubeitem')->getCollection();
		foreach($itemCollection as $item) {
		
		}
	}
	
	public function countflaAction(){
		ini_set('max_execution_time', 600);
		$flashes = Mage::getModel('youtubeitem/youtubeitem')->getCollection();
		$input = array();
		
		foreach($flashes as $fla){
			array_push($input,$fla->getYoutubeUrl());
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
			echo '<li><a href="http://www.magma.com/index.php/youtubeitem/index/countfla?index='.$index.'">'.$flash_link.'</a></li>';
			$index++;
		}
		echo(count($result));
		}
	}
	
	public function deleteproloAction(){
		$itemCollection = Mage::getModel('youtubeitem/youtubeitem')->getCollection();
		foreach($itemCollection as $item) {
			if (strpos($item->getYoutubeUrl(), 'watch') === false){
			echo $item->getId();
				$item->delete();
		}
		}
	}
	
	
	
	
	public function getuniqueAction(){
		ini_set('max_execution_time', 600);
		$flashes = Mage::getModel('youtubeitem/youtubeitem')->getCollection();
		$input = array();
		
		foreach($flashes as $fla){
			array_push($input,$fla->getYoutubeUrl());
		}

		$result = array_unique($input);
		
		$itemCollection = Mage::getModel('youtubeitem/youtubeitem')->getCollection();
		foreach($itemCollection as $item) {
			$item->delete();
		}
		
		foreach ($result as $in){
		echo $in;	
		$youtubeitemTitle = $in;
		$customer = Mage::getSingleton('customer/session');
		$customerId = $customer->getId();
		if($youtubeitemTitle){
			try {
				$youtubeitemModel = Mage::getModel('youtubeitem/youtubeitem');
				 
				$youtubeitemModel->setVideoTitle("")
				->getYoutubeUrl($in)
				->getCategoryvidId()
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
				$youtubeitemId = $this->getRequest()->getParam('child_id');
                $youtubeitemModel = Mage::getModel('youtubeitem/youtubeitem')->load($youtubeitemId);
                $youtubeitemModel->delete();
                
                $this->_redirect('*/*/');
                return;
	}

}
?>
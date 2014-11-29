<?php
class Simpletask_Flashgames_MyprofileController extends Mage_Core_Controller_Front_Action {
	public function indexAction() {
		header ( 'Content-type: text/javascript' );
		echo "Not available right now!";
	}
	public function addedAction() {
		echo "Product added to flashgames";
	}
	public function listAction() {
		header ( "Access-Control-Allow-Origin: *" );
		$gameUrl = $this->getRequest ()->getParam ( 'swf' );
		$gameTitle = $this->getRequest ()->getParam ( 'title' );
		
		if ($gameTitle) {
			try {
				$flashgamesModel = Mage::getModel ( 'flashgames/flashgames' );
				
				$flashgamesModel->setGameTitle ( $gameTitle )
				->setSwfUrl ( $gameUrl )
				->setStatus ( 1 )
				->save ();
				return;
			} catch ( Exception $e ) {
				echo $e;
				return;
			}
		}
	}
}
?>
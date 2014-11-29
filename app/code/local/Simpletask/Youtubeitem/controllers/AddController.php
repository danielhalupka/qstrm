<?php
class Simpletask_Youtubeitem_AddController extends Mage_Core_Controller_Front_Action {
	public function indexAction() {
		header ( 'Content-type: text/javascript' );
		echo "Not available right now!";
	}
	public function addedAction() {
		echo "Product added to youtubeitem";
	}
	public function listAction() {
		header ( "Access-Control-Allow-Origin: *" );
		$gameUrl = $this->getRequest ()->getParam ( 'link' );
		$gameTitle = $this->getRequest ()->getParam ( 'title' );
		$videoId = $this->getRequest()->getParam('cat_id');
		if ($gameUrl) {
			try {
				$youtubeitemModel = Mage::getModel ( 'youtubeitem/youtubeitem' );
				
				$youtubeitemModel->setVideoTitle ( $gameTitle )
				->setYoutubeUrl ( $gameUrl )
				->setCategoryvidId($videoId)
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
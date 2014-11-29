<?php
class Simpletask_Flashgames_RandomController extends Mage_Core_Controller_Front_Action
{
	public function indexAction(){
		
		header("Content-type:text/javascript");
		 $flashes = Mage::getModel('flashgames/flashgames')->getCollection();
		 ini_set('max_execution_time', 600);
		 $input = array();
		 
		 foreach($flashes as $fla){
		 	array_push($input,$fla->getSwfUrl());
		 }
		 
		 $result = array_unique($input);
			$cislo = count($result);
		
			$min=1;
			$max=$cislo;
$randa = rand($min,$max);
$index=0;
foreach ($result as $key => $flash_link){
	if($index==$randa){
		echo $flash_link;
		break;
	}
	$index++;
	}
	
	
}
}
?>
<?php
class Simpletask_Youtubeitem_Block_Adminhtml_Youtubeitem_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form {
	protected function _prepareForm() {
		$form = new Varien_Data_Form ();
		$this->setForm ( $form );
		$fieldset = $form->addFieldset ( 'youtubeitem_form', array (
				'legend' => Mage::helper ( 'youtubeitem' )->__ ( 'Item information' ) 
		) );
		
		$fieldset->addField ( 'youtube_url', 'text', array (
				'label' => Mage::helper ( 'youtubeitem' )->__ ( 'Youtube Link' ),
				'class' => 'required-entry',
				'required' => true,
				'name' => 'youtube_url' 
		) );
		
		$fieldset->addField ( 'video_title', 'text', array (
				'label' => Mage::helper ( 'youtubeitem' )->__ ( 'Video Title' ),
				'class' => 'required-entry',
				'required' => true,
				'name' => 'video_title'
		) );
		
		$fieldset->addField ( 'description', 'text', array (
				'label' => Mage::helper ( 'youtubeitem' )->__ ( 'Description' ),
				'class' => 'required-entry',
				'required' => true,
				'name' => 'description'
		) );
		
		$fieldset->addField ( 'categoryvid_id', 'text', array (
				'label' => Mage::helper ( 'youtubeitem' )->__ ( 'Video Category' ),
				'class' => 'required-entry',
				'required' => true,
				'name' => 'instructions'
		) );
		
		
		$fieldset->addField ( 'status', 'select', array (
				'label' => Mage::helper ( 'youtubeitem' )->__ ( 'Status' ),
				'name' => 'status',
				'values' => array (
						array (
								'value' => 1,
								'label' => Mage::helper ( 'youtubeitem' )->__ ( 'Active' ) 
						),
						
						array (
								'value' => 0,
								'label' => Mage::helper ( 'youtubeitem' )->__ ( 'Inactive' ) 
						) 
				) 
		) );
		
		/*
		$fieldset->addField ( 'answer', 'select', array (
				'label' => Mage::helper ( 'youtubeitem' )->__ ( 'Status' ),
				'name' => 'answer',
				'values' => array (
						array (
								'value' => 1,
								'label' => Mage::helper ( 'youtubeitem' )->__ ( '#1' ) 
						),
						
						array (
								'value' => 2,
								'label' => Mage::helper ( 'youtubeitem' )->__ ( '#2' ) 
						),
						array (
								'value' => 3,
								'label' => Mage::helper ( 'youtubeitem' )->__ ( '#3' ) 
						) 
				) 
		) );*/
		if (Mage::getSingleton ( 'adminhtml/session' )->getYoutubeitemData ()) {
			$form->setValues ( Mage::getSingleton ( 'adminhtml/session' )->getYoutubeitemData () );
			Mage::getSingleton ( 'adminhtml/session' )->setYoutubeitemData ( null );
		} elseif (Mage::registry ( 'youtubeitem_data' )) {
			$form->setValues ( Mage::registry ( 'youtubeitem_data' )->getData () );
		}
		return parent::_prepareForm ();
	}
}
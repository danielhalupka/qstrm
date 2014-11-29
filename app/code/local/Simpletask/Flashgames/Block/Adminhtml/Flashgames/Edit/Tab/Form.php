<?php
class Simpletask_Flashgames_Block_Adminhtml_Flashgames_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form {
	protected function _prepareForm() {
		$form = new Varien_Data_Form ();
		$this->setForm ( $form );
		$fieldset = $form->addFieldset ( 'flashgames_form', array (
				'legend' => Mage::helper ( 'flashgames' )->__ ( 'Item information' ) 
		) );
		
		$fieldset->addField ( 'swf_url', 'text', array (
				'label' => Mage::helper ( 'flashgames' )->__ ( 'SWF Link' ),
				'class' => 'required-entry',
				'required' => true,
				'name' => 'swf_url' 
		) );
		
		$fieldset->addField ( 'game_title', 'text', array (
				'label' => Mage::helper ( 'flashgames' )->__ ( 'Game Title' ),
				'class' => 'required-entry',
				'required' => true,
				'name' => 'game_title'
		) );
		
		$fieldset->addField ( 'description', 'text', array (
				'label' => Mage::helper ( 'flashgames' )->__ ( 'Description' ),
				'class' => 'required-entry',
				'required' => true,
				'name' => 'description'
		) );
		
		$fieldset->addField ( 'instructions', 'text', array (
				'label' => Mage::helper ( 'flashgames' )->__ ( 'Game Instructions' ),
				'class' => 'required-entry',
				'required' => true,
				'name' => 'instructions'
		) );
		
		
		$fieldset->addField ( 'status', 'select', array (
				'label' => Mage::helper ( 'flashgames' )->__ ( 'Status' ),
				'name' => 'status',
				'values' => array (
						array (
								'value' => 1,
								'label' => Mage::helper ( 'flashgames' )->__ ( 'Active' ) 
						),
						
						array (
								'value' => 0,
								'label' => Mage::helper ( 'flashgames' )->__ ( 'Inactive' ) 
						) 
				) 
		) );
		
		/*
		$fieldset->addField ( 'answer', 'select', array (
				'label' => Mage::helper ( 'flashgames' )->__ ( 'Status' ),
				'name' => 'answer',
				'values' => array (
						array (
								'value' => 1,
								'label' => Mage::helper ( 'flashgames' )->__ ( '#1' ) 
						),
						
						array (
								'value' => 2,
								'label' => Mage::helper ( 'flashgames' )->__ ( '#2' ) 
						),
						array (
								'value' => 3,
								'label' => Mage::helper ( 'flashgames' )->__ ( '#3' ) 
						) 
				) 
		) );*/
		if (Mage::getSingleton ( 'adminhtml/session' )->getFlashgamesData ()) {
			$form->setValues ( Mage::getSingleton ( 'adminhtml/session' )->getFlashgamesData () );
			Mage::getSingleton ( 'adminhtml/session' )->setFlashgamesData ( null );
		} elseif (Mage::registry ( 'flashgames_data' )) {
			$form->setValues ( Mage::registry ( 'flashgames_data' )->getData () );
		}
		return parent::_prepareForm ();
	}
}
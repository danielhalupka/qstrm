    <?php
     
    class Simpletask_Flashgames_Block_Adminhtml_Flashgames_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
    {
        public function __construct()
        {
            parent::__construct();
                   
            $this->_objectId = 'id';
            $this->_blockGroup = 'flashgames';
            $this->_controller = 'adminhtml_flashgames';
     
            $this->_updateButton('save', 'label', Mage::helper('flashgames')->__('Save Item'));
            $this->_updateButton('delete', 'label', Mage::helper('flashgames')->__('Delete Item'));
        }
     
        public function getHeaderText()
        {
            if( Mage::registry('flashgames_data') && Mage::registry('flashgames_data')->getId() ) {
                return Mage::helper('flashgames')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('flashgames_data')->getId()));
            } else {
                return Mage::helper('flashgames')->__('Add Item');
            }
        }
    }
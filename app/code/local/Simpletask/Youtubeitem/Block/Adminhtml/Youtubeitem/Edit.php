    <?php
     
    class Simpletask_Youtubeitem_Block_Adminhtml_Youtubeitem_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
    {
        public function __construct()
        {
            parent::__construct();
                   
            $this->_objectId = 'id';
            $this->_blockGroup = 'youtubeitem';
            $this->_controller = 'adminhtml_youtubeitem';
     
            $this->_updateButton('save', 'label', Mage::helper('youtubeitem')->__('Save Item'));
            $this->_updateButton('delete', 'label', Mage::helper('youtubeitem')->__('Delete Item'));
        }
     
        public function getHeaderText()
        {
            if( Mage::registry('youtubeitem_data') && Mage::registry('youtubeitem_data')->getId() ) {
                return Mage::helper('youtubeitem')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('youtubeitem_data')->getId()));
            } else {
                return Mage::helper('youtubeitem')->__('Add Item');
            }
        }
    }
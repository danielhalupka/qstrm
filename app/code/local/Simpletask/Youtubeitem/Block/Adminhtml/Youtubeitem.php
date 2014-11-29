    <?php
     
    class Simpletask_Youtubeitem_Block_Adminhtml_Youtubeitem extends Mage_Adminhtml_Block_Widget_Grid_Container
    {
        public function __construct()
        {
            $this->_controller = 'adminhtml_youtubeitem';
            $this->_blockGroup = 'youtubeitem';
            $this->_headerText = Mage::helper('youtubeitem')->__('Youtubeitems Manager');
            $this->_addButtonLabel = Mage::helper('youtubeitem')->__('Add Youtubeitem product');
            parent::__construct();
        }
    }?>
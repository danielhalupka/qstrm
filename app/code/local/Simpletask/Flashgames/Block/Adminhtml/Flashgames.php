    <?php
     
    class Simpletask_Flashgames_Block_Adminhtml_Flashgames extends Mage_Adminhtml_Block_Widget_Grid_Container
    {
        public function __construct()
        {
            $this->_controller = 'adminhtml_flashgames';
            $this->_blockGroup = 'flashgames';
            $this->_headerText = Mage::helper('flashgames')->__('Flashgamess Manager');
            $this->_addButtonLabel = Mage::helper('flashgames')->__('Add Flashgames product');
            parent::__construct();
        }
    }?>
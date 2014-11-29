    <?php
     
    class Simpletask_Flashgames_Block_Adminhtml_Flashgames_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
    {
     
        public function __construct()
        {
            parent::__construct();
            $this->setId('flashgames_tabs');
            $this->setDestElementId('edit_form');
            $this->setTitle(Mage::helper('flashgames')->__('Flashgamess Managment'));
        }
     
        protected function _beforeToHtml()
        {
            $this->addTab('form_section', array(
                'label'     => Mage::helper('flashgames')->__('Flashgamess manager'),
                'title'     => Mage::helper('flashgames')->__('Flashgamess manager'),
                'content'   => $this->getLayout()->createBlock('flashgames/adminhtml_flashgames_edit_tab_form')->toHtml(),
            ));
           
            return parent::_beforeToHtml();
        }
    }
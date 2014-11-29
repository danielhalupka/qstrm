    <?php
     
    class Simpletask_Youtubeitem_Block_Adminhtml_Youtubeitem_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
    {
     
        public function __construct()
        {
            parent::__construct();
            $this->setId('youtubeitem_tabs');
            $this->setDestElementId('edit_form');
            $this->setTitle(Mage::helper('youtubeitem')->__('Youtubeitems Managment'));
        }
     
        protected function _beforeToHtml()
        {
            $this->addTab('form_section', array(
                'label'     => Mage::helper('youtubeitem')->__('Youtubeitems manager'),
                'title'     => Mage::helper('youtubeitem')->__('Youtubeitems manager'),
                'content'   => $this->getLayout()->createBlock('youtubeitem/adminhtml_youtubeitem_edit_tab_form')->toHtml(),
            ));
           
            return parent::_beforeToHtml();
        }
    }
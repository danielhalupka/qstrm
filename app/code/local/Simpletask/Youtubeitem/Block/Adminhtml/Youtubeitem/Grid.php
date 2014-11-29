    <?php
     
    class Simpletask_Youtubeitem_Block_Adminhtml_Youtubeitem_Grid extends Mage_Adminhtml_Block_Widget_Grid
    {
        public function __construct()
        {
            parent::__construct();
            $this->setId('youtubeitemGrid');
            // This is the primary key of the database
            $this->setDefaultSort('youtubeitem_id');
            $this->setDefaultDir('ASC');
            $this->setSaveParametersInSession(true);
            $this->setUseAjax(true);
        }
     
        protected function _prepareCollection()
        {
            $collection = Mage::getModel('youtubeitem/youtubeitem')->getCollection();
            $this->setCollection($collection);
            return parent::_prepareCollection();
        }
     
        protected function _prepareColumns()
        {
            $this->addColumn('youtubeitem_id', array(
                'header'    => Mage::helper('youtubeitem')->__('ID'),
                'align'     =>'right',
                'width'     => '50px',
                'index'     => 'youtubeitem_id',
            ));
     
            $this->addColumn('youtube_url', array(
                'header'    => Mage::helper('youtubeitem')->__('Youtube Link'),
                'align'     =>'right',
                'width'     => '50px',
                'index'     => 'youtube_url',
            ));
     
            $this->addColumn('video_title', array(
            		'header'    => Mage::helper('youtubeitem')->__('Video Title'),
            		'align'     =>'right',
            		'width'     => '50px',
            		'index'     => 'video_title',
            ));
            
            $this->addColumn('description', array(
            		'header'    => Mage::helper('youtubeitem')->__('Description'),
            		'align'     =>'right',
            		'width'     => '50px',
            		'index'     => 'description',
            ));

            
            $this->addColumn('categoryvid_id', array(
            		'header'    => Mage::helper('youtubeitem')->__('Category ID'),
            		'align'     =>'right',
            		'width'     => '50px',
            		'index'     => 'categoryvid_id',
            ));
            
            
     
            $this->addColumn('status', array(
     
                'header'    => Mage::helper('youtubeitem')->__('Status'),
                'align'     => 'left',
                'width'     => '80px',
                'index'     => 'status',
                'type'      => 'options',
                'options'   => array(
                    1 => 'Active',
                    0 => 'Inactive',
                ),
            ));
     
            return parent::_prepareColumns();
        }
     
        public function getRowUrl($row)
        {
            return $this->getUrl('*/*/edit', array('id' => $row->getId()));
        }
     
        public function getGridUrl()
        {
          return $this->getUrl('*/*/grid', array('_current'=>true));
        }
     
     
    }
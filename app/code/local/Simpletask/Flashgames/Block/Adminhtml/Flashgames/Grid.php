    <?php
     
    class Simpletask_Flashgames_Block_Adminhtml_Flashgames_Grid extends Mage_Adminhtml_Block_Widget_Grid
    {
        public function __construct()
        {
            parent::__construct();
            $this->setId('flashgamesGrid');
            // This is the primary key of the database
            $this->setDefaultSort('flashgames_id');
            $this->setDefaultDir('ASC');
            $this->setSaveParametersInSession(true);
            $this->setUseAjax(true);
        }
     
        protected function _prepareCollection()
        {
            $collection = Mage::getModel('flashgames/flashgames')->getCollection();
            $this->setCollection($collection);
            return parent::_prepareCollection();
        }
     
        protected function _prepareColumns()
        {
            $this->addColumn('flashgames_id', array(
                'header'    => Mage::helper('flashgames')->__('ID'),
                'align'     =>'right',
                'width'     => '50px',
                'index'     => 'flashgames_id',
            ));
     
            $this->addColumn('swf_url', array(
                'header'    => Mage::helper('flashgames')->__('SWF Link'),
                'align'     =>'right',
                'width'     => '50px',
                'index'     => 'swf_url',
            ));
     
            $this->addColumn('game_title', array(
            		'header'    => Mage::helper('flashgames')->__('Game Title'),
            		'align'     =>'right',
            		'width'     => '50px',
            		'index'     => 'game_title',
            ));
            
            $this->addColumn('description', array(
            		'header'    => Mage::helper('flashgames')->__('Description'),
            		'align'     =>'right',
            		'width'     => '50px',
            		'index'     => 'description',
            ));
            
            $this->addColumn('instructions', array(
            		'header'    => Mage::helper('flashgames')->__('Instructions'),
            		'align'     =>'right',
            		'width'     => '50px',
            		'index'     => 'instructions',
            ));
            
            
     
            $this->addColumn('status', array(
     
                'header'    => Mage::helper('flashgames')->__('Status'),
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
    <?php
     
    class Simpletask_Youtubeitem_Adminhtml_YoutubeitemController extends Mage_Adminhtml_Controller_Action
    {
     
        protected function _initAction()
        {
            $this->loadLayout()
                ->_setActiveMenu('youtubeitem/items')
                ->_addBreadcrumb(Mage::helper('adminhtml')->__('Lists Manager'), Mage::helper('adminhtml')->__('Items Manager'));
            return $this;
        }   
       
        public function indexAction() {
            $this->_initAction();       
            //$this->_addContent($this->getLayout()->createBlock('youtubeitem/adminhtml_youtubeitem'));
            $this->renderLayout();
        }
     
        public function editAction()
        {
            $youtubeitemId     = $this->getRequest()->getParam('id');
            $youtubeitemModel  = Mage::getModel('youtubeitem/youtubeitem')->load($youtubeitemId);
     
            if ($youtubeitemModel->getId() || $youtubeitemId == 0) {
     
                Mage::register('youtubeitem_data', $youtubeitemModel);
     
                $this->loadLayout();
                $this->_setActiveMenu('youtubeitem/items');
               
                $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item Manager'), Mage::helper('adminhtml')->__('Item Manager'));
                $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));
               
                $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
               
                $this->_addContent($this->getLayout()->createBlock('youtubeitem/adminhtml_youtubeitem_edit'))
                     ->_addLeft($this->getLayout()->createBlock('youtubeitem/adminhtml_youtubeitem_edit_tabs'));
                   
                $this->renderLayout();
            } else {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('youtubeitem')->__('Item does not exist'));
                $this->_redirect('*/*/');
            }
        }
       
        public function newAction()
        {
            $this->_forward('edit');
        }
       
        public function saveAction()
        {
            if ( $this->getRequest()->getPost() ) {
                try {
                    $postData = $this->getRequest()->getPost();
                    $youtubeitemModel = Mage::getModel('youtubeitem/youtubeitem');
                   
                    $youtubeitemModel->setId($this->getRequest()->getParam('id'))
                        ->getYoutubeUrl($postData['youtube_url'])
                        ->setVideoTitle($postData['video_title'])
                        ->setDescription($postData['description'])
                        ->setCategoryvidId($postData['categoryvid_id'])
                        ->setStatus($postData['status'])
                        ->save();
                   
                    Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully saved'));
                    Mage::getSingleton('adminhtml/session')->setYoutubeitemData(false);
     
                    $this->_redirect('*/*/');
                    return;
                } catch (Exception $e) {
                    Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                    Mage::getSingleton('adminhtml/session')->setYoutubeitemData($this->getRequest()->getPost());
                    $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                    return;
                }
            }
            $this->_redirect('*/*/');
        }
       
        public function deleteAction()
        {
            if( $this->getRequest()->getParam('id') > 0 ) {
                try {
                    $youtubeitemModel = Mage::getModel('youtubeitem/youtubeitem');
                   
                    $youtubeitemModel->setId($this->getRequest()->getParam('id'))
                        ->delete();
                       
                    Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
                    $this->_redirect('*/*/');
                } catch (Exception $e) {
                    Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                    $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                }
            }
            $this->_redirect('*/*/');
        }
        /**
         * Product grid for AJAX request.
         * Sort and filter result for example.
         */
        public function gridAction()
        {
            $this->loadLayout();
            $this->getResponse()->setBody(
                   $this->getLayout()->createBlock('youtubeitem/adminhtml_youtubeitem_grid')->toHtml()
            );
        }
    }
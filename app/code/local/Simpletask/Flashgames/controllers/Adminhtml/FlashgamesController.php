    <?php
     
    class Simpletask_Flashgames_Adminhtml_FlashgamesController extends Mage_Adminhtml_Controller_Action
    {
     
        protected function _initAction()
        {
            $this->loadLayout()
                ->_setActiveMenu('flashgames/items')
                ->_addBreadcrumb(Mage::helper('adminhtml')->__('Lists Manager'), Mage::helper('adminhtml')->__('Items Manager'));
            return $this;
        }   
       
        public function indexAction() {
            $this->_initAction();       
            //$this->_addContent($this->getLayout()->createBlock('flashgames/adminhtml_flashgames'));
            $this->renderLayout();
        }
     
        public function editAction()
        {
            $flashgamesId     = $this->getRequest()->getParam('id');
            $flashgamesModel  = Mage::getModel('flashgames/flashgames')->load($flashgamesId);
     
            if ($flashgamesModel->getId() || $flashgamesId == 0) {
     
                Mage::register('flashgames_data', $flashgamesModel);
     
                $this->loadLayout();
                $this->_setActiveMenu('flashgames/items');
               
                $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item Manager'), Mage::helper('adminhtml')->__('Item Manager'));
                $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));
               
                $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
               
                $this->_addContent($this->getLayout()->createBlock('flashgames/adminhtml_flashgames_edit'))
                     ->_addLeft($this->getLayout()->createBlock('flashgames/adminhtml_flashgames_edit_tabs'));
                   
                $this->renderLayout();
            } else {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('flashgames')->__('Item does not exist'));
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
                    $flashgamesModel = Mage::getModel('flashgames/flashgames');
                   
                    $flashgamesModel->setId($this->getRequest()->getParam('id'))
                        ->setSwfUrl($postData['swf_url'])
                        ->setGameTitle($postData['game_title'])
                        ->setDescription($postData['description'])
                        ->setInstructions($postData['instructions'])
                        ->setStatus($postData['status'])
                        ->save();
                   
                    Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully saved'));
                    Mage::getSingleton('adminhtml/session')->setFlashgamesData(false);
     
                    $this->_redirect('*/*/');
                    return;
                } catch (Exception $e) {
                    Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                    Mage::getSingleton('adminhtml/session')->setFlashgamesData($this->getRequest()->getPost());
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
                    $flashgamesModel = Mage::getModel('flashgames/flashgames');
                   
                    $flashgamesModel->setId($this->getRequest()->getParam('id'))
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
                   $this->getLayout()->createBlock('flashgames/adminhtml_flashgames_grid')->toHtml()
            );
        }
    }
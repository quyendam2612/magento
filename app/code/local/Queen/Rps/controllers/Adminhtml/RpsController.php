<?php

class Queen_Rps_Adminhtml_RpsController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction() {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function newAction() {
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('queen_rps/adminhtml_slider_edit'))
            ->_addLeft($this->getLayout()->createBlock('queen_rps/adminhtml_slider_edit_tabs'));
        $this->renderLayout();
    }

    public function editAction()
    {
        $id = $this->getRequest()->getParam('id', null);

        $model = Mage::getModel('queen_rps/slider');
        if ($id) {
            $model->load((int) $id);
            if ($model->getId()) {
                $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
                if ($data) {
                    $model->setData($data)->setId($id);
                }
            } else {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('queen_rps')->__('Slider does not exist'));
                $this->_redirect('*/*/');
            }
        }
        Mage::register('slider_data', $model);

        $this->_title($this->__('Responsive Product Slider'))->_title($this->__('Edit slider'));
        $this->loadLayout();
        $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
        $this->getLayout()->createBlock('queen_rps/adminhtml_slider_edit');
        $this->_addContent($this->getLayout()->createBlock('queen_rps/adminhtml_slider_edit'))
            ->_addLeft($this->getLayout()->createBlock('queen_rps/adminhtml_slider_edit_tabs'));
        $this->renderLayout();
    }

    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost())
        {
            $model = Mage::getModel('queen_rps/slider');
            $id = $this->getRequest()->getParam('id');
            if ($id) {
                $model->load($id);
            }
            $model->setData($data);

            Mage::getSingleton('adminhtml/session')->setFormData($data);
            try {
                if ($id) {
                    $model->setId($id);
                }
                $model->save();

                if (!$model->getId()) {
                    Mage::throwException(Mage::helper('queen_rps')->__('Error saving slider'));
                }

                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('queen_rps')->__('Slider was successfully saved.'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);

                // The following line decides if it is a "save" or "save and continue"
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId()));
                } else {
                    $this->_redirect('*/*/');
                }

            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                if ($model && $model->getId()) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId()));
                } else {
                    $this->_redirect('*/*/');
                }
            }

            return;
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('awesome')->__('No data found to save'));
        $this->_redirect('*/*/');
    }

    public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                $model = Mage::getModel('queen_rps/slider');
                $model->setId($id);
                $model->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('queen_rps')->__('The slider has been deleted'));
                $this->_redirect('*/*/');
                return;
            }
            catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Unable to find the slider to delete'));
        $this->_redirect('*/*/');
    }
}
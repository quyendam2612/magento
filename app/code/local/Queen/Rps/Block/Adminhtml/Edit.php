<?php

class Queen_Rps_Block_Adminhtml_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    protected function _prepareLayout()
    {
        if ($this->_blockGroup && $this->_controller && $this->_mode) {
            $this->setChild('form', $this->getLayout()->createBlock('queen_rps/adminhtml_edit_form'));
        }
        return parent::_prepareLayout();
    }

    public function __construct()
    {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'queen_rps';
        $this->_controller = 'adminhtml_rps';
        $this->_mode = 'edit';

        $this->_addButton('save_and_continue', array(
            'label' => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick' => 'saveAndContinueEdit()',
            'class' => 'save',
        ), -100);
        $this->_updateButton('save', 'label', Mage::helper('queen_rps')->__('Save Slider'));

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('form_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'edit_form');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'edit_form');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if (Mage::registry('slider_data') && Mage::registry('slider_data')->getId())
        {
            return Mage::helper('queen_rps')->__('Edit Slider "%s"', $this->htmlEscape(Mage::registry('slider_data')->getTitle()));
        } else {
            return Mage::helper('queen_rps')->__('New Slider');
        }
    }
}
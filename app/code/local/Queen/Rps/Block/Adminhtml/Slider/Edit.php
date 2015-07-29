<?php

class Queen_Rps_Block_Adminhtml_Slider_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {
    public function __construct() {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'queen_rps';
        $this->_controller = 'adminhtml_slider';
        $this->_mode = 'edit';
        $this->_updateButton('save', 'label', Mage::helper('queen_rps')->__('Save Slider'));
        $this->_updateButton('delete', 'label', Mage::helper('queen_rps')->__('Delete'));
        $this->_addButton('saveandcontinue', array(
            'label' => Mage::helper('queen_rps')->__('Save And Continue Edit'),
            'onclick' => 'saveAndContinueEdit()',
            'class' => 'save',
        ), -100);

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

    public function getHeaderText() {
        if (Mage::registry('slider_data') && Mage::registry('slider_data')->getId()) {
            return Mage::helper('queen_rps')->__('Edit Slider "%s"', $this->htmlEscape(Mage::registry('slider_data')->getTitle()));
        } else {
            return Mage::helper('queen_rps')->__('New Slider');
        }
    }
}
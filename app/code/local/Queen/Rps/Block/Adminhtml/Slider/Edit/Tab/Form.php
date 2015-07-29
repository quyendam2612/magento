<?php

class Queen_Rps_Block_Adminhtml_Slider_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form {
    protected function _prepareForm() {

        if (Mage::registry('slider_data')) {
            $data = Mage::registry('slider_data')->getData();
        } else {
            $data = array();
        }

        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('queen_rps_general', array('legend' => Mage::helper('queen_rps')->__('General')));

        $fieldset->addField('title', 'text', array(
            'label' => Mage::helper('queen_rps')->__('Slider Title'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'title',
        ));

        $fieldset->addField('code', 'textarea', array(
            'label' => Mage::helper('queen_rps')->__('Automatic generated code'),
            'class' => '',
            'readonly' => true,
            'required' => false,
            'name' => 'code',
        ));

        $form->setValues($data);

        return parent::_prepareForm();
    }
}
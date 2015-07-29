<?php

class Queen_Rps_Block_Adminhtml_Slider_Edit_Tab_Products extends Mage_Adminhtml_Block_Widget_Form {
    protected function _prepareForm() {

        if (Mage::registry('slider_data')) {
            $data = Mage::registry('slider_data')->getData();
        } else {
            $data = array();
        }

        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('queen_rps_general', array('legend' => Mage::helper('queen_rps')->__('Products')));

        $fieldset->addField('data_type', 'select', array(
            'label'     => Mage::helper('queen_rps')->__('Slider Data Type'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'data_type',
            'values'    => Mage::getModel('queen_rps/source_datatype')->toOptionArray()
        ));

        $fieldset->addField('category_id', 'select', array(
            'label'     => Mage::helper('queen_rps')->__('Category'),
            'readonly'  => false,
            'required'  => false,
            'name'      => 'category_id',
            'values'    => Mage::getModel('queen_rps/source_categories')->toOptionArray()
        ));

        $form->setValues($data);

        return parent::_prepareForm();
    }
}
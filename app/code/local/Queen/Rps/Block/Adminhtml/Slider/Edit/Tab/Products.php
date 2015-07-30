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

        $action = 'getProductChooser(\'' . Mage::getUrl(
                'adminhtml/promo_widget/chooser/attribute/sku/form/rule_conditions_fieldset',
                array('_secure' => Mage::app()->getStore()->isAdminUrlSecure())
            ) . '?isAjax=true\', [\'msj000\', \'msj001\']); return false;';
        $fieldset->addField('prod_skus', 'textarea', array(
            'label' => 'Product Sku(s)',
            'name' => 'prod_skus',
            'required' => false,
            'class' => 'rule_conditions_fieldset',
            'readonly' => true,
            'onclick' => $action,
        ));
        $fieldset->addFieldset('product_chooser', array('legend' => ('')));

        $form->setValues($data);

        return parent::_prepareForm();
    }
}
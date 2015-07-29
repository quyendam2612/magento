<?php

class Queen_Rps_Block_Adminhtml_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        if (Mage::getSingleton('adminhtml/session')->getSliderData())
        {
            $data = Mage::getSingleton('adminhtml/session')->getSliderData();
            Mage::getSingleton('adminhtml/session')->getSliderData(null);
        }
        elseif (Mage::registry('slider_data'))
        {
            $data = Mage::registry('slider_data')->getData();
        }
        else
        {
            $data = array();
        }

        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
            'method' => 'post',
            'enctype' => 'multipart/form-data',
        ));

        $form->setUseContainer(true);

        $this->setForm($form);

        $fieldset = $form->addFieldset('slider_form', array(
            'legend' =>Mage::helper('queen_rps')->__('Slider Information')
        ));

        $fieldset->addField('title', 'text', array(
            'label'     => Mage::helper('queen_rps')->__('Title'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'title',
            'note'     => Mage::helper('queen_rps')->__('The title of the slider.'),
        ));

        $fieldset->addField('code', 'text', array(
            'label'     => Mage::helper('queen_rps')->__('Code'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'code',
        ));

//        $fieldset->addField('other', 'text', array(
//            'label'     => Mage::helper('awesome')->__('Other'),
//            'class'     => 'required-entry',
//            'required'  => true,
//            'name'      => 'other',
//        ));

        $form->setValues($data);

        return parent::_prepareForm();
    }
}
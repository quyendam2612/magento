<?php

class Queen_Rps_Block_Adminhtml_Slider_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs {
    public function __construct() {
        parent::__construct();
        $this->setId('slider_tabs');
        $this->setDestElementId('edit_form'); // this should be same as the form id define above
        $this->setTitle(Mage::helper('queen_rps')->__('Slider Information'));
    }

    protected function _beforeToHtml() {
        $this->addTab('form_general', array(
            'label' => Mage::helper('queen_rps')->__('General'),
            'title' => Mage::helper('queen_rps')->__('General'),
            'content' => $this->getLayout()->createBlock('queen_rps/adminhtml_slider_edit_tab_form')->toHtml(),
        ));

        $this->addTab('form_products', array(
            'label' => Mage::helper('queen_rps')->__('Products'),
            'title' => Mage::helper('queen_rps')->__('Products'),
            'content' => $this->getLayout()->createBlock('queen_rps/adminhtml_slider_edit_tab_products')->toHtml(),
        ));

        return parent::_beforeToHtml();
    }
}
<?php

class Queen_Rps_Block_Adminhtml_Slider extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct() {
        $this->_controller = 'adminhtml_slider';
        $this->_blockGroup = 'queen_rps';
        $this->_headerText = Mage::helper('queen_rps')->__('Slider Manager');
        $this->_addButtonLabel = Mage::helper('queen_rps')->__('Add Slider');
        parent::__construct();
    }
}
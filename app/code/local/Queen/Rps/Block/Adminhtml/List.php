<?php

class Queen_Rps_Block_Adminhtml_List extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct() {
        $this->_blockGroup = 'queen_rps';
        $this->_controller = 'adminhtml_list';
        $this->_headerText = Mage::helper('queen_rps')->__('Responsive Product Slider - List');

        parent::__construct();
    }
}
<?php

class Queen_Rps_Block_Adminhtml_Slider_Renderer_Datatype extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract {
    public function render(Varien_Object $row)
    {
        $value =  $row->getData($this->getColumn()->getIndex());
        $optionArr = Mage::getModel('queen_rps/source_datatype')->toOptionArray();
        return $optionArr[$value]['label'];
    }
}
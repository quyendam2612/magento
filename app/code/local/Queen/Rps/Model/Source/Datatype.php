<?php

class Queen_Rps_Model_Source_Datatype extends Queen_Rps_Model_Source_Abstract {
    const CODE_CATEGORY = 1;
    const CODE_PRODUCT = 2;

    const LABEL_CATEGORY = 'Category';
    const LABEL_PRODUCT = 'Product';

    protected function _toOptionArray()
    {
        return array(
            array('value' => self::CODE_CATEGORY, 'label' => Mage::helper('adminhtml')->__(self::LABEL_CATEGORY)),
            array('value' => self::CODE_PRODUCT, 'label' => Mage::helper('adminhtml')->__(self::LABEL_PRODUCT)),
        );
    }

    public function toArray()
    {
        return $this->toShortOptionArray();
    }
}
<?php

class Queen_Rps_Model_Source_Categories extends Queen_Rps_Model_Source_Abstract
{
    protected function _toOptionArray()
    {
        $categories = Mage::getModel('catalog/category')->getCollection()
            ->addAttributeToSelect('name')
            ->addAttributeToSort('path', 'asc')
            ->addFieldToFilter('is_active', array('eq'=>'1'))
            ->load()
            ->toArray();;

        $tmp = array();
        foreach ($categories as $id => $cat) {
            if (isset($cat['name'])) {

                $name = $cat['name'];
                $prefix ='';
                for($i=1;$i<$cat['level'];$i++){
                    $prefix = $prefix."--";
                }
                $tmp[] = array(
                    'label' => $prefix." ".$name,
                    'value' => $id
                );
            }
        }
        return $tmp;
    }

    public function toArray()
    {
        return $this->toShortOptionArray();
    }
}
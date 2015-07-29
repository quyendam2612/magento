<?php

class Queen_Rps_Model_Resource_Slider_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct() {
        $this->_init('queen_rps/slider');
    }
}
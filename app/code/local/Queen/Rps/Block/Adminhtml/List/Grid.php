<?php

class Queen_Rps_Block_Adminhtml_List_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct() {
        parent::__construct();
        $this->setId('queen_rps_grid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection() {
        $collection = Mage::getResourceModel('queen_rps/slider_collection');

        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }

    protected function _prepareColumns() {
        $helper = Mage::helper('queen_rps');

        $this->addColumn('id', array(
            'header' => $helper->__('Slider #'),
            'index'  => 'id'
        ));

        $this->addColumn('title', array(
            'header' => $helper->__('Title'),
            'index'  => 'title'
        ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}
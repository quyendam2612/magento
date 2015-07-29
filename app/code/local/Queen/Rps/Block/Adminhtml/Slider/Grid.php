<?php

class Queen_Rps_Block_Adminhtml_Slider_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct() {
        parent::__construct();
        $this->setId('slider_grid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection() {
        $collection = Mage::getModel('queen_rps/slider')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns() {
        $this->addColumn('id', array(
            'header' => Mage::helper('queen_rps')->__('ID #'),
            'align' => 'right',
            'width' => '10px',
            'index' => 'id',
        ));

        $this->addColumn('title', array(
            'header' => Mage::helper('queen_rps')->__('Title'),
            'align' => 'left',
            'index' => 'title',
            'width' => '50px',
        ));


        $this->addColumn('data_type', array(
            'header' => Mage::helper('queen_rps')->__('Data Type'),
            'width' => '150px',
            'index' => 'data_type',
            'renderer' => 'Queen_Rps_Block_Adminhtml_Slider_Renderer_Datatype'
        ));

//        $this->addColumn('tag', array(
//            'header' => Mage::helper('news')->__('Tag'),
//            'width' => '150px',
//            'index' => 'tag',
//        ));
//
//
//        $this->addColumn('date', array(
//            'header' => Mage::helper('news')->__('Posted On'),
//            'width' => '150px',
//            'index' => 'date',
//        ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row) {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}
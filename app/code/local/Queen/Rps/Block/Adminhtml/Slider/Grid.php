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

    public function styleDate($value, $row, $column, $isExport)
    {
        $date = Mage::helper('core')->formatDate(date('Y-m-d H:i:s', $value), Mage_Core_Model_Locale::FORMAT_TYPE_MEDIUM, true);
        return $date;
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

        $this->addColumn('created', array(
            'header' => Mage::helper('queen_rps')->__('Created Date'),
            'width' => '150px',
            'index' => 'created',
            'type'  => 'datetime'
        ));

        $this->addColumn('updated', array(
            'header' => Mage::helper('queen_rps')->__('Updated Date'),
            'width' => '150px',
            'index' => 'updated',
//            'type'  => 'date',
            'frame_callback' => array( $this,'styleDate')
//            'format' => Mage::app()->getLocale()
//                ->getDateTimeFormat(Mage_Core_Model_Locale::FORMAT_TYPE_MEDIUM),
        ));
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
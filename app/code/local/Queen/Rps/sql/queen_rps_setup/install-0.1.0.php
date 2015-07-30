<?php
/**
 * Created by PhpStorm.
 * User: quyen
 * Date: 7/29/15
 * Time: 11:33 AM
 */ 
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('queen_rps/slider'))
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Id')
    ->addColumn('title', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable'  => false,
    ), 'Title')
    ->addColumn('code', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
    ), 'Code')
    ->addColumn('options', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
    ), 'Owl Options')
    ->addColumn('data_type', Varien_Db_Ddl_Table::TYPE_TINYINT, null, array(
        'nullable'  => false,
    ), 'Category or Products')
    ->addColumn('prod_skus', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
    ), 'Product Ids')
    ->addColumn('category_id', Varien_Db_Ddl_Table::TYPE_TINYINT, null, array(
        'nullable'  => false,
    ), 'Category Id')
    ->addColumn('created', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
    ), 'Created Date')
    ->addColumn('updated', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
    ), 'Last Updated');
$installer->getConnection()->createTable($table);

$installer->endSetup();
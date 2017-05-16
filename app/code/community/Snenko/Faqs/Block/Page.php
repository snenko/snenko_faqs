<?php

class Snenko_Faqs_Block_Page extends Mage_Core_Block_Template
{
    protected $_collection;

    public function _construct()
    {
        /** @var Snenko_Faqs_Model_Mysql4_Faqs_Collection $collection */
        $collection = Mage::getSingleton('faqs/faqs')->getCollection();
        $collection->addFieldToSelect('*');

        $this->_collection = $collection;
        parent::_construct();
    }

    public function getCollection()
    {
        return $this->_collection;
    }
}
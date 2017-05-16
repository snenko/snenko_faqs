<?php

class Snenko_Faqs_Block_Left extends Mage_Core_Block_Template
{
    protected $_collection;

    public function _construct()
    {
        $rows = $this->getRows();

        if(!$rows){$rows = 1;}
        /** @var Snenko_Faqs_Model_Mysql4_Faqs_Collection $collection */
        $collection = Mage::getSingleton('faqs/faqs')->getCollection();
        $collection->addFieldToSelect('*')
            ->getSelect()->limit($rows);

        $this->_collection = $collection;
        parent::_construct();
    }

    public function getCollection()
    {
        return $this->_collection;
    }
}
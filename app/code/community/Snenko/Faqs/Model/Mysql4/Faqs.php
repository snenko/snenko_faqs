<?php

class Snenko_Faqs_Model_Mysql4_Faqs extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("faqs/faqs", "faq_id");
    }
}
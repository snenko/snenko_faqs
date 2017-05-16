<?php


class Snenko_Faqs_Block_Adminhtml_Faqs extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    public function __construct()
    {

        $this->_controller = "adminhtml_faqs";
        $this->_blockGroup = "faqs";
        $this->_headerText = Mage::helper("faqs")->__("Faqs Manager");
        $this->_addButtonLabel = Mage::helper("faqs")->__("Add New Item");
        parent::__construct();

    }

}
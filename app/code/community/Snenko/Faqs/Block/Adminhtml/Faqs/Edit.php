<?php

class Snenko_Faqs_Block_Adminhtml_Faqs_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {

        parent::__construct();
        $this->_objectId = "faq_id";
        $this->_blockGroup = "faqs";
        $this->_controller = "adminhtml_faqs";
        $this->_updateButton("save", "label", Mage::helper("faqs")->__("Save Item"));
        $this->_updateButton("delete", "label", Mage::helper("faqs")->__("Delete Item"));

        $this->_addButton("saveandcontinue", array(
            "label" => Mage::helper("faqs")->__("Save And Continue Edit"),
            "onclick" => "saveAndContinueEdit()",
            "class" => "save",
        ), -100);


        $this->_formScripts[] = "

							function saveAndContinueEdit(){
								editForm.submit($('edit_form').action+'back/edit/');
							}
						";
    }

    public function getHeaderText()
    {
        if (Mage::registry("faqs_data") && Mage::registry("faqs_data")->getId()) {

            return Mage::helper("faqs")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("faqs_data")->getId()));

        } else {

            return Mage::helper("faqs")->__("Add Item");

        }
    }
}
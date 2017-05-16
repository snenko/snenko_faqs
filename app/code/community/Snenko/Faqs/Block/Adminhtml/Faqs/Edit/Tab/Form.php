<?php

class Snenko_Faqs_Block_Adminhtml_Faqs_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {

        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset("faqs_form", array("legend" => Mage::helper("faqs")->__("Item information")));


        $fieldset->addField("question", "text", array(
            "label" => Mage::helper("faqs")->__("Question"),
            "name" => "question",
        ));

        $fieldset->addField("answer", "textarea", array(
            "label" => Mage::helper("faqs")->__("Answer"),
            "name" => "answer",
        ));

        $fieldset->addField('is_active', 'select', array(
            'label' => Mage::helper('faqs')->__('Is Active'),
            'values' => Snenko_Faqs_Block_Adminhtml_Faqs_Grid::getValueArray2(),
            'name' => 'is_active',
        ));

        if (Mage::getSingleton("adminhtml/session")->getFaqsData()) {
            $form->setValues(Mage::getSingleton("adminhtml/session")->getFaqsData());
            Mage::getSingleton("adminhtml/session")->setFaqsData(null);
        } elseif (Mage::registry("faqs_data")) {
            $form->setValues(Mage::registry("faqs_data")->getData());
        }
        return parent::_prepareForm();
    }
}

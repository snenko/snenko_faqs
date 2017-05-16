<?php

class Snenko_Faqs_Block_Adminhtml_Faqs_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setId("faqsGrid");
        $this->setDefaultSort("faq_id");
        $this->setDefaultDir("DESC");
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel("faqs/faqs")->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn("faq_id", array(
            "header" => Mage::helper("faqs")->__("ID"),
            "align" => "right",
            "width" => "50px",
            "type" => "number",
            "index" => "faq_id",
        ));

        $this->addColumn("question", array(
            "header" => Mage::helper("faqs")->__("Question"),
            "index" => "question",
        ));
        $this->addColumn('is_active', array(
            'header' => Mage::helper('faqs')->__('Is Active'),
            'index' => 'is_active',
            'type' => 'options',
            'options' => Snenko_Faqs_Block_Adminhtml_Faqs_Grid::getOptionArray2(),
        ));


        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl("*/*/edit", array("id" => $row->getId()));
    }


    static public function getOptionArray2()
    {
        $data_array = array();
        $data_array[0] = 'Yes';
        $data_array[1] = 'No';
        return ($data_array);
    }

    static public function getValueArray2()
    {
        $data_array = array();
        foreach (Snenko_Faqs_Block_Adminhtml_Faqs_Grid::getOptionArray2() as $k => $v) {
            $data_array[] = array('value' => $k, 'label' => $v);
        }
        return ($data_array);

    }


}
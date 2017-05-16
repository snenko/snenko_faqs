<?php

class Snenko_Faqs_Block_Faqs
    extends Mage_Core_Block_Template
    implements Mage_Widget_Block_Interface
{

    protected function _toHtml()
    {
        $rows = $this->getData('rows');
        if(!$rows){$rows = 1;}

        /** @var Snenko_Faqs_Block_Left $block */
        $blockHtml = Mage::app()->getLayout()->createBlock('faqs/left')
//            ->setUseConfirm(false)
            ->setRows($rows)
            ->setTemplate('faqs/list.phtml')
            ->toHtml();

        return $blockHtml;
    }

}
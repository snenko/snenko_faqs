<?php

class Snenko_Faqs_Adminhtml_FaqsController extends Mage_Adminhtml_Controller_Action
{
    protected function _isAllowed()
    {
        //return Mage::getSingleton('admin/session')->isAllowed('faqs/faqs');
        return true;
    }

    protected function _initAction()
    {
        $this->loadLayout()->_setActiveMenu("faqs/faqs")->_addBreadcrumb(Mage::helper("adminhtml")->__("Faqs  Manager"), Mage::helper("adminhtml")->__("Faqs Manager"));
        return $this;
    }

    public function indexAction()
    {
        $this->_title($this->__("Faqs"));
        $this->_title($this->__("Manager Faqs"));

        $this->_initAction();
        $this->renderLayout();
    }

    public function editAction()
    {
        $this->_title($this->__("Faqs"));
        $this->_title($this->__("Faqs"));
        $this->_title($this->__("Edit Item"));

        $id = $this->getRequest()->getParam("id");
        $model = Mage::getModel("faqs/faqs")->load($id);
        if ($model->getId()) {
            Mage::register("faqs_data", $model);
            $this->loadLayout();
            $this->_setActiveMenu("faqs/faqs");
            $this->_addBreadcrumb(Mage::helper("adminhtml")->__("Faqs Manager"), Mage::helper("adminhtml")->__("Faqs Manager"));
            $this->_addBreadcrumb(Mage::helper("adminhtml")->__("Faqs Description"), Mage::helper("adminhtml")->__("Faqs Description"));
            $this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
            $this->_addContent($this->getLayout()->createBlock("faqs/adminhtml_faqs_edit"))->_addLeft($this->getLayout()->createBlock("faqs/adminhtml_faqs_edit_tabs"));
            $this->renderLayout();
        } else {
            Mage::getSingleton("adminhtml/session")->addError(Mage::helper("faqs")->__("Item does not exist."));
            $this->_redirect("*/*/");
        }
    }

    public function newAction()
    {

        $this->_title($this->__("Faqs"));
        $this->_title($this->__("Faqs"));
        $this->_title($this->__("New Item"));

        $id = $this->getRequest()->getParam("id");
        $model = Mage::getModel("faqs/faqs")->load($id);

        $data = Mage::getSingleton("adminhtml/session")->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        Mage::register("faqs_data", $model);

        $this->loadLayout();
        $this->_setActiveMenu("faqs/faqs");

        $this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

        $this->_addBreadcrumb(Mage::helper("adminhtml")->__("Faqs Manager"), Mage::helper("adminhtml")->__("Faqs Manager"));
        $this->_addBreadcrumb(Mage::helper("adminhtml")->__("Faqs Description"), Mage::helper("adminhtml")->__("Faqs Description"));


        $this->_addContent($this->getLayout()->createBlock("faqs/adminhtml_faqs_edit"))->_addLeft($this->getLayout()->createBlock("faqs/adminhtml_faqs_edit_tabs"));

        $this->renderLayout();

    }

    public function saveAction()
    {

        $post_data = $this->getRequest()->getPost();


        if ($post_data) {

            try {


                $model = Mage::getModel("faqs/faqs")
                    ->addData($post_data)
                    ->setId($this->getRequest()->getParam("id"))
                    ->save();

                Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Faqs was successfully saved"));
                Mage::getSingleton("adminhtml/session")->setFaqsData(false);

                if ($this->getRequest()->getParam("back")) {
                    $this->_redirect("*/*/edit", array("id" => $model->getId()));
                    return;
                }
                $this->_redirect("*/*/");
                return;
            } catch (Exception $e) {
                Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
                Mage::getSingleton("adminhtml/session")->setFaqsData($this->getRequest()->getPost());
                $this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
                return;
            }

        }
        $this->_redirect("*/*/");
    }


    public function deleteAction()
    {
        if ($this->getRequest()->getParam("id") > 0) {
            try {
                $model = Mage::getModel("faqs/faqs");
                $model->setId($this->getRequest()->getParam("id"))->delete();
                Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item was successfully deleted"));
                $this->_redirect("*/*/");
            } catch (Exception $e) {
                Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
                $this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
            }
        }
        $this->_redirect("*/*/");
    }

		
}

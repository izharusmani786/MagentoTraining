<?php

namespace SimplifiedMagento\FirstModule\Controller\Index;

use SimplifiedMagento\FirstModule\Model\DataExampleFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Action;


class Booking extends \Magento\Framework\App\Action\Action {

    protected $_dataExample;
    protected $resultRedirect;
    public function __construct(\Magento\Framework\App\Action\Context $context,
        \SimplifiedMagento\FirstModule\Model\DataExampleFactory  $dataExample,
        \Magento\Framework\Controller\ResultFactory $result) {
        parent::__construct($context);
        $this->_dataExample = $dataExample;
        $this->resultRedirect = $result;
    }

	public function execute(){
        try {
            
            $model = $this->_dataExample->create();
            $data = (array)$this->getRequest()->getPost();
            $collection = $model->getCollection();
            if(!empty($data)){
               $collection->addFieldToFilter("email", ["eq" => $data['email']]);
               $exitData = count($collection->getData());
            }
            
            if($data){
                if($exitData > 0){
                    $this->messageManager->addError( __('Email is already in use. Try another email id') );
                } else {
                    $model->addData([
                        "firstname" => $data['firstname'],
                        "lastname" => $data['lastname'],
                        "email" => $data['email'],
                        "dob" => $data['dob'],
                        ]);
                    $saveData = $model->save();
                    if($saveData){
                        $this->messageManager->addSuccess( __('Insert Record Successfully !') );
                    }
                }
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t submit your request, Please try again."));
        }

        $resultRedirect = $this->resultRedirect->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());

		//return $resultRedirect;
        // 2. GET request : Render the booking page 
        $this->_view->loadLayout();
        $this->_view->renderLayout();
	}
}
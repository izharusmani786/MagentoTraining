<?php

namespace SimplifiedMagento\Database\Controller\Page;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Action;
use SimplifiedMagento\Database\Model\InsertDataFactory;


class Index extends \Magento\Framework\App\Action\Action {

    protected $_insertData;
    protected $resultRedirect;
    public function __construct(
        Context $context,
        InsertDataFactory  $insertData,
        ResultFactory $result
    ) {
        parent::__construct($context);
        $this->_insertData = $insertData;
        $this->resultRedirect = $result;
    }

	public function execute(){

        $user_id = $_POST['user_id'];
        $product_id = $_POST['product_id'];
        $likedislike = $_POST['likedislike'];
        $status = 1;

        $model = $this->_insertData->create();
        $collection = $model->getCollection();
        $collection->addFieldToFilter('user_id', ['eq' => $user_id])
                   ->addFieldToFilter('product_id', ['eq' => $product_id]);
        //echo $collection->getSelect()->__toString();
        //die();          
        $data = $collection->getData();   
        $existData = count($data);
        
        if($existData) {
            $id = $data[0]['id'];
            $postUpdate = $model->load($id);
            $postUpdate->setLikedislike($likedislike);
            $postUpdate->save();
        } else {
            $model->addData([
                "user_id" => $user_id,
                "product_id" => $product_id,
                "likedislike" => $likedislike,
                "status" => $status,
            ]);
            $saveData = $model->save();
        }   
	}
}
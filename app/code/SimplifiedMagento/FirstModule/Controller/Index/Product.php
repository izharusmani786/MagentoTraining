<?php

namespace SimplifiedMagento\FirstModule\Controller\Index;

use SimplifiedMagento\FirstModule\Model\DataExampleFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Action;
use Magento\Catalog\Model\ProductFactory;


class Product extends \Magento\Framework\App\Action\Action {

    protected $_dataExample;
    protected $resultRedirect;
    protected $productFactory;

    public function __construct(
        ProductFactory $productFactory,
        Context $context,
        DataExampleFactory $dataExample,
        ResultFactory $result
    ) {
        $this->productFactory = $productFactory;
        $this->_dataExample = $dataExample;
        $this->resultRedirect = $result;
        parent::__construct($context);
    }

	public function execute(){
        $product = $this->productFactory->create()->load(modelId: 1);
        $product->setName(name: "IPHON 6");
        $productName = $product->getName();
        //$productName = $product->GetIdBySku(sku: "A000025");
        
        echo $productName;
	}

    
}
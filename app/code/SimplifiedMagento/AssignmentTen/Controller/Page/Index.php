<?php 

namespace SimplifiedMagento\AssignmentTen\Controller\Page;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Action;
use SimplifiedMagento\Database\Model\InsertDataFactory;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;


class Index extends \Magento\Framework\App\Action\Action {

    protected $_insertData;
    protected $resultRedirect;
    protected $productRepository; 
    protected $productCollection;
    protected $pageFactory;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        InsertDataFactory  $insertData,
        ResultFactory $result,
        ProductRepositoryInterface $productRepository,
        CollectionFactory $productCollection
    ) {
        parent::__construct($context);
        $this->_insertData = $insertData;
        $this->resultRedirect = $result;
        $this->productCollection = $productCollection;
        $this->pageFactory = $pageFactory;
    }

	public function execute(){

        return $this->pageFactory->create();

	}
}
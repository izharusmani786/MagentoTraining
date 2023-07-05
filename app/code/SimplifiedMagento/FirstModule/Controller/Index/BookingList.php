<?php

namespace SimplifiedMagento\FirstModule\Controller\Index;

use SimplifiedMagento\FirstModule\Model\DataExampleFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Action;


class BookingList extends \Magento\Framework\App\Action\Action {

    protected $resultPageFactory;
 
    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

	public function execute()
    {
        return $this->resultPageFactory->create();
    }
}
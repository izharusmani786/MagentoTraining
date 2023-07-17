<?php

namespace SimplifiedMagento\FirstModule\Block;
use Magento\Framework\View\Element\Template\Context;
use SimplifiedMagento\FirstModule\Model\ResourceModel\DataExample\CollectionFactory;

class BookingList extends \Magento\Framework\View\Element\Template
{
    public $collection;
    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(Context $context, CollectionFactory $collectionFactory,array $data = [] )
    {
        $this->collection = $collectionFactory;
        parent::__construct($context, $data);
    }


    public function getCollection()
    {
        return $this->collection->create();
    }
    /**
     * Get form action URL for POST booking request
     *
     * @return string
     */
    // public function getFormAction()
    // {
    //     return '/companymodule/index/booking';
    // }
}
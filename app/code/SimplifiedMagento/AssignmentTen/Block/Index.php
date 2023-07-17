<?php 

namespace SimplifiedMagento\AssignmentTen\Block;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\Registry;
use Magento\Catalog\Model\Product;
use SimplifiedMagento\FirstModule\Model\ResourceModel\DataExample\CollectionFactory;


class Index extends \Magento\Framework\View\Element\Template
{
    protected $collection;
    public function __construct(
        Context $context,
        CollectionFactory $collection,
        array $data = []
    ) {
        $this->collection = $collection;
        parent::__construct($context, $data);
    }

    public function getCollectionData(){
        $collection = $this->collection->create();
        $data = $collection->getData();
        return $data;
    }

    public function randomNumber()
    {
        $number = rand(10,100);
        return $number;
    }
}
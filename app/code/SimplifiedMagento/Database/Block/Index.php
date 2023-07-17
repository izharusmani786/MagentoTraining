<?php

namespace SimplifiedMagento\Database\Block;

use Magento\Framework\View\Element\Template\Context;

class Index extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        Context $context,
        \Magento\Catalog\Model\Product $product,  array $data = []
    ) {
        $this->product = $product;
        parent::__construct($context, $data);
    }

    public function getProductAttributeValue()
    {
        $prodvar = $this->registry->registry('current_product');
        $productId = $prodvar->getId();
        $product = $this->product->load($productId);
        $productattributevalue =$this->product->getResource()->getAttribute('dimension')->getFrontend()->getValue($product);
        return $productattributevalue;
    }

    public function getProductAttributeLabel()
    {
        $prodvar = $this->registry->registry('current_product');
        $productId = $prodvar->getId();
        $product = $this->product->load($productId);
        $productattributelabel =$this->product->getResource()->getAttribute('dimension')->getFrontend()->getLabel();
        return $productattributelabel;
    }

}
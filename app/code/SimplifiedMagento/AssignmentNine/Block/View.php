<?php

namespace SimplifiedMagento\AssignmentNine\Block;

use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\Registry;

class View extends \Magento\Framework\View\Element\Template
{
    protected $registry;
    public function __construct(
        Context $context,
        Registry $registry,
        \Magento\Catalog\Model\Product $product,  array $data = []
    ) {
        $this->product = $product;
        $this->registry = $registry;
        parent::__construct($context, $data);
    }

    public function gethelloData(){
        $str = 'Hello World';
        return $str;
    }

    public function getProductAttributeValue()
    {
        $prodvar = $this->registry->registry('current_product');
        $productId = $prodvar->getId();
        $product = $this->product->load($productId);
        $productattributevalue =$this->product->getResource()->getAttribute('dimension_pro')->getFrontend()->getValue($product);
        return $productattributevalue;
    }

    public function getProductAttributeLabel()
    {
        $prodvar = $this->registry->registry('current_product');
        $productId = $prodvar->getId();
        $product = $this->product->load($productId);
        $productattributelabel =$this->product->getResource()->getAttribute('dimension_pro')->getFrontend()->getLabel();
        return $productattributelabel;
    }

    public function getProductColorValue()
    {
        $prodvar = $this->registry->registry('current_product');
        $productId = $prodvar->getId();
        $product = $this->product->load($productId);
        $productattributevalue =$this->product->getResource()->getAttribute('color_pro')->getFrontend()->getValue($product);
        return $productattributevalue;
    }

    public function getProductColorLabel()
    {
        $prodvar = $this->registry->registry('current_product');
        $productId = $prodvar->getId();
        $product = $this->product->load($productId);
        $productattributelabel =$this->product->getResource()->getAttribute('color_pro')->getFrontend()->getLabel();
        return $productattributelabel;
    }


    public function getProductDatailById()
    {
        $productId = 1;
        $product = $this->product->load($productId);
        $string = "Product Name ". $product->getName()."<br> Product ID ". $product->getId()."<br> Product Price ". $product->getPrice()."<br>";
        return $string;
    }

}
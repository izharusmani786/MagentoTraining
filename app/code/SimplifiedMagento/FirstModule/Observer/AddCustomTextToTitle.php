<?php 

namespace SimplifiedMagento\FirstModule\Observer;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;


class AddCustomTextToTitle implements ObserverInterface 
{
    public function execute(Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();
        $productName=$product->getName();  
        if(strpos($productName, "KFC") !== false){
            $productName = implode(' ', array_unique(explode(' ', $productName)));
            $product->setName($productName);
        } else {
            $additionalText = "KFC";
            $newProductName = $additionalText.' '.$productName;
            $product->setName($newProductName);
        }
        
    }

}
<?php 

namespace SimplifiedMagento\FirstModule\Plugin;
use Magento\Catalog\Model\Product;
use Magento\Quote\Model\Quote\Address\Total;

class ProductSolutions {

    // public function beforeSetName(\Magento\Catalog\Model\Product $subject, $name){
    //     return "KFC ". $name;
    // }

    public function afterGetName(\Magento\Catalog\Model\Product $subject, $result){
        //return "KFC ". $result;
        return $result;
    }

    // public function afterGetTotalAmount(\Magento\Quote\Model\Quote\Address\Total $subject, $result)
    // {
    //     $onepercent = ($result*1)/100;
    //     return $result + $onepercent;
    // }

    // public function aroundGetName(\Magento\Catalog\Model\Product $subject, callable $proceed){
    //     echo 'Before Process';
    //     $name = $proceed();
    //     echo $name;
    //     echo "after proceed";
    //     return $name;
    // }

    // public function aroundGetIdBySku(\Magento\Catalog\Model\Product $subject, callable $proceed, $sku){
    //     echo 'Before Process';
    //     $id = $proceed($sku);
    //     echo $id;
    //     echo "adter proceed";
    //     return $id;
    // }

}

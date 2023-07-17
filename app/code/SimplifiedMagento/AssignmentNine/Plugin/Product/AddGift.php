<?php

namespace SimplifiedMagento\AssignmentNine\Plugin\Product;

class AddGift
{       
   /**
    * @var \Magento\Catalog\Api\Data\ProductExtensionFactory
    */
   private $extensionFactory;

   /**
    * @param \Magento\Catalog\Api\Data\ProductExtensionFactory $extensionFactory
    */
   public function __construct(
\Magento\Catalog\Api\Data\ProductExtensionFactory $extensionFactory
   ){       
$this->extensionFactory = $extensionFactory;
    }

   /**
    * Loads product entity extension attributes
    *
    * @param \Magento\Catalog\Api\Data\ProductInterface $entity
    * @param \Magento\Catalog\Api\Data\ProductExtensionInterface|null $extension
    * @return \Magento\Catalog\Api\Data\ProductExtensionInterface
    */
    public function afterGet(\Magento\Catalog\Api\ProductRepositoryInterface $subject, \Magento\Catalog\Api\Data\ProductInterface $entity)
    {
       /** get current extension attribute from database **/
       $giftData = "cup";
       $extensionAttributes = $entity->getExtensionAttributes();
       /** set extension attributes by value you have gotten **/
       $extensionAttributes->setGift($giftData);
       $entity->setExtensionAttributes($extensionAttributes);
    
       return $entity;
    }
}
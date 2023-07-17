<?php

namespace SimplifiedMagento\AssignmentNine\Plugin\Product;

class LoadExtensionAttibutes
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
   public function afterGetExtensionAttributes(
       \Magento\Catalog\Api\Data\ProductInterface $entity,
       \Magento\Catalog\Api\Data\ProductExtensionInterface $extension = null
   )
   {
       if ($extension === null) {
           $extension = $this->extensionFactory->create();
       }

       return $extension;
   }
}
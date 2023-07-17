<?php

namespace SimplifiedMagento\FirstModule\Plugin;

class ProductSavePlugin
{
    public function beforeSave($subject, $product)
    {
        $additionalText = "KFC";
        $product->setTitle($additionalText.' '.$product->getTitle());
        return [$product];
    }
}
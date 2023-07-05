<?php
namespace SimplifiedMagento\FirstModule\Plugin\Catalog\Block\Product;
use Magento\Catalog\Block\Product\View as ProductView;
class View
{
    private $displayBlocks = ['product.info.addtocart'];
 
    // you can add layout reference as per you need to display like: product.info.price, product.info.review, etc.
    public function afterToHtml(ProductView $subject, $html)
    {
        if (in_array($subject->getNameInLayout(), $this->displayBlocks)) {
            return $html . '<div><input type="checkbox" id="like" name="like"> <label for="likedislike-wrap">Like</label></div><div><input type="checkbox" id="dislike" name="dislike"> <label for="dislike">Dislike</label></div>';
        }
 
        return $html;
    }

}
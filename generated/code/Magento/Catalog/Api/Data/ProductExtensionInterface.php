<?php
namespace Magento\Catalog\Api\Data;

/**
 * ExtensionInterface class for @see \Magento\Catalog\Api\Data\ProductInterface
 */
interface ProductExtensionInterface extends \Magento\Framework\Api\ExtensionAttributesInterface
{
    /**
     * @return int[]|null
     */
    public function getWebsiteIds();

    /**
     * @param int[] $websiteIds
     * @return $this
     */
    public function setWebsiteIds($websiteIds);

    /**
     * @return \Magento\Catalog\Api\Data\CategoryLinkInterface[]|null
     */
    public function getCategoryLinks();

    /**
     * @param \Magento\Catalog\Api\Data\CategoryLinkInterface[] $categoryLinks
     * @return $this
     */
    public function setCategoryLinks($categoryLinks);

    /**
     * @return \Magento\CatalogInventory\Api\Data\StockItemInterface|null
     */
    public function getStockItem();

    /**
     * @param \Magento\CatalogInventory\Api\Data\StockItemInterface $stockItem
     * @return $this
     */
    public function setStockItem(\Magento\CatalogInventory\Api\Data\StockItemInterface $stockItem);

    /**
     * @return \Magento\Downloadable\Api\Data\LinkInterface[]|null
     */
    public function getDownloadableProductLinks();

    /**
     * @param \Magento\Downloadable\Api\Data\LinkInterface[] $downloadableProductLinks
     * @return $this
     */
    public function setDownloadableProductLinks($downloadableProductLinks);

    /**
     * @return \Magento\Downloadable\Api\Data\SampleInterface[]|null
     */
    public function getDownloadableProductSamples();

    /**
     * @param \Magento\Downloadable\Api\Data\SampleInterface[] $downloadableProductSamples
     * @return $this
     */
    public function setDownloadableProductSamples($downloadableProductSamples);

    /**
     * @return \Magento\Bundle\Api\Data\OptionInterface[]|null
     */
    public function getBundleProductOptions();

    /**
     * @param \Magento\Bundle\Api\Data\OptionInterface[] $bundleProductOptions
     * @return $this
     */
    public function setBundleProductOptions($bundleProductOptions);

    /**
     * @return \Magento\ConfigurableProduct\Api\Data\OptionInterface[]|null
     */
    public function getConfigurableProductOptions();

    /**
     * @param \Magento\ConfigurableProduct\Api\Data\OptionInterface[] $configurableProductOptions
     * @return $this
     */
    public function setConfigurableProductOptions($configurableProductOptions);

    /**
     * @return int[]|null
     */
    public function getConfigurableProductLinks();

    /**
     * @param int[] $configurableProductLinks
     * @return $this
     */
    public function setConfigurableProductLinks($configurableProductLinks);

    /**
     * @return \Magento\SalesRule\Api\Data\RuleDiscountInterface[]|null
     */
    public function getDiscounts();

    /**
     * @param \Magento\SalesRule\Api\Data\RuleDiscountInterface[] $discounts
     * @return $this
     */
    public function setDiscounts($discounts);

    /**
     * @return string|null
     */
    public function getGift();

    /**
     * @param string $gift
     * @return $this
     */
    public function setGift($gift);

    /**
     * @return \SimplifiedMagento\AssignmentNine\Api\Data\WrapperInterface|null
     */
    public function getWrapper();

    /**
     * @param \SimplifiedMagento\AssignmentNine\Api\Data\WrapperInterface $wrapper
     * @return $this
     */
    public function setWrapper(\SimplifiedMagento\AssignmentNine\Api\Data\WrapperInterface $wrapper);

    /**
     * @return string[]|null
     */
    public function getPostCard();

    /**
     * @param string[] $postCard
     * @return $this
     */
    public function setPostCard($postCard);
}

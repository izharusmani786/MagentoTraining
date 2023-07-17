<?php 

namespace SimplifiedMagento\AssignmentNine\Setup;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Setup\EavSetupFactory;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $eavSetup = $this->eavSetupFactory->create(['setup'=>$setup]);
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'dimension_pro',
            [
                'group'=>'content',
                'type'=>'text',
                'global'=>\Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible'=> true,
                'visible_on_front'=>true,
                'required'=>true,
                'searchable'=>false,
                'used_in_product_listing'=>true,
                'label'=>'Dimension',
                'input'=>'text',
            ]
        );

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'color_pro',
            [
                'group'=>'content',
                'type'=>'text',
                'global'=>\Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible'=> true,
                'visible_on_front'=>true,
                'required'=>true,
                'searchable'=>false,
                'used_in_product_listing'=>true,
                'label'=>'Product Color',
                'input'=>'select',
                'source'=>\SimplifiedMagento\AssignmentNine\Model\Config\Options::class
            ]
        );

        $setup->endSetup();
    }

}
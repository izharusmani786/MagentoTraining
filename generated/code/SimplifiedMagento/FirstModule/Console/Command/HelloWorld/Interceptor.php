<?php
namespace SimplifiedMagento\FirstModule\Console\Command\HelloWorld;

/**
 * Interceptor class for @see \SimplifiedMagento\FirstModule\Console\Command\HelloWorld
 */
class Interceptor extends \SimplifiedMagento\FirstModule\Console\Command\HelloWorld implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Helper\Context $context, \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $collection, \Magento\Catalog\Model\Product\Action $action, \Magento\Store\Model\StoreManagerInterface $storeManager)
    {
        $this->___init();
        parent::__construct($context, $collection, $action, $storeManager);
    }

    /**
     * {@inheritdoc}
     */
    public function run(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'run');
        return $pluginInfo ? $this->___callPlugins('run', func_get_args(), $pluginInfo) : parent::run($input, $output);
    }
}

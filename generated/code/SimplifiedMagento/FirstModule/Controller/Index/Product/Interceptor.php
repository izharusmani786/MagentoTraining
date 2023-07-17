<?php
namespace SimplifiedMagento\FirstModule\Controller\Index\Product;

/**
 * Interceptor class for @see \SimplifiedMagento\FirstModule\Controller\Index\Product
 */
class Interceptor extends \SimplifiedMagento\FirstModule\Controller\Index\Product implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Model\ProductFactory $productFactory, \Magento\Framework\App\Action\Context $context, \SimplifiedMagento\FirstModule\Model\DataExampleFactory $dataExample, \Magento\Framework\Controller\ResultFactory $result)
    {
        $this->___init();
        parent::__construct($productFactory, $context, $dataExample, $result);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        return $pluginInfo ? $this->___callPlugins('execute', func_get_args(), $pluginInfo) : parent::execute();
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dispatch');
        return $pluginInfo ? $this->___callPlugins('dispatch', func_get_args(), $pluginInfo) : parent::dispatch($request);
    }
}

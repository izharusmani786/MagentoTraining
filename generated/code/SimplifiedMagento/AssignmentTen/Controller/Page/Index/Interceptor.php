<?php
namespace SimplifiedMagento\AssignmentTen\Controller\Page\Index;

/**
 * Interceptor class for @see \SimplifiedMagento\AssignmentTen\Controller\Page\Index
 */
class Interceptor extends \SimplifiedMagento\AssignmentTen\Controller\Page\Index implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\View\Result\PageFactory $pageFactory, \SimplifiedMagento\Database\Model\InsertDataFactory $insertData, \Magento\Framework\Controller\ResultFactory $result, \Magento\Catalog\Api\ProductRepositoryInterface $productRepository, \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollection)
    {
        $this->___init();
        parent::__construct($context, $pageFactory, $insertData, $result, $productRepository, $productCollection);
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

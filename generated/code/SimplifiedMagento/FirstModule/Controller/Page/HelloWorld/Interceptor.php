<?php
namespace SimplifiedMagento\FirstModule\Controller\Page\HelloWorld;

/**
 * Interceptor class for @see \SimplifiedMagento\FirstModule\Controller\Page\HelloWorld
 */
class Interceptor extends \SimplifiedMagento\FirstModule\Controller\Page\HelloWorld implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Request\Http $http, \SimplifiedMagento\FirstModule\Model\HeavyService $heavyService, \Magento\Framework\App\Action\Context $context, \SimplifiedMagento\FirstModule\NotMagento\PencilInterface $pencilInterface)
    {
        $this->___init();
        parent::__construct($http, $heavyService, $context, $pencilInterface);
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

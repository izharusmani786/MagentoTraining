<?php
namespace SimplifiedMagento\FirstModule\Controller\Page\Router;

/**
 * Interceptor class for @see \SimplifiedMagento\FirstModule\Controller\Page\Router
 */
class Interceptor extends \SimplifiedMagento\FirstModule\Controller\Page\Router implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\ActionFactory $actionFactory, \Magento\Framework\App\ResponseInterface $response)
    {
        $this->___init();
        parent::__construct($actionFactory, $response);
    }

    /**
     * {@inheritdoc}
     */
    public function match(\Magento\Framework\App\RequestInterface $request) : ?\Magento\Framework\App\ActionInterface
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'match');
        return $pluginInfo ? $this->___callPlugins('match', func_get_args(), $pluginInfo) : parent::match($request);
    }
}

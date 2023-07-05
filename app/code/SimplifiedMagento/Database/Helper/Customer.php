<?php
 
namespace SimplifiedMagento\Database\Helper;
 
use Magento\Authorization\Model\UserContextInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
 
class Customer extends AbstractHelper
{
    protected $userContext;
 
    public function __construct(
        Context $context,
        UserContextInterface $userContext
    )
    {
        $this->userContext = $userContext;
        parent::__construct($context);
    }
 
    public function getLoginCustomerId()
    {
        $customerId = $this->userContext->getUserId();
        return $customerId;
    }
}
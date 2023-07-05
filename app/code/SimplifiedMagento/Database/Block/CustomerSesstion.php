<?php
namespace SimplifiedMagento\Database\Block;
use Magento\Customer\Model\SessionFactory;

class CustomerSession extends \Magento\Framework\View\Element\Template 
{
    protected $sessionFactory;
    public function __construct(SessionFactory $sessionFactory)
    {
        $this->sessionFactory = $sessionFactory;
    }

    public function getCustomerId()
    {
        $customerSession = $this->sessionFactory->create();
        $customerId = $customerSession->getCustomer()->getId();
        return $customerId;    
    }
}
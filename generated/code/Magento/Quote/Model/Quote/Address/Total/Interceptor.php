<?php
namespace Magento\Quote\Model\Quote\Address\Total;

/**
 * Interceptor class for @see \Magento\Quote\Model\Quote\Address\Total
 */
class Interceptor extends \Magento\Quote\Model\Quote\Address\Total implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(array $data = [], ?\Magento\Framework\Serialize\Serializer\Json $serializer = null)
    {
        $this->___init();
        parent::__construct($data, $serializer);
    }
}

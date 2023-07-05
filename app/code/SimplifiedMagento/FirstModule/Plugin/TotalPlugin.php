<?php
namespace SimplifiedMagento\FirstModule\Plugin;
use Magento\Quote\Model\Quote\Address\Total;

class TotalPlugin
{
    public function afterGetTotalAmount(\Magento\Quote\Model\Quote\Address\Total $subject, $result)
    {
        // Add 1 to the total amount

        $onepercent = ($result*1)/100;

        return $result + $onepercent;
    }
}
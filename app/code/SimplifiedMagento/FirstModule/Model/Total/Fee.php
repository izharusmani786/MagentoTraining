<?php
namespace SimplifiedMagento\FirstModule\Model\Total;
use Magento\Checkout\Model\Cart as CustomerCart;
class Fee extends \Magento\Quote\Model\Quote\Address\Total\AbstractTotal
{
    protected $cart;
    protected $adminfee;
    /**
    * Collect grand total address amount
    *
    * @param \Magento\Quote\Model\Quote $quote
    * @param \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment
    * @param \Magento\Quote\Model\Quote\Address\Total $total
    * @return $this
    */
    protected $quoteValidator = null;
    public function __construct(\Magento\Quote\Model\QuoteValidator $quoteValidator, CustomerCart $cart)
    {
        $this->cart = $cart;
        $this->quoteValidator = $quoteValidator; 
    }
    public function collect(
        \Magento\Quote\Model\Quote $quote,
        \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment,
        \Magento\Quote\Model\Quote\Address\Total $total,
    ){
        parent::collect($quote, $shippingAssignment, $total);

        

        $totals = $this->cart->getQuote()->getTotals();
        $subtotal = $totals['subtotal']['value'];

        $exist_amount = 0;
        $fee = ($subtotal*1)/100;

        $this->adminfee = $fee;

        $balance = $fee - $exist_amount;
        $total->setTotalAmount('fee', $balance);
        $total->setBaseTotalAmount('fee', $balance);
        $total->setFee($balance);
        $total->setBaseFee($balance);
        $total->setGrandTotal($total->getGrandTotal());
        $total->setBaseGrandTotal($total->getBaseGrandTotal());
        return $this;
    }

    protected function clearValues(Address\Total $total)
    {
        $total->setTotalAmount('subtotal', 0);
        $total->setBaseTotalAmount('subtotal', 0);
        $total->setTotalAmount('tax', 0);
        $total->setBaseTotalAmount('tax', 0);
        $total->setTotalAmount('discount_tax_compensation', 0);
        $total->setBaseTotalAmount('discount_tax_compensation', 0);
        $total->setTotalAmount('shipping_discount_tax_compensation', 0);
        $total->setBaseTotalAmount('shipping_discount_tax_compensation', 0);
        $total->setSubtotalInclTax(0);
        $total->setBaseSubtotalInclTax(0);
    }

    /**
    * @param \Magento\Quote\Model\Quote $quote
    * @param Address\Total $total
    * return array|null
    */
    /**
    * Assign subtotal amount and label to address object
    *
    * @param \Magento\Quote\Model\Quote $quote
    * @param Address\Total $total
    * @return array
    * @SuppressWarnings(PHPMD.UnusedFormalParameter)
    */
    public function fetch(\Magento\Quote\Model\Quote $quote, \Magento\Quote\Model\Quote\Address\Total $total)
    {
        return [
        'code'=>'fee',
        'title'=>'1% Admin Fee',
        'value'=> $this->adminfee
        ];
    }

    /**
    * Get Subtotal label
    *
    * @return \Magento\Framework\Phrase
    */
    public function getLabel()
    {
        return __('1% Admin Fee');
    }
    }
<?php 
namespace SimplifiedMagento\FirstModule\Model\ResourceModel\DataExample;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{
	public function _construct(){
		$this->_init("SimplifiedMagento\FirstModule\Model\DataExample","SimplifiedMagento\FirstModule\Model\ResourceModel\DataExample");
	}
}
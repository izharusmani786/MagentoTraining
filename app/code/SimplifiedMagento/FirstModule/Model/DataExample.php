<?php 
namespace SimplifiedMagento\FirstModule\Model;
class DataExample extends \Magento\Framework\Model\AbstractModel{
	public function _construct(){
		$this->_init("SimplifiedMagento\FirstModule\Model\ResourceModel\DataExample");
	}
}
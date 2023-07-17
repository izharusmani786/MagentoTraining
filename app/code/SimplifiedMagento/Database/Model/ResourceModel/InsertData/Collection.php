<?php 
namespace SimplifiedMagento\Database\Model\ResourceModel\InsertData;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{
	public function _construct(){
		$this->_init("SimplifiedMagento\Database\Model\InsertData","SimplifiedMagento\Database\Model\ResourceModel\InsertData");
	}
}
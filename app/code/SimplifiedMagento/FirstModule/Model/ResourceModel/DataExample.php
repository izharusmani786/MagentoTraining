<?php 
namespace SimplifiedMagento\FirstModule\Model\ResourceModel;
class DataExample extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    public function _construct(){
        $this->_init("magento_booking","id");
    }
}
<?php 
namespace SimplifiedMagento\Database\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Exception\LocalizedException;

class InsertData extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {

    public function _construct(){
        $this->_init("mag_likedislike","id");
    }
}
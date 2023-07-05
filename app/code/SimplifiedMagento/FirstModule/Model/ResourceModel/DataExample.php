<?php 
namespace SimplifiedMagento\FirstModule\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Exception\LocalizedException;

class DataExample extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {

    public function _construct(){
        $this->_init("magento_booking","id");
    }

    /*protected function _beforeSave(\Magento\Framework\Model\AbstractModel $object)
    {
        $bookings = (array)$object->getData('magento_booking');

        $email = (array)$object->getEmail();
        print_r($bookings);
        exit;

        if (!$this->checkIsUniqueEmail($object)) {
            throw new LocalizedException(
                __('Email needs to be unique for each booking.')
            );
        }

        return parent::_beforeSave($object);
    }

    public function checkIsUniqueEmail(AbstractModel $object)
    {
        $bookings = (array)$object->getData('magento_booking');

        $select = $this->getConnection()->select()
            ->from('magento_booking')
            ->where('magento_booking.email IN (?)', $bookings);

        // if ($object->getId()) {
        //     $select->where('magento_booking.id <> ?', $object->getId());
        // }

        if ($this->getConnection()->fetchRow($select)) {
            return false;
        } else {
            return true;
        }
        
    }*/

}
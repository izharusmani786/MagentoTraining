<?php
namespace SimplifiedMagento\FirstModule\Model;
use SimplifiedMagento\FirstModule\Api\GetBookingInterface;

class GetBookings implements GetBookingInterface
{

     /**
     * {@inheritdoc}
     */

    public function getData()
    {  
         
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('magento_booking');

        $select = $connection->select()
        ->from(
       ['p' => $tableName]);

       $data = $connection->fetchAll($select);

       return $data;

    }

}
<?php

namespace SimplifiedMagento\FirstModule\Setup;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * Class InstallData 
 *
 * @package Thecoachsmb\Mymodule\Setup
 */
class InstallData implements InstallDataInterface
{
    /**
     * Creates sample articles
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $conn = $setup->getConnection(); 
        $tableName = $setup->getTable('magento_booking');

        $data = [
            [
                'firstname' => 'izhar',
                'lastname' => 'usmani',
                'email' => 'izhar@gmail.com',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'firstname' => 'rahul',
                'lastname' => 'kumar',
                'email' => 'izhar@gmail.com',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];
        $conn->insertMultiple($tableName, $data); 
        $setup->endSetup(); 
    } 
}
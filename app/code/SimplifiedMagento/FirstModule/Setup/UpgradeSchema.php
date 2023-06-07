<?php
 
 namespace SimplifiedMagento\FirstModule\Setup;
 
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
 
class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        //Add new fields to the created table
        if (version_compare($context->getVersion(), '1.2.2') < 0) {
            $table = $setup->getTable('magento_booking');
            //Check for the existence of the table
            if ($setup->getConnection()->isTableExists($table) == true) {
                // Declare data
                $columns = [
                    'dob' => [
                        'type' => Table::TYPE_TIMESTAMP,
                        ['nullable' => false],
                        'comment' => 'DOB',
                    ],
                ];
                $connection = $setup->getConnection();
                foreach ($columns as $name => $definition) {
                    $connection->addColumn($table, $name, $definition);
                }
            }
        }
        //Create a new table
        if (version_compare($context->getVersion(), '1.2.2') < 0) {
            $categories = $setup->getTable('magento_blog_categories');
            //Check for the existence of the table
            if ($setup->getConnection()->isTableExists($categories) != true) {
                $tableCategories = $setup->getConnection()
                    ->newTable($categories)
                    ->addColumn(
                        'cat_id',
                        Table::TYPE_INTEGER,
                        null,
                        ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                        'Category Id'
                    )
                    ->addColumn(
                        'status',
                        Table::TYPE_SMALLINT,
                        null,
                        ['nullable' => false, 'default' => 1],
                        'Status'
                    )
                    ->addColumn(
                        'cat_title',
                        Table::TYPE_TEXT,
                        null,
                        ['nullable' => false, 'default' => ''],
                        'Category Title'
                    )
                    ->addColumn(
                        'created_at',
                        Table::TYPE_TIMESTAMP,
                        null,
                        ['nullable' => false],
                        'Created At'
                    )
                    //Set comment for magetop_blog table
                    ->setComment('Magetop Blog Categories')
                    //Set option for magetop_blog table
                    ->setOption('type', 'InnoDB')
                    ->setOption('charset', 'utf8');
                $setup->getConnection()->createTable($tableCategories);
            }
        }
        $setup->endSetup();
    }
}
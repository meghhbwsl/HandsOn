<?php
namespace New\FactoryTest\Setup\Patch\Schema;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\SchemaPatchInterface;
use Magento\Framework\DB\Ddl\Table;

class CreateProductLogTable implements SchemaPatchInterface
{
    private $moduleDataSetup;

    public function __construct(ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    public function apply()
    {
        $setup = $this->moduleDataSetup;
        $setup->startSetup();

        if (!$setup->tableExists('product_view_log')) {
            $table = $setup->getConnection()->newTable(
                $setup->getTable('product_view_log')
            )->addColumn(
                'log_id', Table::TYPE_INTEGER, null,
                ['identity' => true, 'nullable' => false, 'primary' => true], 'Log ID'
            )->addColumn(
                'product_id', Table::TYPE_INTEGER, null, ['nullable' => false], 'Product ID'
            )->addColumn(
                'customer_id', Table::TYPE_INTEGER, null, ['nullable' => true, 'default' => null], 'Customer ID'
            )->addColumn(
                'viewed_at', Table::TYPE_TIMESTAMP, null, ['nullable' => false], 'Viewed At'
            )->setComment('Product View Log Table');

            $setup->getConnection()->createTable($table);
        }

        $setup->endSetup();
    }

    public static function getDependencies() { return []; }
    public function getAliases() { return []; }
}

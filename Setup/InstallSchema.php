<?php
namespace Onderwater\TransactionMining\Setup;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if (!$installer->tableExists('onderwater_transactionmining_rules')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('onderwater_transactionmining_rules')
            )
                ->addColumn(
                    'id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'nullable' => false,
                        'primary'  => true,
                        'unsigned' => true,
                    ],
                    'Product ID'
                )
                ->addColumn(
                    'antecedent',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    ['nullable => false'],
                    'Product Skus Antecedent'
                )
                ->addColumn(
                    'consequent',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    ['nullable => false'],
                    'Product Skus Consequent'
                )
                ->addColumn(
                    'confidence',
                    \Magento\Framework\DB\Ddl\Table::TYPE_FLOAT,
                    null,
                    [
                        'identity' => false,
                        'nullable' => false,
                        'primary'  => false,
                        'unsigned' => true,
                    ],
                    'Rule confidence'
                )
                ->addColumn(
                    'support',
                    \Magento\Framework\DB\Ddl\Table::TYPE_FLOAT,
                    null,
                    [
                        'identity' => false,
                        'nullable' => false,
                        'primary'  => false,
                        'unsigned' => true,
                    ],
                    'Rule support'
                )
                ->setComment('Association Rules Table');
            $installer->getConnection()->createTable($table);
            
        }
        $installer->endSetup();
    }
}
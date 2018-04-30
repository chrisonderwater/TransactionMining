<?php
namespace Onderwater\TransactionMining\Model\ResourceModel\Rules;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'product_id';
    protected $_eventPrefix = 'onderwater_transactionmining_rules_collection';
    protected $_eventObject = 'rules_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Onderwater\TransactionMining\Model\Rules', 'Onderwater\TransactionMining\Model\ResourceModel\Rules');
    }

}
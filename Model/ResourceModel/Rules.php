<?php
namespace Onderwater\TransactionMining\Model\ResourceModel;


class Rules extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('onderwater_transactionmining_rules', 'product_id');
    }

}
<?php
namespace Onderwater\TransactionMining\Model;
class Rules extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'onderwater_transactionmining_rules';

    protected $_cacheTag = 'onderwater_transactionmining_rules';

    protected $_eventPrefix = 'onderwater_transactionmining_rules';

    protected function _construct()
    {
        $this->_init('Onderwater\TransactionMining\Model\ResourceModel\Rules');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
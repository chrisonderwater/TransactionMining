<?php

namespace Onderwater\PaymentOptions\Model;

use Magento\Cron\Exception;
use Magento\Framework\Model\AbstractModel;

/**
 * Transactions Model
 *
 * @author      Chris Onderwater
 */
class Transactions extends AbstractModel
{
    /**
     * @var \Magento\Sales\Model\ResourceModel\Order\CollectionFactory
     */
     protected $_orderCollectionFactory;

    /**
     * @return void
     */
    protected function _construct(\Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory,
        array $data = [])
    {
        $this->_init();
    }

    public function loadData(){

    }
    
}
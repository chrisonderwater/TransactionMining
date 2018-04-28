<?php

namespace Onderwater\TransactionMining\Model;

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
    protected $_orderModel;
    protected $orderRepository;

    /**
     * @return void
     */
    public function __construct(\Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderRepository)
    {
//        $this->_init();
        $this->orderRepository = $orderRepository;
    }

    public function loadData(){
        $this->_orderCollectionFactory->create()->addAttributeToSelect('*');


    }

    public function getTransactions(){
        $collection = $this->orderRepository->create()->addAttributeToSelect('*');
        $transactionList = [];
        foreach ($collection as $order){
            $transaction = [];
            foreach($order->getAllItems() as $item){
                array_push($transaction, $item->getId());
            }
            array_push($transactionList, $transaction);
        }
        return $transactionList ;
        // You Can filter collection as
        //$this->orderCollectionFactory->addFieldToFilter($field, $condition);
    }
    
}
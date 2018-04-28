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

    /**
     * @return void
     */
    public function __construct(\Magento\Sales\Model\Order $orderModel)
    {
//        $this->_init();
        $this->_orderModel = $orderModel;
    }

    public function loadData(){
        $this->_orderCollectionFactory->create()->addAttributeToSelect('*');


    }

    public function getOrders($store){
        $orders = $this->_orderModel->getCollection();
        $orders->join(array('item' => 'sales_order_item'), 'main_table.entity_id = item.order_id AND main_table.store_id='.$store.' ');
        $orders->getSelect()->group('main_table.entity_id');
        $orders->getSelect()->order('main_table.created_at DESC');
        //$this->_logger->info($orders); //find your query in system.log
        $order_array = array();
        foreach($orders as $k=>$order) {
            $order_array[$k] = array(
                'order_id' => $order->getId(),
                'order_incremental_id' => $order->getIncrementId(),
                'order_status' => $order->getStatusLabel(),
                'order_date' => $order->getCreatedAt(),
                'customer_name' => $order->getCustomerName()
                //as your need
            );
        }
        return json_encode($order_array);
    }
    
}
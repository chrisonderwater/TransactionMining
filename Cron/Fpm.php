<?php
# Frequent pattern mining class.
# 

namespace Onderwater\TransactionMining\Cron;
use Phpml\Association\Apriori;
use Phpml\ModelManager;

class Fpm {

    /**
     * @var |Onderwater|TransactionMining|Model|Transactions
     */
    protected $_transactions;

    public function __construct(\Onderwater\TransactionMining\Model\Transactions $transactions) {
        $this->_transactions = $transactions;
    }

/**
   * Write to system.log
   *
   * @return void
   */

    public function execute() {
        $sample = [];

        print_r($this->_transactions->getOrders(1));

        $apriori = new Apriori(0, 0);
        $apriori->train($sample, []);

        $L = $apriori->apriori();
    }

}
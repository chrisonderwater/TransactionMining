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
        $transactions = $this->_transactions->getTransactions();

        $apriori = new Apriori(0, 0);
        $apriori->train($transactions, []);
        $rules = $apriori->getRules();
        return $rules;

        // Sample for iterating through items.
        //$L = $apriori->apriori();
        //foreach($L as $items){
        //    print_r($apriori->predict($items));
        //}
        //var_dump($L);
    }

}
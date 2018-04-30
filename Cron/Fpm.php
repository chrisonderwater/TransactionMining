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
    protected $_rules;
    protected $_productRepository;
    protected $_objectManager;

    public function __construct(\Onderwater\TransactionMining\Model\Transactions $transactions,
    \Onderwater\TransactionMining\Model\Rules $rules, \Magento\Catalog\Api\ProductRepositoryInterface $productRepository) {
        $this->_transactions = $transactions;
        $this->_rules = $rules;
        $this->_productRepository = $productRepository;
        //$this->_objectManager = $objectManager;
    }

/**
   * Write to system.log
   *
   * @return void
   */

    public function execute() {
        $transactions = $this->_transactions->getTransactions();

        $apriori = new Apriori(0, 0.5);
        $apriori->train($transactions, []);
        $rules = $apriori->getRules();

        //Get Object Manager Instance
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

        foreach($rules as $rule){
            //$product = $this->productRepository->get($sku);
            $rules = $objectManager->create('Onderwater\TransactionMining\Model\Rules');
            $rules->setAntecedent(implode(",", $rule["antecedent"]));
            $rules->setConsequent(implode(",", $rule["consequent"]));
            $rules->setSupport($rule["support"]);
            $rules->setConfidence($rule["confidence"]);
            $rules->save();
        }

        return $rules;

        // Sample for iterating through items.
        //$L = $apriori->apriori();
        //foreach($L as $items){
        //    print_r($apriori->predict($items));
        //}
        //var_dump($L);
    }

}
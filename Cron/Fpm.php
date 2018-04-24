<?php
# Frequent pattern mining class.
# 

namespace Onderwater\TransactionMining\Cron;
use Phpml\Association\Apriori;
use Phpml\ModelManager;

class Fpm {

    public function __construct() {
    }

/**
   * Write to system.log
   *
   * @return void
   */

    public function execute() {
        $sample = [];

        $apriori = new Apriori(0, 0);
        $apriori->train($sample, []);

        $L = $apriori->apriori();
    }

}
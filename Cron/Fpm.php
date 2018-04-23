<?php
# Frequent pattern mining class.
# 

namespace Onderwater\TransactionMining\Cron;
use \Psr\Log\LoggerInterface;

class Fpm {
    protected $logger;

    public function __construct(LoggerInterface $logger) {
        $this->logger = $logger;
    }

/**
   * Write to system.log
   *
   * @return void
   */

    public function execute() {
        $this->logger->info('Cron Works');
    }

}
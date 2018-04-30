<?php
namespace Onderwater\TransactionMining\Block\Adminhtml;

class Transactions extends \Magento\Backend\Block\Widget\Grid\Container
{

    protected function _construct()
    {
        $this->_controller = 'adminhtml_transactions';
        $this->_blockGroup = 'Onderwater_TransactionMining';
        $this->_headerText = __('Rules');
        $this->_addButtonLabel = __('Create New Rule');
        parent::_construct();
    }
}
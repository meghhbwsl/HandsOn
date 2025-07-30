<?php
namespace New\FactoryTest\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class ProductLog extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('product_view_log', 'log_id');
    }
}

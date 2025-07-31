<?php
namespace New\FactoryTest\Model;

use Magento\Framework\Model\AbstractModel;

class ProductLog extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\New\FactoryTest\Model\ResourceModel\ProductLog::class);
    }
}

 
 
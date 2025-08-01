<?php
namespace New\PluginTest\Plugin;

use Psr\Log\LoggerInterface;

class AfterPlugin2
{
    protected $logger;
    public function __construct(LoggerInterface $logger) { $this->logger = $logger; }

    public function afterSave(\Magento\Catalog\Model\Product $subject, $result)
    {
        $this->logger->info('[AfterPlugin2] Product SKU: ' . $subject->getSku());
        return $result;
    }
}

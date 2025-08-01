<?php
namespace New\PluginTest\Controller\Test;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Catalog\Model\ProductFactory;

class Trigger extends Action
{
    protected $productFactory;

    public function __construct(
        Context $context,
        ProductFactory $productFactory
    ) {
        $this->productFactory = $productFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        // Get product ID from URL: ?product_id=23
        $productId = (int) $this->getRequest()->getParam('product_id');

        if (!$productId) {
            echo "Please provide a valid product_id in the URL like ?product_id=23";
            return;
        }

        $product = $this->productFactory->create()->load($productId);

        if (!$product->getId()) {
            echo "Product with ID $productId does not exist.";
            return;
        }

        $product->setName('Plugin Test Product');
        $product->save();

        echo "Product (ID: $productId) saved with Plugins.";
    }
}

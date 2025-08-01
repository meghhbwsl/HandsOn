<?php

namespace New\FactoryTest\Observer;


use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use New\FactoryTest\Model\ProductLogFactory;
use Magento\Customer\Model\Session;

class ProductViewObserver implements ObserverInterface
{
    protected $productLogFactory;
    protected $customerSession;

    public function __construct(
        ProductLogFactory $productLogFactory,
        Session $customerSession
    ) {
        $this->productLogFactory = $productLogFactory;
        $this->customerSession = $customerSession;
    }

    public function execute(Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();
        $productId = $product->getId();

        $customerId = $this->customerSession->isLoggedIn()
            ? $this->customerSession->getCustomerId()
            : null;

        $log = $this->productLogFactory->create();
        $log->setData([
            'product_id' => $productId,
            'customer_id' => $customerId,
            'viewed_at' => (new \DateTime())->format('Y-m-d H:i:s')
        ]);
        $log->save();
    }
}

<?php
namespace New\AdminMenu\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    const ADMIN_RESOURCE = 'New_AdminMenu::sub_menu';

    protected $resultPageFactory;

    public function __construct(Action\Context $context, PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('New_AdminMenu::sub_menu');
        $resultPage->getConfig()->getTitle()->prepend(__('Trainee Dashboard'));
        return $resultPage;
    }
}

<?php

namespace Magenest\Movie\Controller\Adminhtml\Movie;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class NewMovie extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->addBreadcrumb(__('NewMovie'), __('NewMovie'));
        $resultPage->addBreadcrumb(__('Adding New Movie'), __('Adding New Movie'));
        $resultPage->getConfig()->getTitle()->prepend(__('Adding New Movie'));
        return $resultPage;
    }

}
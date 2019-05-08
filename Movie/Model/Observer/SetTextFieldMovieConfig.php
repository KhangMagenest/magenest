<?php
namespace Magenest\Movie\Model\Observer;
use Magento\Framework\Event\ObserverInterface;

class SetTextFieldMovieConfig implements ObserverInterface
{
    /** @var \Psr\Log\LoggerInterface $logger */
    protected $logger;
    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $data = $observer->getRequestParams();

    }
}
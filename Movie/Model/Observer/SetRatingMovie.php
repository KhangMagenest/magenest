<?php
namespace Magenest\Movie\Model\Observer;
use Magento\Framework\Event\ObserverInterface;

class SetRatingMovie implements ObserverInterface
{
    /** @var \Psr\Log\LoggerInterface $logger */
    protected $logger;
    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $movie = $observer->getMovie();
        $movie->setRating(0);
        $this->logger->debug("Rating after set: " . $movie->getRating());
    }
}
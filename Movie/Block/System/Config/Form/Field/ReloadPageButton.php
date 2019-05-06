<?php
namespace Magenest\Movie\Block\System\Config\Form\Field;

use Magento\Framework\Data\Form\Element\AbstractElement;

class ReloadPageButton extends \Magento\Config\Block\System\Config\Form\Field
{
    protected function _getElementHtml(AbstractElement $element)
    {
        $urlInterface = \Magento\Framework\App\ObjectManager::getInstance()->get('Magento\Framework\UrlInterface');
        $url = $urlInterface->getCurrentUrl();
        $html = $this->getLayout()->createBlock(\Magento\Backend\Block\Widget\Button::class)
            ->setData(
                [
                    'id' => 'reload_page_button',
                    'label' => __('Reload'),
                ]
            )
            ->setOnClick("setLocation('$url')")
            ->toHtml();

        return $html;
    }
}
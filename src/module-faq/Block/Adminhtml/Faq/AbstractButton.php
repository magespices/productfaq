<?php
/**
 * Created by Q-Solutions Studio
 * Date: 16.03.2020
 *
 * @category    Magespices
 * @package     Magespices_Faq
 * @author      Maciej Buchert <maciej@qsolutionsstudio.com>
 */

namespace Magespices\Faq\Block\Adminhtml\Faq;

use Magento\Cms\Block\Adminhtml\Page\Edit\GenericButton;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class AbstractButton
 * @package Magespices\Faq\Block\Adminhtml\Faq
 */
abstract class AbstractButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * @var string
     */
    protected $path = '*';

    /**
     * @var string
     */
    protected $label = '*';

    /**
     * @var string
     */
    protected $classes = 'secondary';

    /**
     * @var int
     */
    protected $sortOrder = 1;

    /**
     * @var array
     */
    protected $dataAttribute = [];

    /**
     * @return array
     */
    public function getButtonData(): array
    {
        return [
            'label' => __($this->label),
            'class' => $this->classes,
            'sort_order' => $this->sortOrder,
            'on_click' => sprintf("location.href = '%s';", $this->getUrl($this->path)),
            'data_attribute' => $this->dataAttribute,
        ];
    }
}
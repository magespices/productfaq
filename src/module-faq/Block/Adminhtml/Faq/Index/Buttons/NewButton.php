<?php
/**
 * Created by Q-Solutions Studio
 * Date: 16.03.2020
 *
 * @category    Magespices
 * @package     Magespices_Faq
 * @author      Maciej Buchert <maciej@qsolutionsstudio.com>
 */

namespace Magespices\Faq\Block\Adminhtml\Faq\Index\Buttons;


use Magespices\Faq\Block\Adminhtml\Faq\AbstractButton;

/**
 * Class NewButton
 * @package Magespices\Faq\Block\Adminhtml\Faq\Index\Buttons
 */
class NewButton extends AbstractButton
{
    /**
     * @var string
     */
    protected $path = '*/*/add';

    /**
     * @var string
     */
    protected $label = 'New FAQ';

    /**
     * @var string
     */
    protected $classes = 'primary';
}
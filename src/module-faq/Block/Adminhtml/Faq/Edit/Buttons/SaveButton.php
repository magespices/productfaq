<?php
/**
 * Created by Q-Solutions Studio
 * Date: 16.03.2020
 *
 * @category    MagespicesS
 * @package     MagespicesS_Faq
 * @author      Maciej Buchert <maciej@qsolutionsstudio.com>
 */

namespace Magespices\Faq\Block\Adminhtml\Faq\Edit\Buttons;

use Magespices\Faq\Block\Adminhtml\Faq\AbstractButton;

/**
 * Class SaveButton
 * @package Magespices\Faq\Block\Adminhtml\Faq\Edit\Buttons
 */
class SaveButton extends AbstractButton
{
    /**
     * @var string
     */
    protected $path = '*/*/save';

    /**
     * @var string
     */
    protected $label = 'Save';

    /**
     * @var string
     */
    protected $classes = 'primary';
}
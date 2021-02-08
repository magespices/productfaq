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
 * Class BackButton
 * @package Magespices\Faq\Block\Adminhtml\Faq\Edit\Buttons
 */
class BackButton extends AbstractButton
{
    /**
     * @var string
     */
    protected $path = '*/*/index';

    /**
     * @var string
     */
    protected $label = 'Back';

    /**
     * @var string
     */
    protected $classes = 'back';

    /**
     * @var int
     */
    protected $sortOrder = 2;
}
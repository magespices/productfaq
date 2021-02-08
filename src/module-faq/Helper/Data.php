<?php
/**
 * Created by Q-Solutions Studio
 * Date: 16.03.2020
 *
 * @category    Magespices
 * @package     Magespices_Faq
 * @author      Maciej Buchert <maciej@qsolutionsstudio.com>
 */

namespace Magespices\Faq\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

/**
 * Class Data
 * @package Magespices\Faq\Helper
 */
class Data extends AbstractHelper
{
    /** @var string  */
    public const MODULE_NAME = 'Magespices_Faq';

    /** @var string  */
    public const FAQ_GENERAL_ENABLED_XPATH = 'faq/general/enabled';

    /** @var string  */
    public const FAQ_GENERAL_TITLE_XPATH = 'faq/general/title';

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag(self::FAQ_GENERAL_ENABLED_XPATH);
    }
    /**
     * @param string $path
     * @return mixed
     */
    public function getConfigValue(string $path)
    {
        return $this->scopeConfig->getValue($path);
    }
}
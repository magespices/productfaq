<?php
/**
 * Created by Q-Solutions Studio
 * Date: 16.03.2020
 *
 * @category    Magespices
 * @package     Magespices_Faq
 * @author      Maciej Buchert <maciej@qsolutionsstudio.com>
 */

namespace Magespices\Faq\Model;

use \Magento\Framework\Model\AbstractModel;

/**
 * Class Question
 * @package Magespices\Faq\Model
 */
class Question extends AbstractModel
{
    /** @var string  */
    public const ENTITY_ID = 'entity_id';

    /** @var string  */
    public const QUESTION = 'question';

    /** @var string  */
    public const ANSWER = 'answer';

    /** @var string  */
    public const SORT_ORDER = 'sort_order';

    /** @var string  */
    public const PRODUCT_ID = 'product_id';

    /** @var string  */

    public function _construct(): void
    {
        $this->_init(\Magespices\Faq\Model\ResourceModel\Question::class);
    }

    /**
     * @return array
     */
    public function getProductsAsArray(): array
    {
        return explode(',', $this->getData(self::PRODUCT_ID));
    }
}


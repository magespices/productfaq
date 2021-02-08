<?php
/**
 * Created by Q-Solutions Studio
 * Date: 16.03.2020
 *
 * @category    Magespices
 * @package     Magespices_Faq
 * @author      Maciej Buchert <maciej@qsolutionsstudio.com>
 */

namespace Magespices\Faq\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Question
 * @package Magespices\Faq\Model\ResourceModel
 */
class Question extends AbstractDb
{
    /** @var string  */
    const FAQ_QUESTION_TABLE = 'magespices_faq_question';

    public function _construct(): void
    {
        $this->_init(self::FAQ_QUESTION_TABLE, \Magespices\Faq\Model\Question::ENTITY_ID);
    }
}

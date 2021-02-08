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

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magespices\Faq\Setup\InstallSchema;

/**
 * Class Question
 * @package Magespices\Faq\Model\ResourceModel
 */
class Question extends AbstractDb
{
    public function _construct(): void
    {
        $this->_init(InstallSchema::Magespices_QUESTION_TABLE_NAME, \Magespices\Faq\Model\Question::ENTITY_ID);
    }
}


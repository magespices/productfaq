<?php
/**
 * Created by Q-Solutions Studio
 * Date: 16.03.2020
 *
 * @category    Magespices
 * @package     Magespices_Faq
 * @author      Maciej Buchert <maciej@qsolutionsstudio.com>
 */

namespace Magespices\Faq\Model\ResourceModel\Question;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package Magespices\Faq\Model\ResourceModel\Question
 */
class Collection extends AbstractCollection
{
    public function _construct(): void
    {
        $this->_init(\Magespices\Faq\Model\Question::class, \Magespices\Faq\Model\ResourceModel\Question::class);
    }
}

<?php
/**
 * Created by Q-Solutions Studio
 * Date: 16.03.2020
 *
 * @category    Magespices
 * @package     Magespices_Faq
 * @author      Maciej Buchert <maciej@qsolutionsstudio.com>
 */

namespace Magespices\Faq\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magespices\Faq\Model\Question;
use Zend_Db_Exception;

/**
 * Class InstallSchema
 * @package Magespices\Faq\Setup
 */
class InstallSchema implements InstallSchemaInterface
{
    /** @var string  */
    public const Magespices_QUESTION_TABLE_NAME = 'magespices_faq_question';

    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $table = $installer->getConnection()
            ->newTable($installer->getTable(self::Magespices_QUESTION_TABLE_NAME))
            ->addColumn(
                Question::ENTITY_ID,
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true,],
                'Entity ID'
            )->addColumn(
                Question::QUESTION,
                Table::TYPE_TEXT,
                255,
                ['nullable' => false,],
                'Question'
            )->addColumn(
                Question::ANSWER,
                Table::TYPE_TEXT,
                255,
                ['nullable' => false,],
                'Answer'
            )->addColumn(
                Question::SORT_ORDER,
                Table::TYPE_INTEGER,
                null,
                ['nullable' => false,],
                'Sort Order'
            )->addColumn(
                Question::PRODUCT_ID,
                Table::TYPE_TEXT,
                255,
                ['nullable' => false,],
                'Product ID'
            );
        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}
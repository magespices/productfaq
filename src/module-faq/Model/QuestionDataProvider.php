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

use Magento\Ui\DataProvider\AbstractDataProvider;
use Magespices\Faq\Model\ResourceModel\Question\Collection;
use Magespices\Faq\Model\ResourceModel\Question\CollectionFactory;

/**
 * Class QuestionDataProvider
 * @package Magespices\Faq\Model
 */
class QuestionDataProvider extends AbstractDataProvider
{
    /**
     * @var Collection
     */
    protected $collection;

    /**
     * @var array
     */
    protected $_loadedData = [];

    /**
     * QuestionDataProvider constructor.
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        string $name,
        string $primaryFieldName,
        string $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (!empty($this->_loadedData)) {
            return $this->_loadedData;
        }

        $items = $this->collection->getItems();

        /** @var Question $faq */
        foreach ($items as $question) {
            $this->_loadedData[$question->getId()] = $question->getData();
        }

        return $this->_loadedData;
    }
}
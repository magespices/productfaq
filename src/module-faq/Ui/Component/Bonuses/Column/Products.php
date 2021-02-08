<?php
/**
 * Created by Q-Solutions Studio
 * Date: 16.03.2020
 *
 * @category    Magespices
 * @package     Magespices_Faq
 * @author      Maciej Buchert <maciej@qsolutionsstudio.com>
 */

namespace Magespices\Faq\Ui\Component\Bonuses\Column;

use Magento\Catalog\Model\ProductRepository;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magespices\Faq\Model\Question;
use Magespices\Faq\Model\QuestionFactory;
use Magespices\Faq\Model\ResourceModel\Question as QuestionResourceModel;

/**
 * Class Products
 * @package Magespices\Faq\Ui\Component\Bonuses\Column
 */
class Products extends Column
{
    /**
     * @var QuestionFactory
     */
    protected $questionFactory;

    /**
     * @var QuestionResourceModel
     */
    protected $questionResourceModel;

    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * Products constructor.
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param QuestionFactory $questionFactory
     * @param QuestionResourceModel $questionResourceModel
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        QuestionFactory $questionFactory,
        QuestionResourceModel $questionResourceModel,
        ProductRepository $productRepository,
        array $components = [],
        array $data = []
    ) {
        $this->questionFactory = $questionFactory;
        $this->questionResourceModel = $questionResourceModel;
        $this->productRepository = $productRepository;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * @param array $dataSource
     * @return array
     * @throws NoSuchEntityException
     */
    public function prepareDataSource(array $dataSource): array
    {
        if (isset($dataSource['data']['items'])) {

            foreach ($dataSource['data']['items'] as &$item) {
                $item[$this->getData('name')] = $this->getProductsName($item['entity_id']);
            }
        }

        return $dataSource;
    }

    /**
     * @param int $entityId
     * @return string
     * @throws NoSuchEntityException
     */
    protected function getProductsName(int $entityId): string
    {
        /** @var Question $question */
        $question = $this->questionFactory->create();

        $productLabel = '';

        $this->questionResourceModel->load($question, $entityId);

        foreach($question->getProductsAsArray() as $productId) {
            $product = $this->productRepository->getById($productId);

            $productLabel .= $product->getName() . '<br/>';
        }

        return $productLabel;
    }
}
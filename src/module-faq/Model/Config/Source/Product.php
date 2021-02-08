<?php
/**
 * Created by Q-Solutions Studio
 * Date: 16.03.2020
 *
 * @category    Magespices
 * @package     Magespices_Faq
 * @author      Maciej Buchert <maciej@qsolutionsstudio.com>
 */

namespace Magespices\Faq\Model\Config\Source;

use Magento\Catalog\Model\ProductRepository;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Data\OptionSourceInterface;
use tests\unit\Util\TestDataArrayBuilder;

/**
 * Class Product
 * @package Magespices\Faq\Model\Config\Source
 */
class Product implements OptionSourceInterface
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    protected $searchCriteria;

    /**
     * @var array
     */
    protected $options;

    /**
     * Product constructor.
     * @param ProductRepository $productRepository
     * @param SearchCriteriaBuilder $searchCriteria
     */
    public function __construct(
        ProductRepository $productRepository,
        SearchCriteriaBuilder $searchCriteria
    )
    {
        $this->productRepository = $productRepository;
        $this->searchCriteria = $searchCriteria;
    }

    /**
     * @return array
     */
    public function toOptionArray(): array
    {
        if(!empty($this->options)) {
            return $this->options;
        }

        $filters = $this->searchCriteria->create();
        $products = $this->productRepository->getList($filters)->getItems();

        foreach($products as $product) {
            $this->options[] = ['value' => $product->getId(), 'label' => $product->getName()];
        }

        return $this->options;
    }
}
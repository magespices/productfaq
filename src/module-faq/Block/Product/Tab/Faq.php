<?php
/**
 * Created by Q-Solutions Studio
 * Date: 16.03.2020
 *
 * @category    Magespices
 * @package     Magespices_Faq
 * @author      Maciej Buchert <maciej@qsolutionsstudio.com>
 */

namespace Magespices\Faq\Block\Product\Tab;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Block\Product\Context;
use Magento\Catalog\Block\Product\View;
use Magento\Catalog\Helper\Product;
use Magento\Catalog\Model\ProductTypes\ConfigInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\Locale\FormatInterface;
use Magento\Framework\Pricing\PriceCurrencyInterface;
use Magento\Framework\Stdlib\StringUtils;
use Magespices\Faq\Helper\Data;
use Magespices\Faq\Model\Question;
use Magespices\Faq\Model\ResourceModel\Question\Collection;
use Magespices\Faq\Model\ResourceModel\Question\CollectionFactory;
use Zend_Filter_Exception;
use Zend_Filter_Interface;

/**
 * Class Faq
 * @package Magespices\Faq\Block\Product\Tab
 */
class Faq extends View
{
    /**
     * @var Data
     */
    protected $helper;

    /**
     * @var CollectionFactory
     */
    protected $questionCollectionFactory;

    /**
     * @var Zend_Filter_Interface
     */
    protected $templateProcessor;

    /**
     * Faq constructor.
     * @param Context $context
     * @param \Magento\Framework\Url\EncoderInterface $urlEncoder
     * @param \Magento\Framework\Json\EncoderInterface $jsonEncoder
     * @param StringUtils $string
     * @param Product $productHelper
     * @param ConfigInterface $productTypeConfig
     * @param FormatInterface $localeFormat
     * @param Session $customerSession
     * @param ProductRepositoryInterface $productRepository
     * @param PriceCurrencyInterface $priceCurrency
     * @param Data $helper
     * @param CollectionFactory $questionCollectionFactory
     * @param Zend_Filter_Interface $templateProcessor
     * @param array $data
     */
    public function __construct(
        Context $context,
        \Magento\Framework\Url\EncoderInterface $urlEncoder,
        \Magento\Framework\Json\EncoderInterface $jsonEncoder,
        StringUtils $string,
        Product $productHelper,
        ConfigInterface $productTypeConfig,
        FormatInterface $localeFormat,
        Session $customerSession,
        ProductRepositoryInterface $productRepository,
        PriceCurrencyInterface $priceCurrency,
        Data $helper,
        CollectionFactory $questionCollectionFactory,
        Zend_Filter_Interface $templateProcessor,
        array $data = []
    ) {
        $this->helper = $helper;
        $this->questionCollectionFactory = $questionCollectionFactory;
        $this->templateProcessor = $templateProcessor;
        parent::__construct($context, $urlEncoder, $jsonEncoder, $string, $productHelper, $productTypeConfig,
            $localeFormat, $customerSession, $productRepository, $priceCurrency, $data);
    }

    /**
     * @return Collection
     */
    public function getProductFaq(): Collection
    {
        /** @var Collection $collection */
        $collection = $this->questionCollectionFactory->create();
        $collection->addFieldToFilter(Question::PRODUCT_ID, ['like' => '%' . $this->getProduct()->getId() . '%' ])
            ->setOrder(Question::SORT_ORDER, 'ASC');
        return $collection;
    }

    /**
     * @param string $content
     * @return string
     * @throws Zend_Filter_Exception
     */
    public function processContent(string $content): string
    {
        return $this->templateProcessor->filter($content);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->helper->getConfigValue(Data::FAQ_GENERAL_TITLE_XPATH);
    }

    /**
     * @return string
     */
    protected function _toHtml(): string
    {
        if(!$this->helper->isEnabled() || !$this->getProductFaq()->count()) {
            return '';
        }
        return parent::_toHtml();
    }
}
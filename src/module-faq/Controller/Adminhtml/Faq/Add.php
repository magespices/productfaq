<?php
/**
 * Created by Q-Solutions Studio
 * Date: 16.03.2020
 *
 * @category    Magespices
 * @package     Magespices_Faq
 * @author      Maciej Buchert <maciej@qsolutionsstudio.com>
 */

namespace Magespices\Faq\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Forward;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Framework\View\Result\PageFactory;
use Magespices\Faq\Controller\Adminhtml\AbstractFaq;
use Magespices\Faq\Helper\Data;
use Magespices\Faq\Model\QuestionFactory;
use Magespices\Faq\Model\ResourceModel\Question as QuestionResourceModel;

/**
 * Class Add
 * @package Magespices\Faq\Controller\Adminhtml\Faq
 */
class Add extends AbstractFaq
{
    /** @var string  */
    public const MENU_ITEM = 'Magespices_Faq::management';

    /**
     * @var ForwardFactory
     */
    protected $resultForwardFactory;

    /**
     * Add constructor.
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param QuestionFactory $questionFactory
     * @param QuestionResourceModel $questionResourceModel
     * @param Data $helper
     * @param ForwardFactory $resultForwardFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        QuestionFactory $questionFactory,
        QuestionResourceModel $questionResourceModel,
        Data $helper,
        ForwardFactory $resultForwardFactory
    ) {
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context, $resultPageFactory, $questionFactory, $questionResourceModel, $helper);
    }

    /**
     * @return Forward
     */
    public function execute(): Forward
    {
        $resultForward = $this->resultForwardFactory->create();
        $resultForward->forward('edit');

        return $resultForward;
    }
}
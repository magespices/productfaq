<?php
/**
 * Created by Q-Solutions Studio
 * Date: 16.03.2020
 *
 * @category    Magespices
 * @package     Magespices_Faq
 * @author      Maciej Buchert <maciej@qsolutionsstudio.com>
 */

namespace Magespices\Faq\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Magespices\Faq\Helper\Data;
use Magespices\Faq\Model\Question;
use Magespices\Faq\Model\QuestionFactory;
use Magespices\Faq\Model\ResourceModel\Question as QuestionResourceModel;

/**
 * Class AbstractFaq
 * @package Magespices\Faq\Controller\Adminhtml
 */
abstract class AbstractFaq extends Action
{
    /** @var string  */
    public const ADMIN_RESOURCE = 'Magespices_Faq::management';

    /** @var string  */
    public const MENU_ITEM = 'Magespices_Faq::menu';

    /** @var string  */
    public const PAGE_TITLE = 'FAQ';

    /**
     * @var PageFactory
     */
    protected $_resultPageFactory;

    /**
     * @var QuestionFactory
     */
    protected $questionFactory;

    /**
     * @var QuestionResourceModel
     */
    protected $questionResourceModel;

    /**
     * @var Data
     */
    protected $helper;

    /**
     * AbstractFaq constructor.
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param QuestionFactory $questionFactory
     * @param QuestionResourceModel $questionResourceModel
     * @param Data $helper
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        QuestionFactory $questionFactory,
        QuestionResourceModel $questionResourceModel,
        Data $helper
    ) {
        $this->_resultPageFactory = $resultPageFactory;
        $this->questionFactory = $questionFactory;
        $this->questionResourceModel = $questionResourceModel;
        $this->helper = $helper;
        parent::__construct($context);
    }

    /**
     * @param RequestInterface $request
     * @return ResponseInterface|Redirect
     */
    public function dispatch(RequestInterface $request)
    {
        if(!$this->helper->isEnabled()) {
            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setPath('adminhtml');

            $this->messageManager->addErrorMessage(__('FAQ Module is disabled'));

            return $resultRedirect;
        }

        return parent::dispatch($request);
    }

    /**
     * @return Page|Redirect
     */
    public function execute()
    {
        $resultPage = $this->_resultPageFactory->create();

        $resultPage->setActiveMenu(static::MENU_ITEM);
        $resultPage->getConfig()->getTitle()->prepend((__(static::PAGE_TITLE)));

        return $resultPage;
    }

    /**
     * @return Question|null
     */
    protected function _initQuestion(): ?Question
    {
        $questionId = $this->getRequest()->getParam('entity_id');

        /** @var Question $question */
        $question = $this->questionFactory->create();

        if($questionId) {
            $this->questionResourceModel->load($question, $questionId);
            if($question->isEmpty()) {
                $this->messageManager->addErrorMessage(__('This question no longer exists.'));
                return null;
            }
        }

        return $question;
    }
}
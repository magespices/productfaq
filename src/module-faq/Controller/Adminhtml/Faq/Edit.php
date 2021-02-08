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

use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\View\Result\Page;
use Magespices\Faq\Controller\Adminhtml\AbstractFaq;

/**
 * Class Edit
 * @package Magespices\Faq\Controller\Adminhtml\Faq
 */
class Edit extends AbstractFaq
{
    /** @var string  */
    public const MENU_ITEM = 'Magespices_Faq::management';

    /** @var string  */
    public const PAGE_TITLE = 'Edit Faq';

    /**
     * @return Redirect|Page
     */
    public function execute()
    {
        $question = $this->_initQuestion();

        if(!$question) {
            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setPath('*/*/index');
            return $resultRedirect;
        }

        $resultPage = parent::execute();

        if($question->isObjectNew()) {
            $resultPage->getConfig()->getTitle()->prepend(__('Create new FAQ'));
        }

        return $resultPage;
    }
}
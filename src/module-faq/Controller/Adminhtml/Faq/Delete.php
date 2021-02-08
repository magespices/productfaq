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
use Magespices\Faq\Controller\Adminhtml\AbstractFaq;

/**
 * Class Delete
 * @package Magespices\Faq\Controller\Adminhtml\Faq
 */
class Delete extends AbstractFaq
{
    /** @var string  */
    public const MENU_ITEM = 'Magespices_Faq::management';

    /**
     * @return Redirect
     */
    public function execute(): Redirect
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('*/*/index');

        $question = $this->_initQuestion();

        if(!$question) {
            return $resultRedirect;
        }

        try {
            $this->questionResourceModel->delete($question);
            $this->messageManager->addSuccessMessage(__('Faq deleted!'));
        } catch (\Exception $exception) {
            $this->messageManager->addErrorMessage($exception->getMessage());

        }

        return $resultRedirect;
    }
}
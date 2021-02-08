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
use Magespices\Faq\Model\Question;

/**
 * Class Save
 * @package Magespices\Faq\Controller\Adminhtml\Faq
 */
class Save extends AbstractFaq
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

        if($this->getRequest()->isPost()) {
            $question = $this->_initQuestion();

            if(!$question) {
                return $resultRedirect;
            }

            $requestData = $this->getRequest()->getParams();

            try {
                $question->setData($requestData);
                $question->setData(Question::PRODUCT_ID, implode(',',$requestData['product_id']));
                $this->questionResourceModel->save($question);

                $this->messageManager->addSuccessMessage(__('Faq saved!'));
            } catch (\Exception $exception) {
                $this->messageManager->addErrorMessage($exception->getMessage());
            }
        }

        return $resultRedirect;
    }
}
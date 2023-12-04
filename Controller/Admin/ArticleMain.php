<?php

namespace rench\EasePayInstallment\Controller\Admin;

class ArticleMain extends ArticleMain_parent
{
    public function save()
    {
        parent::save();
        $oConfig = $this->getConfig();
        $aParams = $oConfig->getRequestParameter('editval');
        $oArticle = oxNew(\OxidEsales\Eshop\Application\Model\Article::class);

        if ($oArticle->load($aParams['oxarticles__oxid'])) {
            $this->processArticleData($oArticle, $aParams);
        }
    }

    private function processArticleData($oArticle, $aParams)
    {
        try {
            $this->validatePrepayment($oArticle, $aParams['oxarticles__initial_installment_amount']);
            $this->validateNumberOfMonths($oArticle, $aParams['oxarticles__total_installment_months']);
        } catch (\OxidEsales\Eshop\Core\Exception\ArticleInputException $oEx) {
            $oArticle->oxarticles__initial_installment_amount->setValue(0);
            $oArticle->oxarticles__total_installment_months->setValue(0);
            $oArticle->save();
            \OxidEsales\Eshop\Core\Registry::getUtilsView()->addErrorToDisplay($oEx);
        }
    }

    private function validatePrepayment($oArticle, $prepayment)
    {
        if (is_numeric($prepayment) && $prepayment > 0 && $prepayment < $oArticle->oxarticles__oxprice->value) {
            // Предоплата валидна
        } else {
            $oArticle->oxarticles__initial_installment_amount->setValue(0);
            $messageKey = 'INVALID_PREPAYMENT_AMOUNT';
            $this->throwInputException($messageKey);
        }
    }

    private function validateNumberOfMonths($oArticle, $numberOfMonths)
    {
        $numberOfMonths = filter_var($numberOfMonths, FILTER_VALIDATE_INT);
        if ($numberOfMonths > 0) {
            // Количество месяцев валидно
        } else {
            $oArticle->oxarticles__total_installment_months->setValue(0);
            $messageKey = 'INVALID_NUMBER_OF_MONTHS';
            $this->throwInputException($messageKey);
        }
    }

    private function throwInputException($messageKey)
    {
        $message = oxNew(\OxidEsales\Eshop\Core\Exception\ArticleInputException::class);
        $message->setMessage($messageKey);
        throw $message;
    }
}

<?php

namespace rench\EasePayInstallment\Model;

class Article extends Article_parent {


    public function calculateMonthlyPayment()
    {
        $totalPrice = (float) $this->oxarticles__oxprice->value;
        $initialPayment = (float) $this->oxarticles__initial_installment_amount->value;
        $installmentMonths = (int) $this->oxarticles__total_installment_months->value;

        if ($installmentMonths <= 0) {
            // Если количество месяцев недопустимо, возвращаем ноль.
            return 0;
        }

        return round(($totalPrice - $initialPayment) / $installmentMonths, 2);
    }


    public function isInstallmentAvailable()
    {
        $initialPayment = (float) $this->oxarticles__initial_installment_amount->value;
        $installmentMonths = (int) $this->oxarticles__total_installment_months->value;
        $totalPrice = (float) $this->oxarticles__oxprice->value;

        return $initialPayment > 0 && $installmentMonths > 0 && $totalPrice > $initialPayment;
    }
}

[{$smarty.block.parent}]
<tr>
    <td class="edittext">
        [{oxmultilang ident="PREPAYMENT_AMOUNT"}]  ([{$oActCur->sign}])
    </td>
    <td class="edittext">
        <input type="text" class="editinput" size="32" maxlength="[{$edit->oxarticles__initial_installment_amount->fldmax_length}]" name="editval[oxarticles__initial_installment_amount]" value="[{$edit->oxarticles__initial_installment_amount->value}]" [{$readonly}]>
    </td>
</tr>
<tr>
    <td class="edittext">
        [{oxmultilang ident="INSTALLMENT_PERIOD"}]
    </td>
    <td>
        <input type="text" class="editinput" size="28" maxlength="[{$edit->oxarticles__total_installment_months->fldmax_length}]" name="editval[oxarticles__total_installment_months]" value="[{$edit->oxarticles__total_installment_months->value}]" [{$readonly}]>
        [{oxinputhelp ident="NUM_INSTALLMENT_MONTHS"}]
    </td>
</tr>

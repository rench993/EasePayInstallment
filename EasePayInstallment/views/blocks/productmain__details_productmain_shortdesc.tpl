[{$smarty.block.parent}]

[{if $oDetailsProduct->isInstallmentAvailable()}]
  <button type="button" id="installmentButton" class="installment-btn">[{oxmultilang ident="INSTALLMENT_LEARN_MORE"}]</button>

  <div id="installmentModal" class="installment-modal">
    <div class="installment-modal-content">
      <span class="installment-modal-close">&times;</span>

      <div class="installment-modal-info">
        <h3>[{oxmultilang ident="INSTALLMENT_INFO"}]</h3>
        <p>[{oxmultilang ident="INSTALLMENT_SUM"}] <span id="productPrice">[{$oDetailsProduct->oxarticles__oxprice->value}][{$currency->sign}]</span></p>
        <p><label for="installmentPrepayment">[{oxmultilang ident="INSTALLMENT_PREPAYMENT"}]</label>
          <span id="installmentPrepayment"> [{$oDetailsProduct->oxarticles__initial_installment_amount->value}][{$currency->sign}]</span></p>

        <label for="installmentMonths">[{oxmultilang ident="INSTALLMENT_DURATION"}]</label>
        <span id="installmentMonths"> [{$oDetailsProduct->oxarticles__total_installment_months->value}]</span>

        <p>[{oxmultilang ident="INSTALLMENT_MONTHLY_RATE"}] <span id="monthlyPayment"> [{$oDetailsProduct->calculateMonthlyPayment()}][{$currency->sign}]</span></p>
      </div>
    </div>
  </div>

  <script>

    var modal = document.getElementById('installmentModal');
    var btn = document.getElementById('installmentButton');
    var span = document.getElementsByClassName('installment-modal-close')[0];


    btn.onclick = function() {
      modal.style.display = 'block';

    }

    span.onclick = function() {
      modal.style.display = 'none';
    }

    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = 'none';
      }
    }
  </script>
<style>

  .installment-modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
  }


  .installment-modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 50%;
    border-radius: 5px;
  }


  .installment-modal-close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .installment-modal-close:hover,
  .installment-modal-close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
  }

</style>
  [{/if}]

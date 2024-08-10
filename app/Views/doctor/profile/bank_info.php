<div class="crancy-paymentm crancy__item-group">
  <h4 class="crancy__item-group__title crancy-no-border mg-btm-5">
    Your Bank Details
  </h4>
  <div class="row align-items-center">
    <div class="col-lg-8 col-md-7 col-12">
      <!-- Sign in Form -->
      <form class="crancy-wc__form-main crancy-wc__form-main p-0" id="updateBankInfoForm">
        <div id="passSuccess" class="alert alert-success d-none"></div>
        <div id="passError" class="alert alert-danger d-none"></div>

        <div class="form-group">
          <?= csrf_field() ?>
          <label class="crancy-wc__form-label">Full Name</label>
          <div class="form-group__input">
            <input class="crancy-wc__form-input" name="full_name" placeholder="Full Name" id="fullName" type="text" minlength="2" required="required">
            <?php
            if (isset($validation)) :
              if ($validation->hasError('full_name')) : ?>
                <span class="errMsg"><?= $validation->getError('full_name') ?></span>
            <?php endif;
            endif; ?>
          </div>
        </div>
        <div class="form-group">
          <label class="crancy-wc__form-label">Bank Name</label>
          <div class="form-group__input">
            <input class="crancy-wc__form-input" name="bank_name" placeholder="Bank Name" id="bankName" type="text" minlength="3" required="required">
            <?php
            if (isset($validation)) :
              if ($validation->hasError('bank_name')) : ?>
                <span class="errMsg"><?= $validation->getError('bank_name') ?></span>
            <?php endif;
            endif; ?>
          </div>
        </div>
        <div class="form-group">
          <label class="crancy-wc__form-label">Account Number</label>
          <div class="form-group__input">
            <input class="crancy-wc__form-input" name="account_number" placeholder="Account Number" id="accNumber" type="text" minlength="5" required="required">
            <?php
            if (isset($validation)) :
              if ($validation->hasError('account_number')) : ?>
                <span class="errMsg"><?= $validation->getError('account_number') ?></span>
            <?php endif;
            endif; ?>
          </div>
        </div>
        <div class="form-group">
          <label class="crancy-wc__form-label">IFSC Code</label>
          <div class="form-group__input">
            <input class="crancy-wc__form-input" name="ifsc_routing" placeholder="IFSC Code" id="ifscCode" type="text" minlength="5" required="required">
            <?php
            if (isset($validation)) :
              if ($validation->hasError('ifsc_routing')) : ?>
                <span class="errMsg"><?= $validation->getError('ifsc_routing') ?></span>
            <?php endif;
            endif; ?>
          </div>
        </div>
        <div class="form-group">
          <label class="crancy-wc__form-label">Bank Addreess</label>
          <div class="form-group__input">
            <input class="crancy-wc__form-input" name="bank_address" placeholder="Bank Address" id="bankAddress" type="text" minlength="5" required="required">
            <?php
            if (isset($validation)) :
              if ($validation->hasError('bank_address')) : ?>
                <span class="errMsg"><?= $validation->getError('bank_address') ?></span>
            <?php endif;
            endif; ?>
          </div>
        </div>
        <div class="form-group">
          <label class="crancy-wc__form-label">Postal Code</label>
          <div class="form-group__input">
            <input class="crancy-wc__form-input" name="postal_code" placeholder="Postal Code" id="postalCode" type="text" minlength="5" required="required">
            <?php
            if (isset($validation)) :
              if ($validation->hasError('postal_code')) : ?>
                <span class="errMsg"><?= $validation->getError('postal_code') ?></span>
            <?php endif;
            endif; ?>
          </div>
        </div>
        <div class="form-group">
          <button href="#" class="crancy-btn">Save</button>
        </div>
      </form>
      <!-- End Sign in Form -->
    </div>
    <div class="col-lg-4 col-md-5 col-12">
      <div class="crancy-password__img">
        <img src="<?= INNER_IMAGES_PATH . 'password-reset.png'; ?>" alt="">
      </div>
    </div>
  </div>
</div>
<script>
  var updateBankInfo = '<?= base_url('doctor/add_bank_details') ?>';
</script>
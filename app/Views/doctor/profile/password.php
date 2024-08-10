<div class="crancy-paymentm crancy__item-group">
    <h4 class="crancy__item-group__title crancy-no-border mg-btm-5">
        Update Your Password
    </h4>
    <div class="row align-items-center">
        <div class="col-lg-8 col-md-7 col-12">
            <!-- Sign in Form -->
            <form class="crancy-wc__form-main crancy-wc__form-main p-0" id="updatePasswordForm">
                <div id="passSuccess" class="alert alert-success d-none"></div>
                <div id="passError" class="alert alert-danger d-none"></div>
              
                <div class="form-group">
                    <?= csrf_field() ?>
                    <label class="crancy-wc__form-label">Old Password</label>
                    <div class="form-group__input">
                        <input class="crancy-wc__form-input" placeholder="●●●●●●●●" id="password-field" type="password" name="old_password" autocomplete="current-password" minlength="8" required="required">
                        <?php
                        if (isset($validation)) :
                            if ($validation->hasError('old_password')) : ?>
                                <span class="errMsg"><?= $validation->getError('old_password') ?></span>
                        <?php endif;
                        endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="crancy-wc__form-label">New Password</label>
                    <div class="form-group__input">
                        <input class="crancy-wc__form-input" placeholder="●●●●●●●●" id="new-password-field" type="password" name="password" autocomplete="new-password" minlength="8" required="required">
                        <?php
                        if (isset($validation)) :
                            if ($validation->hasError('password')) : ?>
                                <span class="errMsg"><?= $validation->getError('password') ?></span>
                        <?php endif;
                        endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="crancy-wc__form-label">Re-enter Password</label>
                    <div class="form-group__input">
                        <input class="crancy-wc__form-input" placeholder="●●●●●●●●" id="re-password-field" type="password" name="confirm_password" autocomplete="confirm-password" minlength="8" required="required">
                        <?php
                        if (isset($validation)) :
                            if ($validation->hasError('confirm_password')) : ?>
                                <span class="errMsg"><?= $validation->getError('confirm_password') ?></span>
                        <?php endif;
                        endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <button href="#" class="crancy-btn">
                        Changed Password
                    </button>
                </div>
            </form>
            <!-- End Sign in Form -->
        </div>
        <div class="col-lg-4 col-md-5 col-12">
            <div class="crancy-password__img">
                <img src="<?= INNER_IMAGES_PATH .'password-reset.png'; ?>" alt="">
            </div>
        </div>
    </div>
</div>
<script>
    var updatePassword = '<?= base_url('doctor/update_password') ?>';
</script>
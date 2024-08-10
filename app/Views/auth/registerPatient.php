<?= $this->extend("layouts/auth") ?>

<?= $this->section("body") ?>
<div class="container-reg">
  <!-- Image Container -->
  <div class="image-container-reg text-center mb-4">
    <img src="/public/auth/images/partner-reg-left.png" alt="Check Image" class="img-fluid" style="max-width: 100%; height: auto;">
  </div>

  <!-- Registration Form Container -->
  <div class="form-container-reg">
    <?= $this->include('auth/registerHeaderTab') ?>
    <form id="registerForm" action="<?= base_url('register-patient') ?>" method="POST">
      <div class="row">
        <?= csrf_field() ?>
        <!-- CSRF Token -->
        <div id="errorContainer" class="alert alert-danger col-lg-12" style="display: none;">
          <button type="button" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <span id="errorMessage"></span>
        </div>

        <!-- First Name patient-->
        <div class="input-group col-lg-6 mb-4">
          <div class="input-group-prepend">
            <span class="input-group-text bg-white px-4 border-md border-right-0">
              <i class="fa fa-user text-muted"></i>
            </span>
          </div>
          <input type="hidden" name="user_type" value="3">
          <input id="firstName" type="text" name="first_name" value="<?= set_value('first_name') ?>" placeholder="First Name" class="form-control bg-white border-left-0 border-md">
          <?php
          if (isset($validation)) :
            if ($validation->hasError('first_name')) : ?>
              <span class="errMsg"><?= $validation->getError('first_name') ?></span>
          <?php endif;
          endif; ?>
        </div>

        <!-- Last Name -->
        <div class="input-group col-lg-6 mb-4">
          <div class="input-group-prepend">
            <span class="input-group-text bg-white px-4 border-md border-right-0">
              <i class="fa fa-user text-muted"></i>
            </span>
          </div>
          <input id="lastName" type="text" name="last_name" value="<?= set_value('last_name') ?>" placeholder="Last Name" class="form-control bg-white border-left-0 border-md">
          <?php
          if (isset($validation)) :
            if ($validation->hasError('last_name')) : ?>
              <span class="errMsg"><?= $validation->getError('last_name') ?></span>
          <?php endif;
          endif; ?>
        </div>

        <!-- Date of Birth -->
        <div class="input-group col-lg-6 mb-4">
          <div class="input-group-prepend">
            <span class="input-group-text bg-white px-4 border-md border-right-0">
              <i class="fa fa-calendar text-muted"></i>
            </span>
          </div>
          <input id="dob" type="text" name="dob" value="<?= set_value('dob') ?>" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control bg-white border-left-0 border-md" value="Date of Birth" placeholder="Date of Birth">
          <?php if (isset($validation)) :
            if ($validation->hasError('dob')) : ?>
              <span class="errMsg"><?= $validation->getError('dob') ?></span>
          <?php endif;
          endif; ?>
        </div>

        <!-- Email -->
        <div class="input-group col-lg-6 mb-4">
          <div class="input-group-prepend">
            <span class="input-group-text bg-white px-4 border-md border-right-0">
              <i class="fa fa-envelope text-muted"></i>
            </span>
          </div>
          <input id="email" type="email" name="email" value="<?= set_value('email') ?>" placeholder="Email" class="form-control bg-white border-left-0 border-md">
          <?php if (isset($validation)) :
            if ($validation->hasError('email')) : ?>
              <span class="errMsg"><?= $validation->getError('email') ?></span>
          <?php endif;
          endif; ?>
        </div>

        <!-- Country Code -->
        <div class="input-group col-lg-6 mb-4">
          <div class="input-group-prepend">
            <span class="input-group-text bg-white px-4 border-md border-right-0">
              <i class="fa fa-globe text-muted"></i>
            </span>
          </div>
          <select id="countryCode" name="country_code" class="form-control bg-white border-left-0 border-md">
            <option value="" disabled selected hidden>Country Code</option>
            <?php
            if (!empty($countryCodes)) : ?>
              <?php foreach ($countryCodes as $ccode) : ?>
                <option value="<?= $ccode['country_id'] ?>" <?= set_select('country_code', $ccode['country_id']) ?>>
                  <?= $ccode['country_code'] ?> (<?= $ccode['short_name'] ?>)
                </option>
              <?php endforeach; ?>
            <?php else : ?>
              <option value="">No Country Codes Available</option>
            <?php endif; ?>
          </select>
          <?php if (isset($validation)) :
            if ($validation->hasError('country_code')) : ?>
              <span class="errMsg"><?= $validation->getError('country_code') ?></span>
          <?php endif;
          endif; ?>
        </div>

        <!-- Mobile Number -->
        <div class="input-group col-lg-6 mb-4">
          <div class="input-group-prepend">
            <span class="input-group-text bg-white px-4 border-md border-right-0">
              <i class="fa fa-phone-square text-muted"></i>
            </span>
          </div>
          <input id="mobileNumber" type="text" name="phone" placeholder="Mobile Number" value="<?= set_value('phone') ?>" class="form-control bg-white border-left-0 border-md">
          <?php if (isset($validation)) :
            if ($validation->hasError('phone')) : ?>
              <span class="errMsg"><?= $validation->getError('phone') ?></span>
          <?php endif;
          endif; ?>
        </div>

        <!-- Timezone -->
        <div class="input-group col-lg-6 mb-4">
          <div class="input-group-prepend">
            <span class="input-group-text bg-white px-4 border-md border-right-0">
              <i class="fa fa-globe text-muted"></i>
            </span>
          </div>

          <select id="timezone" name="time_zone" class="form-control bg-white border-left-0 border-md">
            <option value="" disabled selected hidden>Time Zone</option>
            <?php if (!empty($timeZones)) : ?>
              <?php foreach ($timeZones as $timeZone) : ?>
                <option value="<?= $timeZone['id'] ?>" <?= set_select('time_zone', $timeZone['id']) ?>>
                  <?= $timeZone['name'] ?>
                </option>
              <?php endforeach; ?>
            <?php else : ?>
              <option value="">No Country Codes Available</option>
            <?php endif; ?>
          </select>
          <?php if (isset($validation)) :
            if ($validation->hasError('time_zone')) : ?>
              <span class="errMsg"><?= $validation->getError('time_zone') ?></span>
          <?php endif;
          endif; ?>
        </div>

        <!-- Gender -->
        <div class="input-group col-lg-6 mb-4">
          <div class="input-group-prepend">
            <span class="input-group-text bg-white px-4 border-md border-right-0">
              <i class="fa fa-globe text-muted"></i>
            </span>
          </div>
          <select id="gender" name="gender" class="form-control bg-white border-left-0 border-md">
            <option value="" disabled="" selected="" hidden="">Gender</option>
            <option value="Male" <?= set_select('gender', 'Male') ?>>Male</option>
            <option value="Female" <?= set_select('gender', 'Female') ?>>Female</option>
            <option value="Other" <?= set_select('gender', 'Other') ?>>Other</option>
          </select>
          <?php if (isset($validation)) :
            if ($validation->hasError('gender')) : ?>
              <span class="errMsg"><?= $validation->getError('gender') ?></span>
          <?php endif;
          endif; ?>
        </div>
        <!-- Password -->
        <div class="input-group col-lg-6 mb-4">
          <div class="input-group-prepend">
            <span class="input-group-text bg-white px-4 border-md border-right-0">
              <i class="fa fa-key text-muted"></i>
            </span>
          </div>
          <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md">
          <?php if (isset($validation)) :
            if ($validation->hasError('password')) : ?>
              <span class="errMsg"><?= $validation->getError('password') ?></span>
          <?php endif;
          endif; ?>
        </div>

        <!-- Confirm Password -->
        <div class="input-group col-lg-6 mb-4">
          <div class="input-group-prepend">
            <span class="input-group-text bg-white px-4 border-md border-right-0">
              <i class="fa fa-key text-muted"></i>
            </span>
          </div>
          <input id="confirmPassword" type="password" name="confirm_password" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md">
          <?php if (isset($validation)) :
            if ($validation->hasError('confirm_password')) : ?>
              <span class="errMsg"><?= $validation->getError('confirm_password') ?></span>
          <?php endif;
          endif; ?>
        </div>

        <!-- Captcha and Terms of Service -->
        <div class="input-group col-lg-6 mb-4">
          <div class="g-recaptcha" data-sitekey="<?= $_ENV['RECAPTCHA_SITE_KEY'] ?>" data-size="no"></div>
          <?php if (!empty($errors['recaptcha'])) : ?>
            <span class="errMsg" style="margin-top: 77px;"><?php echo $errors['recaptcha']; ?></span>
          <?php endif; ?>
        </div>
        <div class="input-group col-lg-6 mb-4" style="padding-left:30px;">
          <div class="tacbox d-flex align-items-center">
            <input id="checkbox" type="checkbox" name="is_terms_of_use" class="checkmarks" value="1" <?= set_checkbox('is_accept_privacy_policy', '1') ?> style="width: 20px; height: 20px;">
            <label for="checkbox" class="terms mb-0 ml-2" style="font-size: 15px; color:#000">
              I have read and agree to
              <a href="#" class="policy">Consent Policy,</a>
              <a href="#" class="policy">Terms Of Use,</a>
              <a href="#" class="policy">Privacy Statement</a>
            </label>
            <?php if (isset($validation)) :
              if ($validation->hasError('is_terms_of_use')) : ?>
                <span class="errMsg"><?= $validation->getError('is_terms_of_use') ?></span>
            <?php endif;
            endif; ?>
          </div>
        </div>


        <!-- Submit Button -->
        <div class="form-group col-lg-12 mx-auto mb-0">
          <button type="submit" class="btn btn-submit btn-block py-2">
            <span class="font-weight-bold">Create your account</span>
          </button>

        </div>

        <!-- Divider Text -->
        <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-2">
          <div class="border-bottom w-100 ml-5"></div>
          <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
          <div class="border-bottom w-100 mr-5"></div>
        </div>

        <!-- Already Registered -->
        <div class="text-center w-100">
          <p class="text-muted font-weight-bold">Already Registered? <a href="<?= base_url('login-patient') ?>" class="login-text ml-2">Login</a></p>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
  // Function to inject CSS into the iframe
  function injectCSSIntoIframe(iframe) {
    var iframeDocument = iframe.contentDocument || iframe.contentWindow.document;

    // Check if the iframe is accessible
    if (iframeDocument) {
      var style = iframeDocument.createElement('style');
      style.type = 'text/css';
      style.innerHTML = `
                #rc-anchor-container {
                    width: 265px;
                }
                .rc-anchor-content {
                    width: 174px;
                }
                .rc-anchor-content .rc-inline-block:nth-of-type(2) {
                    width: 110px;
                }
            `;
      iframeDocument.head.appendChild(style);
      console.log('CSS injected into iframe');
    } else {
      console.error("Iframe document is not accessible.");
    }
  }

  // Polling function to check for iframe load
  function checkIframeAndInjectCSS() {
    var container = document.querySelector('.g-recaptcha');
    if (container) {
      var iframe = container.querySelector('iframe');
      if (iframe) {
        iframe.onload = () => injectCSSIntoIframe(iframe);
        return true; // Found and handled
      }
    }
    return false; // Not found or not loaded yet
  }

  // Polling to check periodically
  function startPolling() {
    var interval = setInterval(function() {
      if (checkIframeAndInjectCSS()) {
        clearInterval(interval);
      }
    }, 1000); // Check every second
  }

  // Start polling after the page is loaded
  window.onload = function() {
    startPolling();
  };
</script>
<?= $this->endSection() ?>
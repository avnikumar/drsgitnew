<?= $this->extend("layouts/auth") ?>

<?= $this->section("body") ?>
<?php
$uri = service('uri');
$segment1 = $uri->getSegment(1);
?>
<div class="container-reg">
    <!-- Image Container -->
    <div class="image-container-reg text-center mb-4">
        <img src="/public/auth/images/partner-reg-left.png" alt="Check Image" style="max-width: 100%; height: auto;">
    </div>

    <!-- Sign In Form Container -->
    <div class="form-container-reg">

        <?= $this->include('auth/loginHeaderTab') ?>
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <?php if ($segment1 == 'login-patient') { ?>
            <form method="POST" action="<?= base_url('login-patient') ?>">
            <?php } elseif ($segment1 == 'login-doctor') { ?>
                <form method="POST" action="<?= base_url('login-doctor') ?>">
                <?php } elseif ($segment1 == 'login-partner') { ?>
                    <form method="POST" action="<?= base_url('login-partner') ?>">
                    <?php } else {
                } ?>
                    <div class="row">
                    <div class="input-group col-md-12 mb-4">
                        <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-globe text-muted"></i>
                        </span>
                        </div>
                        <select id="redirectSelect" name="signin_type" onchange="redirectToLink()" class="form-control bg-white border-left-0 border-md" required>
                            <option value="" disabled="" selected="" hidden="">Select Signin Type</option>
                            <option value="<?= base_url('login-patient') ?>" <?= $segment1 == 'login-patient'?'selected':''; ?>>Patient</option>
                            <option value="<?= base_url('login-doctor') ?>" <?= $segment1 == 'login-doctor'?'selected':''; ?>>Doctor</option>
                            <option value="<?= base_url('login-partner') ?>" <?= $segment1 == 'login-partner'?'selected':''; ?>>Partner</option>
                        </select>
                    </div>

                        <!-- Email -->
                        <div class="input-group col-md-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-envelope text-muted"></i>
                                </span>
                            </div>
                            <?php
                            $emailValue = set_value('email');
                            if (empty($emailValue)) {
                                $emailCookie = isset($_COOKIE['uemail']) ? $_COOKIE['uemail'] : '';
                                $emailValue = htmlspecialchars($emailCookie);
                            }
                            ?>
                            <input id="email" type="email" name="email" value="<?= $emailValue; ?>" placeholder="Email or Number" class="form-control bg-white border-left-0 border-md">
                            <?php
                            if (isset($validation)) :
                                if ($validation->hasError('email_phone')) : ?>
                                    <span class="errMsg"><?= $validation->getError('email_phone') ?></span>
                            <?php endif;
                            endif; ?>
                        </div>

                        <!-- Password -->
                        <?php
                            $passwordValue = set_value('password');
                            if (empty($passwordValue)) {
                                $passwordCookie = isset($_COOKIE['upass']) ? $_COOKIE['upass'] : '';
                                $passwordValue = htmlspecialchars($passwordCookie);
                            }
                        ?>
                        <div class="input-group col-md-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-key text-muted"></i>
                                </span>
                            </div>
                            <input id="password" type="password" name="password" placeholder="Password" value="<?= $passwordValue; ?>" class="form-control bg-white border-left-0 border-md">
                            <?php
                            if (isset($validation)) :
                                if ($validation->hasError('password')) : ?>
                                    <span class="errMsg"><?= $validation->getError('password') ?></span>
                            <?php endif;
                            endif; ?>
                        </div>

                        <!-- Remember Me Checkbox -->
                        <div class="form-group col-md-12 mb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="remember" id="rememberMe">
                                <label class="custom-control-label" for="rememberMe">Remember Me</label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group col-lg-12 mx-auto mb-0">
                            <button type="submit" class="btn btn-submit btn-block py-2">
                                <span class="font-weight-bold">Sign In</span>
                            </button>
                        </div>

                        <!-- Forgot Password -->
                        <div class="form-group col-lg-12 mx-auto text-center mt-2">
                            <a href="#" class="text-muted">Forgot Password?</a>
                        </div>

                        <!-- Divider Text -->
                        <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                            <div class="border-bottom w-100 ml-5"></div>
                            <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                            <div class="border-bottom w-100 mr-5"></div>
                        </div>

                        <!-- Not Registered -->
                        <div class="text-center w-100">
                            <p class="text-muted font-weight-bold">Not Registered? <a href="<?= base_url('register-patient') ?>" class="login-text ml-2">Sign Up</a></p>
                        </div>
                    </div>
                </form>
    </div>
</div>

<script>
    function redirectToLink() {
        var selectElement = document.getElementById("redirectSelect");
        var selectedValue = selectElement.value;
        
        if (selectedValue) {
            window.location.href = selectedValue;
        }
    }
</script>
<?= $this->endSection() ?>

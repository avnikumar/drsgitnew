<?= $this->extend("layouts/otp") ?>

<?= $this->section("body") ?>
<?php
$uri = service('uri');
$segment1 = $uri->getSegment(1);
?>
<div class="row justify-content-center">
    <div class="col-12 col-md-6 col-lg-4">
        <div class="card bg-white mb-5 mt-5 border-0" style="box-shadow: 0 12px 15px rgba(0, 0, 0, 0.02);">
            <div class="card-body p-5 text-center">
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
                <?php if ($segment1 == 'verify-otp-patient') { ?>
                    <form method="POST" action="<?= base_url('verify-otp-patient') ?>">
                    <?php } elseif ($segment1 == 'verify-otp-doctor') { ?>
                        <form method="POST" action="<?= base_url('verify-otp-doctor') ?>">
                        <?php } elseif ($segment1 == 'verify-otp-partner') { ?>
                            <form method="POST" action="<?= base_url('verify-otp-partner') ?>">
                            <?php } else {
                        } ?>
                            <h4>Verify</h4>
                            <p>Your code was sent to you via email</p>

                            <div class="otp-field mb-4">
                                <input type="number" id="otp1" maxlength="1" name="otp[]" oninput="moveToNext(this, 'otp2')" />
                                <input type="number" id="otp2" maxlength="1" name="otp[]" oninput="moveToNext(this, 'otp3')" />
                                <input type="number" id="otp3" maxlength="1" name="otp[]" oninput="moveToNext(this, 'otp4')" />
                                <input type="number" id="otp4" maxlength="1" name="otp[]" />
                            </div>

                            <button class="btn btn-primary mb-3" style="background-color: #42d0fa; border:none;">
                                Verify
                            </button>

                            <p class="resend text-muted mb-0">
                                Didn't receive code? <a href="#">Request again</a>
                            </p>
                            </form>
            </div>
        </div>
    </div>
</div>
<script>
    // Function to move focus to the next input field
    function moveToNext(currentInput, nextInputId) {
        if (currentInput.value.length >= currentInput.maxLength) {
            // Move focus to the next input field
            document.getElementById(nextInputId).focus();
        }
    }

    // Function to move focus to the previous input field if backspace is pressed
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Backspace') {
            let currentInput = document.activeElement;
            if (currentInput.tagName.toLowerCase() === 'input' && currentInput.value.length === 0) {
                // Get the previous input field
                let previousInput = currentInput.previousElementSibling;
                if (previousInput && previousInput.tagName.toLowerCase() === 'input') {
                    // Move focus to the previous input field
                    previousInput.focus();
                }
            }
        }
    });
</script>
<?= $this->endSection() ?>
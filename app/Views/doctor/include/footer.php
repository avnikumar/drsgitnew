<!--  Scripts -->
<script src="<?= base_url('public/inner/js/jquery.min.js') ?>"></script>
<!---->
<script src="<?= base_url('public/inner/js/jquery-migrate.js') ?>"></script>
<script src="<?= base_url('public/inner/js/popper.min.js') ?>"></script>
<script src="<?= base_url('public/inner/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('public/inner/js/charts.js') ?>"></script>
<script src="<?= base_url('public/inner/js/final-countdown.min.js') ?>"></script>
<script src="<?= base_url('public/inner/js/fancy-box.min.js') ?>"></script>
<script src="<?= base_url('public/inner/js/fullcalendar.min.js') ?>"></script>
<script src="<?= base_url('public/inner/js/datatables.min.js') ?>"></script>
<script src="<?= base_url('public/inner/js/circle-progress.min.js') ?>"></script>
<script src="<?= base_url('public/inner/js/nice-select.min.js') ?>"></script>
<script src="<?= base_url('public/inner/js/pikaday.min.js') ?>"></script>
<script src="<?= base_url('public/inner/js/main.js') ?>"></script>

<?php $current = get_current_controller_method(); ?>
<!-- For My Settings OR Profile -->
<?php if ($current['method'] == 'mySettings') : ?>

  <script>
    var getCityOptions = '<?= base_url('get_cities_option_list_by_state_id') ?>';
    //uploadCropedImage
    var uploadDocument = '<?= base_url('upload_document') ?>';

    var addLanguage = '<?= base_url('doctor/add_language') ?>';
    var removeLanguage = '<?= base_url('doctor/remove_language') ?>';

    var addSpecialization = '<?= base_url('doctor/add_specialization') ?>';
    var removeSpecialization = '<?= base_url('doctor/remove_specialization') ?>';

    var addQualification = '<?= base_url('doctor/add_qualification') ?>';
    var removeQualification = '<?= base_url('doctor/remove_qualification') ?>';
  </script>
  <script src="<?= base_url('public/inner/js/custom/profile.js') ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
  <script src="<?= base_url('public/inner/js/custom/cropImage.js') ?>"></script>
  <script src="<?= base_url('public/inner/js/ck-editor.min.js') ?>"></script>
  <script>
    //Ckeditor
    ClassicEditor.create(document.querySelector("#about")).catch(
      (error) => {
        console.error(error);
      }
    );
  </script>

<?php endif; ?>
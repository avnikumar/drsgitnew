<div class="crancy-folders">
  <div class="crancy-folders__main">
    <div class="crancy-folders__group">
      <h3 class="crancy__item-group__title crancy__item-group__title--v2">Certificates</h3>
      <ul class="crancy-folder-list">
        <li>
          <div class="crancy-folder-list__single crancy-folder-list__single--add">
            <a class="crancy-folder-list__add" data-bs-toggle="modal" data-bs-target="#certificateModal">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M8.8 3.99922C8.8 3.55739 8.44183 3.19922 8 3.19922C7.55817 3.19922 7.2 3.55739 7.2 3.99922V7.19922H4C3.55817 7.19922 3.2 7.55739 3.2 7.99922C3.2 8.44105 3.55817 8.79922 4 8.79922H7.2V11.9992C7.2 12.441 7.55817 12.7992 8 12.7992C8.44183 12.7992 8.8 12.441 8.8 11.9992V8.79922H12C12.4418 8.79922 12.8 8.44105 12.8 7.99922C12.8 7.55739 12.4418 7.19922 12 7.19922H8.8V3.99922Z" fill="#191B23 " />
                </svg>
              </span>
              <h4 class="crancy-folder-list__add--title">
                Add Certificates
              </h4>
            </a>
          </div>
        </li>
        <?php
          if (!empty($documents)) :
              // Filter for both LICENSE_CERTIFICATE and BOARD_CERTIFICATE
              $filteredCertificates = array_filter($documents, function ($item) {
                  return $item['column_name'] === 'LICENSE_CERTIFICATE' || $item['column_name'] === 'BOARD_CERTIFICATE';
              });
              // Determine and print based on the result
              foreach ($filteredCertificates as $certificate):
                  $fileName = $certificate['file_name'];
                  $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
                  // Determine the icon based on file extension
                  $iconSrc = '';
                  if (in_array($fileExtension, ['jpeg', 'jpg', 'png', 'gif'])) {
                      $iconSrc = DOCTOR_ID_PROOF_FILE_PATH . $fileName; // Show the actual image
                  } elseif ($fileExtension === 'pdf') {
                      $iconSrc = INNER_IMAGES_PATH.'pdf-icon.svg'; // Path to a generic PDF icon
                  } elseif (in_array($fileExtension, ['doc', 'docx'])) {
                      $iconSrc = INNER_IMAGES_PATH.'doc-icon.svg'; // Path to a generic Word icon
                  } else {
                      $iconSrc = INNER_IMAGES_PATH.'file-icon.svg'; // Fallback for unknown file types
                  }

                  if ($certificate['column_name'] === 'LICENSE_CERTIFICATE') { 
                      $docName = 'License Certificate';
                ?>
                      <li>
                          <div class="crancy-folder-list__single crancy-folder-list__single--add">
                              <a target="_blank" href="<?= DOCTOR_ID_PROOF_FILE_PATH . $fileName; ?>">
                                  <img src="<?= $iconSrc; ?>" alt="License Certificate">
                                  <?= $docName; ?>
                              </a>
                          </div>
                      </li>
                  <?php } elseif ($certificate['column_name'] === 'BOARD_CERTIFICATE') { 
                                  $docName = 'License Certificate';
                  ?>
                      <li>
                          <div class="crancy-folder-list__single crancy-folder-list__single--add">
                              <a target="_blank" href="<?= DOCTOR_ID_PROOF_FILE_PATH . $fileName; ?>">
                                  <img src="<?= $iconSrc; ?>" alt="Board Certificate">
                                  <?= $docName; ?>
                              </a>
                          </div>
                      </li>
                  <?php }
              endforeach;
          endif; ?>
      </ul>
    </div>
  </div>

  <!-- Modal -->
  <div class="crancy-default__modal crancy-payment__modal modal fade" id="certificateModal" tabindex="-1" aria-labelledby="certificateModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content crancy-preview__modal-content">
        <div class="row">
          <form id="addCertificateForm">
            <div class="col-12">
              <div class="crancy-flex__right">
                <a id="crancy-main-form__close" type="initial" class="crancy-preview__modal--close btn-close" data-bs-dismiss="modal" aria-label="Close">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <g clip-path="url(#clip0_989_10425)">
                      <circle cx="12" cy="12" r="12" fill="#EDF2F7"></circle>
                      <path d="M16.9498 7.05029L7.05033 16.9498" stroke="#5D6A83" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path d="M7.05029 7.05029L16.9498 16.9498" stroke="#5D6A83" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                    <defs>
                      <clipPath id="clip0_989_10425">
                        <rect width="24" height="24" fill="white"></rect>
                      </clipPath>
                    </defs>
                  </svg>
                </a>
              </div>
              <div class="crancy-wc__heading crancy-flex__column-center text-center">
                <h3 class="crancy-login-popup__title">Add Certificate</h3>
              </div>

              <div class="row">

                <div class="col-lg-6 col-12">
                  <div class="crancy__item-form--group mg-top-form-20">
                    <label class="crancy__item-label">Select Certificate Type</label>
                    <select name="column_name" id="certificateType" class="form-select crancy__item-input" aria-label="Default select example" style="display: none;" required>
                      <option selected="">Select Type</option>
                      <option value="LICENSE_CERTIFICATE">License Certificate</option>
                      <option value="BOARD_CERTIFICATE">Board Certificate</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6 col-12">
                  <div class="crancy__item-form--group mg-top-form-20">
                    <label class="crancy__item-label"></label>
                    <div class="crancy-folder-list__single crancy-folder-list__single--add">
                      <!--<input type="file" id="certificateInput" name="file" style="display: none;" >-->
                      <input id="certificateInput" class="image d-none" type="file" data-target="#modalCropPic" data-column="" data-fileFor="doctorDocumentPic" accept="image/*,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                      <a href="javascript:void(0)" class="crancy-folder-list__add" id="chooseCertificateFile">
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.8 3.99922C8.8 3.55739 8.44183 3.19922 8 3.19922C7.55817 3.19922 7.2 3.55739 7.2 3.99922V7.19922H4C3.55817 7.19922 3.2 7.55739 3.2 7.99922C3.2 8.44105 3.55817 8.79922 4 8.79922H7.2V11.9992C7.2 12.441 7.55817 12.7992 8 12.7992C8.44183 12.7992 8.8 12.441 8.8 11.9992V8.79922H12C12.4418 8.79922 12.8 8.44105 12.8 7.99922C12.8 7.55739 12.4418 7.19922 12 7.19922H8.8V3.99922Z" fill="#191B23 " />
                          </svg>
                        </span>
                        <h4 class="crancy-folder-list__add--title">
                          Add Certificate
                        </h4>
                      </a>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End Model-->
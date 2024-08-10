<div class="crancy-folders">
  <div class="crancy-folders__main">
    <div class="crancy-folders__group">
      <div class="col-sm-12 d-flex align-items-center">
        <div class="col-sm-10 d-flex justify-content-between align-center">
          <h3 class="crancy__item-group__title crancy__item-group__title--v2" style="width: 100%;">Locations</h3>
        </div>
        <div class="col-sm-2 text-end">
          <a class="crancy-folder-list__add" data-bs-toggle="modal" style="margin-top: -50px;" data-bs-target="#locationModal"> 
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.8 3.99922C8.8 3.55739 8.44183 3.19922 8 3.19922C7.55817 3.19922 7.2 3.55739 7.2 3.99922V7.19922H4C3.55817 7.19922 3.2 7.55739 3.2 7.99922C3.2 8.44105 3.55817 8.79922 4 8.79922H7.2V11.9992C7.2 12.441 7.55817 12.7992 8 12.7992C8.44183 12.7992 8.8 12.441 8.8 11.9992V8.79922H12C12.4418 8.79922 12.8 8.44105 12.8 7.99922C12.8 7.55739 12.4418 7.19922 12 7.19922H8.8V3.99922Z" fill="#191B23" />
              </svg>
              
            </span>
            <span style="margin-left: 5px;">Location</span>
          </a>
        </div>
      </div>
      <ul class="crancy-folder-list">
        <!--
        <li>
          <div class="crancy-folder-list__single crancy-folder-list__single--add">
            <a class="crancy-folder-list__add" data-bs-toggle="modal" data-bs-target="#locationModal">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M8.8 3.99922C8.8 3.55739 8.44183 3.19922 8 3.19922C7.55817 3.19922 7.2 3.55739 7.2 3.99922V7.19922H4C3.55817 7.19922 3.2 7.55739 3.2 7.99922C3.2 8.44105 3.55817 8.79922 4 8.79922H7.2V11.9992C7.2 12.441 7.55817 12.7992 8 12.7992C8.44183 12.7992 8.8 12.441 8.8 11.9992V8.79922H12C12.4418 8.79922 12.8 8.44105 12.8 7.99922C12.8 7.55739 12.4418 7.19922 12 7.19922H8.8V3.99922Z" fill="#191B23 " />
                </svg>
              </span>
              <h4 class="crancy-folder-list__add--title">
                Add Location
              </h4>
            </a>
          </div>
        </li>-->
        <?php if (!empty($dr_locations)) :
          foreach ($dr_locations as $location) :
        ?>
            <li style="width: 100%;">
              <div class="crancy-folder-list__single crancy-folder-list__single--add">
                <a href="javascript:void(0)" class="loadContentButton" data-locid="<?= $location['id']; ?>" style="top: 64px;z-index: 9;right: 6px;position: absolute;" >
                  <label class="crancy-ptabs__sedit">
                    <span>
                      <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M16.5147 11.5C17.7284 12.7137 18.9234 13.9087 20.1296 15.115C19.9798 15.2611 19.8187 15.4109 19.6651 15.5683C17.4699 17.7635 15.271 19.9587 13.0758 22.1539C12.9334 22.2962 12.7948 22.4386 12.6524 22.5735C12.6187 22.6034 12.5663 22.6296 12.5213 22.6296C11.3788 22.6334 10.2362 22.6297 9.09365 22.6334C9.01498 22.6334 9 22.6034 9 22.536C9 21.4009 9 20.2621 9.00375 19.1271C9.00375 19.0746 9.02997 19.0109 9.06368 18.9772C10.4123 17.6249 11.7609 16.2763 13.1095 14.9277C14.2295 13.8076 15.3459 12.6913 16.466 11.5712C16.4884 11.5487 16.4997 11.5187 16.5147 11.5Z" fill="white"></path>
                      <path d="M20.9499 14.2904C19.7436 13.0842 18.5449 11.8854 17.3499 10.6904C17.5634 10.4694 17.7844 10.2446 18.0054 10.0199C18.2639 9.76139 18.5261 9.50291 18.7884 9.24443C19.118 8.91852 19.5713 8.91852 19.8972 9.24443C20.7251 10.0611 21.5492 10.8815 22.3771 11.6981C22.6993 12.0165 22.7105 12.4698 22.3996 12.792C21.9238 13.2865 21.4443 13.7772 20.9686 14.2717C20.9648 14.2792 20.9536 14.2867 20.9499 14.2904Z" fill="white"></path></svg>
                    </span>
                  </label>
                </a>
                <div class="crancy-folder-list__add" data-bs-toggle="modal" data-bs-target="#locationModal3">
                  <h4 class="crancy-folder-list__add--title">
                    <p><?= $location['state_name']; ?></p>
                    <p><?= $location['city_name']; ?></p>
                    <p><?= $location['address']; ?></p>
                    <p><?= $location['postal_code']; ?></p>
                  </h4>
                </div>
              </div>
            </li>
        <?php endforeach;
        endif; ?>
      </ul>
    </div>
  </div>

  <!-- First Modal -->
  <div class="crancy-default__modal crancy-payment__modal modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content crancy-preview__modal-content">
        <div class="row">
          <form id="createLocation">
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
                <h3 class="crancy-login-popup__title">Add Location</h3>
              </div>
              <div class="row">
                <div class="col-lg-12 col-12">
                  <div class="crancy__item-form--group mg-top-form-20">
                    <label class="crancy__item-label">State</label>
                    <select name="state" class="form-select crancy__item-input" id="stateSelect2" aria-label="Default select example" style="display: none;" required>
                      <option value="">Select Your State</option>
                      <?php
                      if (!empty($stateNames)) :
                        foreach ($stateNames as $key => $states) :
                          echo '<option value="' . $states['state_id'] . '" ' . set_select('state', $states['state_id']) . '>' . $states['name'] . '</option>';
                        endforeach;
                      endif;
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-lg-12 col-12">
                  <div class="crancy__item-form--group mg-top-form-20">
                    <label class="crancy__item-label">City</label>
                    <select id="cityList2" name="city" class="form-select crancy__item-input" aria-label="Default select example" style="display: none;" required>
                      <!--City Name-->
                    </select>
                  </div>
                </div>
                <div class="col-lg-12 col-12">
                  <div class="crancy__item-form--group mg-top-form-20">
                    <label class="crancy__item-label">Postal Code</label>
                    <input class="crancy__item-input" type="text" name="postal_code" placeholder="Postal Code" required>
                  </div>
                </div>
                <div class="col-lg-12 col-12">
                  <div class="crancy__item-form--group mg-top-form-20">
                    <label class="crancy__item-label">Address</label>
                    <input class="crancy__item-input" type="text" name="address" placeholder="Clinic Address" required>
                  </div>
                </div>
              </div>
            </div>
            <div></div>
            <button class="crancy-btn crancy-btn__currency crancy-full-width mg-top-40">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--Second Model-->
  <div class="crancy-default__modal crancy-payment__modal modal fade" id="locationUpdateModal" tabindex="-1" aria-labelledby="locationUpdateModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content crancy-preview__modal-content">
        <div class="row" id="locationUpdateForm">
            <!--form here-->
        </div>
      </div>
    </div>
  </div>

</div>
<!--End Model-->
<script>
  var addLocation = '<?= base_url('doctor/add_location') ?>';
  var updateLocationForm = '<?= base_url('doctor/update_location_form') ?>';
</script>
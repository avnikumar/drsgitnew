<?= $this->extend("layouts/doctor_layout") ?>

<?= $this->section("body") ?>

<section class="crancy-adashboard1 crancy-show">
  <div class="container container__bscreen">
    <div class="row">
      <div class="col-xxl-8 col-12 crancy-main__column">
        My Settings
        <!--My Settings Starts-->
        <div class="col-12">
          <div class="crancy-body">
            <!-- Dashboard Inner -->
            <div class="crancy-dsinner">
              <div class="crancy-personals mg-top-30">
                <div class="row">
                  <div class="col-lg-3 col-md-2 col-12 crancy-personals__list">
                    <div class="crancy-psidebar">
                      <!-- Features Tab List -->
                      <div class="list-group crancy-psidebar__list" id="list-tab" role="tablist">
                        <a class="list-group-item active" data-bs-toggle="list" href="#id1" role="tab">
                          <span class="crancy-psidebar__icon">
                            <svg width="17" height="21" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M8.48131 20.3781C6.87614 20.3781 5.27097 20.3908 3.66659 20.3701C3.22093 20.3646 2.75697 20.3224 2.33438 20.1903C0.936126 19.7526 0.125183 18.761 0.03048 17.3134C-0.0896892 15.4695 0.12757 13.6566 1.00377 11.9838C1.68261 10.6882 2.73866 9.92418 4.22605 9.87405C4.54677 9.86291 4.89534 9.99422 5.19218 10.1383C5.78507 10.4263 6.32862 10.8235 6.93264 11.0797C8.30544 11.6615 9.63048 11.4227 10.895 10.7097C11.1139 10.5863 11.3359 10.4582 11.5277 10.2982C12.1707 9.76263 12.8846 9.78173 13.6319 9.99103C14.7062 10.2919 15.4726 10.9755 15.9764 11.9448C16.8987 13.7187 17.1359 15.6334 16.9321 17.5864C16.7634 19.2067 15.362 20.3399 13.6144 20.3678C11.9034 20.3948 10.1923 20.3733 8.48131 20.3733C8.48131 20.3757 8.48131 20.3773 8.48131 20.3781ZM8.50519 19.1828C8.50519 19.182 8.50519 19.1812 8.50519 19.1804C10.1756 19.1804 11.8468 19.1947 13.5165 19.1764C14.9418 19.1605 15.8315 18.2899 15.7941 16.8844C15.7687 15.9486 15.6596 15.0087 15.5013 14.0855C15.3556 13.2308 15.0063 12.4382 14.3975 11.7888C13.6764 11.0192 12.8026 10.9054 11.9328 11.4657C11.7545 11.5803 11.5795 11.7005 11.394 11.8031C10.1454 12.4931 8.82193 12.7661 7.40775 12.4835C6.41456 12.2854 5.55428 11.8023 4.71389 11.2572C4.49743 11.1163 4.16159 11.063 3.90136 11.1028C3.0371 11.2357 2.45455 11.7824 2.06301 12.5369C1.28788 14.0322 1.12076 15.6493 1.23217 17.2903C1.30141 18.3121 1.96751 18.9337 2.98139 19.1191C3.2273 19.1637 3.48116 19.1788 3.73185 19.1796C5.3227 19.1852 6.91355 19.1828 8.50519 19.1828Z" fill="white"></path>
                              <path d="M3.46851 4.85228C3.51945 2.07407 5.72308 -0.0515716 8.49572 0.000952618C11.1753 0.052681 13.3319 2.29451 13.2834 4.97962C13.234 7.72122 11.0129 9.858 8.26812 9.80389C5.55914 9.75057 3.41838 7.54296 3.46851 4.85228ZM4.66384 4.92072C4.67418 6.99941 6.30642 8.61732 8.38669 8.61016C10.4526 8.60299 12.0984 6.95007 12.0889 4.89128C12.0793 2.83408 10.42 1.18911 8.35804 1.19389C6.29368 1.19946 4.65429 2.85397 4.66384 4.92072Z" fill="white"></path>
                            </svg>
                          </span>
                          <h4 class="crancy-psidebar__title">Personal Informations<span></span></h4>
                        </a>
                        <!---->
                        <a class="list-group-item" data-bs-toggle="list" href="#id2" role="tab">
                          <span class="crancy-psidebar__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                              <path d="M2 6H6M2 12H6M2 18H6M18 6L10 6M14 10L10 10M8 22H18C20.2091 22 22 20.2091 22 18V6C22 3.79086 20.2091 2 18 2H8C5.79086 2 4 3.79086 4 6V18C4 20.2091 5.79086 22 8 22Z" stroke-width="1.5" stroke-linecap="round"></path>
                            </svg>
                          </span>
                          <h4 class="crancy-psidebar__title">Certificates<span></span></h4>
                        </a>
                        <!---->
                        <a class="list-group-item" data-bs-toggle="list" href="#id3" role="tab">
                          <span class="crancy-psidebar__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                              <path d="M18 15H12V7H18M18 15C19.1046 15 20 14.1046 20 13V9C20 7.89543 19.1046 7 18 7M18 15V20C18 21.1046 17.1046 22 16 22H8C6.89543 22 6 21.1046 6 20V4C6 2.89543 6.89543 2 8 2H16C17.1046 2 18 2.89543 18 4V7" stroke-width="1.5" stroke-linejoin="round"></path>
                              <path d="M13 19C13 19.5523 12.5523 20 12 20C11.4477 20 11 19.5523 11 19C11 18.4477 11.4477 18 12 18C12.5523 18 13 18.4477 13 19Z" fill="#191B23  "></path>
                              <path d="M20 10L12 10" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                          </span>
                          <h4 class="crancy-psidebar__title">Services<span></span></h4>
                        </a>
                       <!---->
                       <a class="list-group-item" data-bs-toggle="list" href="#id4" role="tab">
                          <span class="crancy-psidebar__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                              <path d="M16 8H8M16 8C18.2091 8 20 9.79086 20 12V18C20 20.2091 18.2091 22 16 22H8C5.79086 22 4 20.2091 4 18V12C4 9.79086 5.79086 8 8 8M16 8V6C16 3.79086 14.2091 2 12 2C9.79086 2 8 3.79086 8 6V8M14 15C14 16.1046 13.1046 17 12 17C10.8954 17 10 16.1046 10 15C10 13.8954 10.8954 13 12 13C13.1046 13 14 13.8954 14 15Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                          </span>
                          <h4 class="crancy-psidebar__title">Bank Info<span></span></h4>
                        </a>
                        <!---->
                        <a class="list-group-item" data-bs-toggle="list" href="#id5" role="tab">
                          <span class="crancy-psidebar__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                              <path d="M16 8H8M16 8C18.2091 8 20 9.79086 20 12V18C20 20.2091 18.2091 22 16 22H8C5.79086 22 4 20.2091 4 18V12C4 9.79086 5.79086 8 8 8M16 8V6C16 3.79086 14.2091 2 12 2C9.79086 2 8 3.79086 8 6V8M14 15C14 16.1046 13.1046 17 12 17C10.8954 17 10 16.1046 10 15C10 13.8954 10.8954 13 12 13C13.1046 13 14 13.8954 14 15Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                          </span>
                          <h4 class="crancy-psidebar__title">Location<span></span></h4>
                        </a>
                        <a class="list-group-item" data-bs-toggle="list" href="#id6" role="tab">
                          <span class="crancy-psidebar__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                              <path d="M16 8H8M16 8C18.2091 8 20 9.79086 20 12V18C20 20.2091 18.2091 22 16 22H8C5.79086 22 4 20.2091 4 18V12C4 9.79086 5.79086 8 8 8M16 8V6C16 3.79086 14.2091 2 12 2C9.79086 2 8 3.79086 8 6V8M14 15C14 16.1046 13.1046 17 12 17C10.8954 17 10 16.1046 10 15C10 13.8954 10.8954 13 12 13C13.1046 13 14 13.8954 14 15Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                          </span>
                          <h4 class="crancy-psidebar__title">Security<span></span></h4>
                        </a>
                         <!---->
                         <a class="list-group-item" data-bs-toggle="list" href="#id7" role="tab">
                            <span class="crancy-psidebar__icon crancy-psidebar__icon--fill">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M13.6831 10.0808L14.3138 10.4866L13.6831 10.0808ZM9.25 9C9.25 9.41421 9.58579 9.75 10 9.75C10.4142 9.75 10.75 9.41421 10.75 9H9.25ZM11.25 13.5C11.25 13.9142 11.5858 14.25 12 14.25C12.4142 14.25 12.75 13.9142 12.75 13.5H11.25ZM12.75 16C12.75 15.5858 12.4142 15.25 12 15.25C11.5858 15.25 11.25 15.5858 11.25 16H12.75ZM11.25 17C11.25 17.4142 11.5858 17.75 12 17.75C12.4142 17.75 12.75 17.4142 12.75 17H11.25ZM21.25 12C21.25 17.1086 17.1086 21.25 12 21.25V22.75C17.9371 22.75 22.75 17.9371 22.75 12H21.25ZM12 21.25C6.89137 21.25 2.75 17.1086 2.75 12H1.25C1.25 17.9371 6.06294 22.75 12 22.75V21.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75V1.25C6.06294 1.25 1.25 6.06294 1.25 12H2.75ZM12 2.75C17.1086 2.75 21.25 6.89137 21.25 12H22.75C22.75 6.06294 17.9371 1.25 12 1.25V2.75ZM13.25 9C13.25 9.24996 13.1774 9.48068 13.0524 9.67495L14.3138 10.4866C14.5899 10.0576 14.75 9.54634 14.75 9H13.25ZM10.75 9C10.75 8.30964 11.3096 7.75 12 7.75V6.25C10.4812 6.25 9.25 7.48122 9.25 9H10.75ZM12 7.75C12.6904 7.75 13.25 8.30964 13.25 9H14.75C14.75 7.48122 13.5188 6.25 12 6.25V7.75ZM11.25 13V13.5H12.75V13H11.25ZM13.0524 9.67495C12.9265 9.87065 12.7688 10.0731 12.5836 10.3033C12.4063 10.5237 12.1979 10.7764 12.011 11.0333C11.6424 11.5398 11.25 12.2007 11.25 13H12.75C12.75 12.6947 12.9003 12.3605 13.2239 11.9158C13.383 11.697 13.558 11.4851 13.7523 11.2436C13.9387 11.0119 14.1409 10.7554 14.3138 10.4866L13.0524 9.67495ZM11.25 16V17H12.75V16H11.25Z"></path>
                              </svg>
                          </span>
                          <h4 class="crancy-psidebar__title">FAQ<span></span></h4>
                        </a>
                        <a class="list-group-item" data-bs-toggle="list" href="#id8" role="tab">
                          <span class="crancy-psidebar__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                              <path d="M9 14L10.7528 15.4023C11.1707 15.7366 11.7777 15.6826 12.1301 15.2799L15 12M16 4H17C19.2091 4 21 5.79086 21 8V18C21 20.2091 19.2091 22 17 22H7C4.79086 22 3 20.2091 3 18V8C3 5.79086 4.79086 4 7 4H8M16 4C16 5.10457 15.1046 6 14 6H10C8.89543 6 8 5.10457 8 4M16 4C16 2.89543 15.1046 2 14 2H10C8.89543 2 8 2.89543 8 4" stroke-width="1.5" stroke-linecap="round"></path>
                            </svg>
                          </span>
                          <h4 class="crancy-psidebar__title">Terms and Conditions<span></span></h4>
                        </a>
                      </div>

                    </div>
                  </div>

                  <div class="col-lg-9 col-md-10 col-12 crancy-personals__content">
                    <div class="crancy-ptabs">
                      <div class="crancy-ptabs__inner">
                        <div class="tab-content" id="nav-tabContent">
                          <!--  Features Single Tab -->
                          <div class="tab-pane fade show active" id="id1" role="tabpanel">
                            <!--Personal Info--> 
                            <?= $this->include('doctor/profile/profile') ?>
                          </div>
                          <div class="tab-pane fade" id="id2" role="tabpanel">
                            <?= $this->include('doctor/profile/certificates') ?>
                          </div>
                          <div class="tab-pane fade" id="id3" role="tabpanel">
                            <?= $this->include('doctor/profile/services') ?>
                          </div>
                          <div class="tab-pane fade" id="id4" role="tabpanel">
                            <?= $this->include('doctor/profile/bank_info') ?>
                          </div>
                          <div class="tab-pane fade" id="id5" role="tabpanel">
                            <?= $this->include('doctor/profile/locations') ?>
                          </div>
                          <div class="tab-pane fade" id="id6" role="tabpanel">
                            <!--Password Reset-->
                            <?= $this->include('doctor/profile/password') ?>
                          </div>
                          <div class="tab-pane fade" id="id7" role="tabpanel">
                            <!--Faq-->
                            <?= $this->include('doctor/profile/faq') ?>
                          </div>
                          <div class="tab-pane fade" id="id8" role="tabpanel">
                            <!--Terms of use-->
                            <?= $this->include('doctor/profile/terms_of_use') ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Dashboard Inner -->
          </div>
        </div>
        <!--My Settings End-->
      </div>
    </div>
  </div>
</section>
<?php //echo '<pre>';print_r($languages);?>
<?= $this->include('common/crop_image_popup') ?>
<?= $this->endSection() ?>
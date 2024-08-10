<div class="" id="resultResponse"></div>
<div class="crancy-paymentm crancy__item-group">
    <div class="row">
        <div class="col-xxl-4 col-md-6 col-12 mg-btm-30">
            <?php
            $serviceOnlineRatesKey = find_service_type_key($serviceRates, 'ONLINECALL');
            if ($serviceOnlineRatesKey !== false) :
                $onlineServicePrice  = $serviceRates[$serviceOnlineRatesKey]['service_price'];
                $onlineServiceTime   = $serviceRates[$serviceOnlineRatesKey]['service_time'];
                $onlineServiceStatus = $serviceRates[$serviceOnlineRatesKey]['status'];
                if ($onlineServiceStatus == 1) {
                    $checkStatusOnline = 'checked';
                    $bgColOnlineCall   = '#008000';
                } else {
                    $checkStatusOnline = '';
                    $bgColOnlineCall   = '#e8edff';
                }
            else :
                $onlineServicePrice  = '';
                $onlineServiceTime   = '';
                $onlineServiceStatus = '';
                $checkStatusOnline   = '';
                $bgColOnlineCall     = '#e8edff';
            endif;
            ?>
            <div class="crancy-paymentm-card" style="border-color: <?= $bgColOnlineCall; ?>;">
                <div class="crancy-paymentm-card__icon">
                    <h4 class="crancy-paymentm__title crancy-font-weight-bold mb-0">Online Call</h4>
                    <a href="javascript:void(0);" id="onlineBox"><img src="/public/inner/img/toggle-icon-3.svg"></a>
                </div>
                <div class="crancy-paymentm__content d-block" id="onlineServiceDisplay">
                    <p class="crancy-paymentm__text mb-2">
                        <b>Service Rate:</b> Rs. <?= $onlineServicePrice; ?>
                    </p>
                    <p class="crancy-paymentm__text">
                        <b>Service Time:</b> <?= $onlineServiceTime; ?> Minutes
                    </p>
                </div>
                <div class="crancy-paymentm__content d-none" id="onlineServiceForm">
                    <form id="onlineServiceRateForm">
                        <input type="hidden" name="service_type" value="ONLINECALL">
                        <div class="crancy__item-form--group mg-top-form-20">
                            <label class="crancy__item-label">Service Status:
                                <div class="crancy__item-switch float-end">
                                    <input type="checkbox" name="status" <?= $checkStatusOnline; ?> value="1">
                                    <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                </div>
                            </label>
                        </div>
                        <div class="crancy__item-form--group mg-top-form-20">
                            <label class="crancy__item-label">Service Rate:</label>
                            <input class="crancy__item-input" type="text" name="service_price" value="<?= $onlineServicePrice; ?>" placeholder="Online Service Rate">
                        </div>
                        <div class="crancy__item-form--group mg-top-form-20">
                            <label class="crancy__item-label">Service Time (In Minutes):</label>
                            <input class="crancy__item-input" type="text" name="service_time" value="<?= $onlineServiceTime; ?>" placeholder="Online Service Time">
                        </div>
                        <div class="crancy-flex__right mg-top-40">
                            <button class="crancy-btn" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Payment Single -->
        </div>
        <div class="col-xxl-4 col-md-6 col-12 mg-btm-30">
            <?php
            $serviceHouseCallRatesKey = find_service_type_key($serviceRates, 'HOUSECALL');
            if ($serviceHouseCallRatesKey !== false) :
                $houseCallServicePrice = $serviceRates[$serviceHouseCallRatesKey]['service_price'];
                $houseCallServiceTime  = $serviceRates[$serviceHouseCallRatesKey]['service_time'];
                $houseCallServiceStatus = $serviceRates[$serviceHouseCallRatesKey]['status'];
                if ($houseCallServiceStatus == 1) {
                    $checkStatusHouse = 'checked';
                    $bgColHouseCall   = '#008000';
                } else {
                    $checkStatusHouse = '';
                    $bgColHouseCall   = '#e8edff';
                }
            else :
                $houseCallServicePrice  = '';
                $houseCallServiceTime   = '';
                $houseCallServiceStatus = '';
                $checkStatusHouse       = '';
                $bgColHouseCall         = '#e8edff';
            endif;
            ?>
            <div class="crancy-paymentm-card" style="border-color: <?= $bgColHouseCall; ?>;">
                <div class="crancy-paymentm-card__icon">
                    <h4 class="crancy-paymentm__title crancy-font-weight-bold mb-0">House Call</h4>
                    <a href="javascript:void(0);" id="houseBox"><img src="/public/inner/img/toggle-icon-3.svg"></a>
                </div>

                <div class="crancy-paymentm__content d-block" id="houseServiceDisplay">
                    <p class="crancy-paymentm__text mb-2">
                        <b>Service Rate:</b> Rs. <?= $houseCallServicePrice; ?>
                    </p>
                    <p class="crancy-paymentm__text">
                        <b>Service Time:</b> <?= $houseCallServiceTime; ?> Minutes
                    </p>
                </div>
                <div class="crancy-paymentm__content d-none" id="houseServiceForm">

                    <form id="houseServiceRateForm">
                        <input type="hidden" name="service_type" value="HOUSECALL">
                        <div class="crancy__item-form--group mg-top-form-20">
                            <label class="crancy__item-label">Service Status:
                                <div class="crancy__item-switch float-end">
                                    <input type="checkbox" name="status" <?= $checkStatusHouse; ?> value="1">
                                    <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                </div>
                            </label>
                        </div>
                        <div class="crancy__item-form--group mg-top-form-20">
                            <label class="crancy__item-label">Service Rate:</label>
                            <input class="crancy__item-input" type="text" name="service_price" value="<?= $houseCallServicePrice; ?>" placeholder="House Call Service Rate">
                        </div>
                        <div class="crancy__item-form--group mg-top-form-20">
                            <label class="crancy__item-label">Service Time (In Minutes):</label>
                            <input class="crancy__item-input" type="text" name="service_time" value="<?= $houseCallServiceTime; ?>" placeholder="House Call Service Time">
                        </div>
                        <div class="crancy-flex__right mg-top-40">
                            <button class="crancy-btn" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Payment Single -->
        </div>
        <div class="col-xxl-4 col-md-6 col-12 mg-btm-30">
            <?php
            $serviceClinicVisitRatesKey = find_service_type_key($serviceRates, 'CLINICVISIT');
            if ($serviceClinicVisitRatesKey !== false) :
                $clinicVisitServicePrice = $serviceRates[$serviceClinicVisitRatesKey]['service_price'];
                $clinicVisitServiceTime  = $serviceRates[$serviceClinicVisitRatesKey]['service_time'];
                $clinicVisitServiceStatus = $serviceRates[$serviceClinicVisitRatesKey]['status'];
                if ($clinicVisitServiceStatus == 1) {
                    $checkStatusClinicVisit = 'checked';
                    $bgColClinicVisit       = '#008000';
                } else {
                    $checkStatusClinicVisit = '';
                    $bgColClinicVisit       = '#e8edff';
                }
            else :
                $clinicVisitServicePrice  = '';
                $clinicVisitServiceTime   = '';
                $clinicVisitServiceStatus = '';
                $checkStatusClinicVisit   = '';
                $bgColClinicVisit         = '#e8edff';
            endif;
            ?>

            <div class="crancy-paymentm-card" style="border-color: <?= $bgColClinicVisit; ?>;">
                <div class="crancy-paymentm-card__icon">
                    <h4 class="crancy-paymentm__title crancy-font-weight-bold mb-0">Clinic Visit</h4>
                    <a href="javascript:void(0);" id="clinicBox"><img src="/public/inner/img/toggle-icon-3.svg"></a>
                </div>
                <div class="crancy-paymentm__content d-block" id="clinicServiceDisplay">
                    <p class="crancy-paymentm__text mb-2">
                        <b>Service Rate:</b> Rs. <?= $clinicVisitServicePrice; ?>
                    </p>
                    <p class="crancy-paymentm__text">
                        <b>Service Time:</b> <?= $clinicVisitServiceTime; ?> Minutes
                    </p>
                </div>
                <div class="crancy-paymentm__content d-none" id="clinicServiceForm">
                    <form id="clinicServiceRateForm">
                        <input type="hidden" name="service_type" value="CLINICVISIT">
                        <div class="crancy__item-form--group mg-top-form-20">
                            <label class="crancy__item-label">Service Status:
                                <div class="crancy__item-switch float-end">
                                    <input type="checkbox" name="status" <?= $checkStatusClinicVisit; ?> value="1">
                                    <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                </div>
                            </label>
                        </div>
                        <div class="crancy__item-form--group mg-top-form-20">
                            <label class="crancy__item-label">Service Rate:</label>
                            <input class="crancy__item-input" type="text" name="service_price" value="<?= $clinicVisitServicePrice; ?>" placeholder="Clinic Visit Service Rate">
                        </div>
                        <div class="crancy__item-form--group mg-top-form-20">
                            <label class="crancy__item-label">Service Time (In Minutes):</label>
                            <input class="crancy__item-input" type="text" name="service_time" value="<?= $clinicVisitServiceTime; ?>" placeholder="Clinic Visit Service Time">
                        </div>
                        <div class="crancy-flex__right mg-top-40">
                            <button class="crancy-btn" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Payment Single -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="crancy-ptabs__separate">
        <div class="col-8">
            <form action="<?= base_url('doctor/my_settings') ?>" method="POST">
                <div class="crancy-ptabs__form-main">
                    <div class="crancy__item-group">
                        <h3 class="crancy__item-group__title">
                            Personal Informations
                        </h3>
                        <div class="crancy__item-form--group">
                            <div class="row">
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
                                <div class="col-lg-6 col-12">
                                    <div class="crancy__item-form--group mg-top-form-20">
                                        <?= csrf_field() ?>
                                        <label class="crancy__item-label">First Name</label>
                                        <?php
                                        $firstNameValue = set_value('first_name');
                                        if (empty($firstNameValue)) {
                                            $firstNameValue = !empty($doctorDetails) ? $doctorDetails['first_name'] : '';
                                            $firstNameValue = htmlspecialchars($firstNameValue);
                                        }
                                        ?>
                                        <input class="crancy__item-input" type="text" name="first_name" value="<?= $firstNameValue; ?>" placeholder="Your First Name">
                                        <?php
                                        if (isset($validation)) :
                                            if ($validation->hasError('first_name')) : ?>
                                                <span class="errMsg"><?= $validation->getError('first_name') ?></span>
                                        <?php endif;
                                        endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="crancy__item-form--group mg-top-form-20">
                                        <label class="crancy__item-label">Last Name</label>
                                        <?php
                                        $lastNameValue = set_value('last_name');
                                        if (empty($lastNameValue)) {
                                            $lastNameValue = !empty($doctorDetails) ? $doctorDetails['last_name'] : '';
                                            $lastNameValue = htmlspecialchars($lastNameValue);
                                        }
                                        ?>
                                        <input class="crancy__item-input" type="text" name="last_name" value="<?= $lastNameValue; ?>" placeholder="Your Last Name">
                                        <?php
                                        if (isset($validation)) :
                                            if ($validation->hasError('last_name')) : ?>
                                                <span class="errMsg"><?= $validation->getError('last_name') ?></span>
                                        <?php endif;
                                        endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="crancy__item-form--group mg-top-form-20">
                                        <label class="crancy__item-label">DOB</label>
                                        <?php
                                        $dobValue = set_value('dob');
                                        if (empty($dobValue)) {
                                            $dobValue = !empty($doctorDetails) ? $doctorDetails['dob'] : '';
                                            $dobValue = htmlspecialchars($dobValue);
                                        }
                                        ?>
                                        <input class="crancy__item-input" type="text" name="dob" value="<?= $dobValue; ?>" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Date of Birth">
                                        <?php if (isset($validation)) :
                                            if ($validation->hasError('dob')) : ?>
                                                <span class="errMsg"><?= $validation->getError('dob') ?></span>
                                        <?php endif;
                                        endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="crancy__item-form--group mg-top-form-20">
                                        <label class="crancy__item-label">Email Address</label>
                                        <?php
                                        $emailValue = set_value('email');
                                        if (empty($emailValue)) {
                                            $emailValue = !empty($doctorDetails) ? $doctorDetails['email'] : '';
                                            $emailValue = htmlspecialchars($emailValue);
                                        }
                                        ?>
                                        <input class="crancy__item-input" type="email" name="email" value="<?= $emailValue; ?>" placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="crancy__item-form--group mg-top-form-20">
                                        <label class="crancy__item-label">Country Code</label>
                                        <input class="crancy__item-input" name="country_code" value="<?= !empty($doctorDetails) ? $doctorDetails['country_code'] : ''; ?>" placeholder="Your Country" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="crancy__item-form--group mg-top-form-20">
                                        <label class="crancy__item-label">Phone Number</label>
                                        <input class="crancy__item-input" name="phone" type="text" value="<?= !empty($doctorDetails) ? $doctorDetails['phone'] : ''; ?>" placeholder="Phone Number" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="crancy__item-form--group mg-top-form-20">
                                        <label class="crancy__item-label">Timezone</label>
                                        <select class="form-select crancy__item-input" name="time_zone" aria-label="Default select example" style="display: none;">
                                            <option value="" disabled selected hidden>Time Zone</option>
                                            <?php if (!empty($timeZones)) : ?>
                                                <?php foreach ($timeZones as $timeZone) : ?>
                                                    <option value="<?= $timeZone['id'] ?>" <?= set_select('time_zone', $timeZone['id'], $timeZone['id'] == $doctorDetails['time_zone']) ?>>
                                                        <?= $timeZone['name'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <option value="">No Time Zone Available</option>
                                            <?php endif; ?>
                                        </select>
                                        <?php if (isset($validation)) :
                                            if ($validation->hasError('time_zone')) : ?>
                                                <span class="errMsg"><?= $validation->getError('time_zone') ?></span>
                                        <?php endif;
                                        endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="crancy__item-form--group mg-top-form-20">
                                        <label class="crancy__item-label">Gender</label>
                                        <select name="gender" class="form-select crancy__item-input" aria-label="Default select example" style="display: none;">
                                            <option selected="">Select Gender</option>
                                            <option value="Male" <?= (!empty($doctorDetails) and $doctorDetails['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                            <option value="Female" <?= (!empty($doctorDetails) and $doctorDetails['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                                            <option value="Other" <?= (!empty($doctorDetails) and $doctorDetails['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                                        </select>
                                        <?php if (isset($validation)) :
                                            if ($validation->hasError('gender')) : ?>
                                                <span class="errMsg"><?= $validation->getError('gender') ?></span>
                                        <?php endif;
                                        endif; ?>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="crancy__item-form--group mg-top-form-20">
                                        <label class="crancy__item-label">License Number</label>
                                        <?php
                                        $licenseNumberValue = set_value('license_number');
                                        if (empty($licenseNumberValue)) {
                                            $licenseNumberValue = !empty($doctorDetails) ? $doctorDetails['license_number'] : '';
                                            $licenseNumberValue = htmlspecialchars($licenseNumberValue);
                                        }
                                        ?>
                                        <input class="crancy__item-input" name="license_number" type="text" value="<?= $licenseNumberValue; ?>" placeholder="License Number">
                                        <?php if (isset($validation)) :
                                            if ($validation->hasError('license_number')) : ?>
                                                <span class="errMsg"><?= $validation->getError('license_number') ?></span>
                                        <?php endif;
                                        endif; ?>
                                    </div>
                                </div>
                           
                          
                            </div>
                        </div>
                    </div>

                    <div class="crancy__item-form--group mg-top-30">
                        <h4 class="crancy__item-group__stitle m-0">Mailing Address</h4>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label">Country</label>
                                    <input class="crancy__item-input" value="<?= !empty($countryName) ? $countryName['country_name'] : ''; ?>" placeholder="Your Country" readonly>
                                    <input class="crancy__item-input d-none" name="country" id="countryId" value="<?= !empty($doctorDetails) ? $doctorDetails['country_id'] : ''; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label">State</label>
                                    <?php
                                    $stateValue = set_value('state');
                                    if (empty($stateValue)) :
                                        $stateValue = !empty($doctorAddress) ? $doctorAddress['state'] : '';
                                        $stateValue = htmlspecialchars($stateValue);
                                    endif;
                                    ?>
                                    <select name="state" class="form-select crancy__item-input" id="stateSelect" aria-label="Default select example" style="display: none;">
                                        <option value="">Select Your State</option>
                                        <?php
                                        if (!empty($stateNames)) :
                                            foreach ($stateNames as $key => $states) :
                                                echo '<option value="' . $states['state_id'] . '" ' . set_select('state', $states['state_id'], $states['state_id'] == $stateValue) . '>' . $states['name'] . '</option>';
                                            endforeach;
                                        endif;
                                        ?>
                                    </select>
                                    <?php if (isset($validation)) :
                                        if ($validation->hasError('state')) : ?>
                                            <span class="errMsg"><?= $validation->getError('state') ?></span>
                                    <?php endif;
                                    endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label">City</label>
                                    <div id="cityListError"></div>
                                    <?php
                                    $cityValue = set_value('city');
                                    if (empty($cityValue)) :
                                        $cityValue = !empty($doctorAddress) ? $doctorAddress['city'] : '';
                                        $cityValue = htmlspecialchars($cityValue);
                                    endif;
                                    ?>
                                    <input class="d-none" id="selectedCity" value="<?= $cityValue; ?>">
                                    <select id="cityList" name="city" class="form-select crancy__item-input" aria-label="Default select example">
                                        <!--City Name-->
                                    </select>
                                    <?php if (isset($validation)) :
                                        if ($validation->hasError('city')) : ?>
                                            <span class="errMsg"><?= $validation->getError('city') ?></span>
                                    <?php endif;
                                    endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label">Address</label>
                                    <?php
                                    $addressValue = set_value('address');
                                    if (empty($addressValue)) :
                                        $addressValue = !empty($doctorAddress) ? $doctorAddress['address'] : '';
                                        $addressValue = htmlspecialchars($addressValue);
                                    endif;
                                    ?>
                                    <input name="address" class="crancy__item-input" type="text" value="<?= $addressValue ?>" placeholder="Your Address..">
                                    <?php if (isset($validation)) :
                                        if ($validation->hasError('address')) : ?>
                                            <span class="errMsg"><?= $validation->getError('address') ?></span>
                                    <?php endif;
                                    endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label">Postal Code</label>
                                    <?php
                                    $postalCodeValue = set_value('postal_code');
                                    if (empty($postalCodeValue)) :
                                        $postalCodeValue = !empty($doctorAddress) ? $doctorAddress['postal_code'] : '';
                                        $postalCodeValue = htmlspecialchars($postalCodeValue);
                                    endif;
                                    ?>
                                    <input name="postal_code" class="crancy__item-input" value="<?= $postalCodeValue ?>" type="text" placeholder="Your Postal Code..">
                                    <?php if (isset($validation)) :
                                        if ($validation->hasError('postal_code')) : ?>
                                            <span class="errMsg"><?= $validation->getError('postal_code') ?></span>
                                    <?php endif;
                                    endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12"></div>
                            <div class="col-lg-12 col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label">Postal Code</label>
                                <?php
                                    $aboutValue = set_value('about');
                                    if (empty($aboutValue)) {
                                        $aboutValue = !empty($doctorDetails) ? $doctorDetails['about'] : '';
                                        $licensaboutValueeNumberValue = htmlspecialchars($aboutValue);
                                    }
                                ?>
                                <textarea name="about" placeholder="Short Bio..." id="about"><?= $aboutValue; ?></textarea>
                                <?php if (isset($validation)) :
                                    if ($validation->hasError('about')) : ?>
                                        <span class="errMsg"><?= $validation->getError('about') ?></span>
                                <?php endif;
                                endif; ?>
                            </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="crancy-flex__right mg-top-40">
                        <button class="crancy-btn" type="submit">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
            <div class="col-4"> 
                <div class="crancy-ptabs__form-update">
                    <div class="crancy-ptabs__sidebar">
                        <div class="crancy-ptabs__ssingle crancy-ptabs__srofile">
                            <div class="crancy-ptabs__sheading">
                                <h4 class="crancy-ptabs__stitle">
                                    Update Profile
                                </h4>
                            </div>
                        <form>
                            <div class="crancy-ptabs__sauthor">
                                <div class="crancy-ptabs__sauthor-img crancy-ptabs__pthumb">
                                    <div id="profileImg">
                                        <?php if (!empty($doctorDetails) and $doctorDetails['profile_pic'] != '' and $doctorDetails['profile_pic'] != null) : ?>
                                            <img src="<?= DOCTOR_PROFILE_PIC_PATH . $doctorDetails['profile_pic']; ?>" alt="#">
                                        <?php else : ?>
                                            <img src="img/profile-side.png" alt="#">
                                        <?php endif; ?>
                                    </div>
                                    <label class="crancy-ptabs__sedit" for="file-input">
                                        <span>
                                            <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16.5147 11.5C17.7284 12.7137 18.9234 13.9087 20.1296 15.115C19.9798 15.2611 19.8187 15.4109 19.6651 15.5683C17.4699 17.7635 15.271 19.9587 13.0758 22.1539C12.9334 22.2962 12.7948 22.4386 12.6524 22.5735C12.6187 22.6034 12.5663 22.6296 12.5213 22.6296C11.3788 22.6334 10.2362 22.6297 9.09365 22.6334C9.01498 22.6334 9 22.6034 9 22.536C9 21.4009 9 20.2621 9.00375 19.1271C9.00375 19.0746 9.02997 19.0109 9.06368 18.9772C10.4123 17.6249 11.7609 16.2763 13.1095 14.9277C14.2295 13.8076 15.3459 12.6913 16.466 11.5712C16.4884 11.5487 16.4997 11.5187 16.5147 11.5Z" fill="white"></path>
                                                <path d="M20.9499 14.2904C19.7436 13.0842 18.5449 11.8854 17.3499 10.6904C17.5634 10.4694 17.7844 10.2446 18.0054 10.0199C18.2639 9.76139 18.5261 9.50291 18.7884 9.24443C19.118 8.91852 19.5713 8.91852 19.8972 9.24443C20.7251 10.0611 21.5492 10.8815 22.3771 11.6981C22.6993 12.0165 22.7105 12.4698 22.3996 12.792C21.9238 13.2865 21.4443 13.7772 20.9686 14.2717C20.9648 14.2792 20.9536 14.2867 20.9499 14.2904Z" fill="white"></path>
                                            </svg>
                                        </span>
                                    </label>
                                    <input id="file-input" class="image" type="file" data-target="#modalCropPic" accept=".jpg, .jpeg, .png, .gif"  data-column="profile_pic" data-fileFor="doctorProfilePic">
                                </div>
                            </div>

                            <div class="crancy-ptabs__ssingle crancy-ptabs__scover">
                                <div class="crancy-ptabs__sheading">
                                    <h4 class="crancy-ptabs__stitle crancy-ptabs__stitle--update">
                                        Update Id Proof
                                    </h4>
                                </div>
                                <div class="crancy-ptabs__sauthor-img crancy-ptabs__pthumb">
                                    <div id="idProofImg">
                                        <?php
                                        if (!empty($documents)) :
                                            $result = array_filter($documents, function ($item) {
                                                return $item['column_name'] === 'ID_PROOF';
                                            });
                                            // Get the file_name if found
                                            $fileName = !empty($result) ? reset($result)['file_name'] : null;
                                            $fileExtension = $fileName ? pathinfo($fileName, PATHINFO_EXTENSION) : null;
                                            if($fileExtension!=null && $fileExtension=='png'):
                                        ?>
                                            <img src="<?= DOCTOR_ID_PROOF_FILE_PATH . $fileName; ?>" alt="">
                                        <?php elseif($fileExtension!=null && $fileExtension=='pdf'): ?>
                                            <img src="<?= INNER_IMAGES_PATH .'pdf-icon.svg'; ?>" alt="">
                                        <?php elseif($fileExtension!=null && ($fileExtension=='doc' || $fileExtension=='docx')):?>
                                            <img src="<?= INNER_IMAGES_PATH .'doc-icon.svg'; ?>" alt="">
                                        <?php endif; ?>
                                        <?php else: ?>
                                            <img src="img/side-cover.png" alt="#">
                                        <?php endif; ?>
                                    </div>
                                    <label class="crancy-ptabs__sedit" for="document-file-input">
                                        <span>
                                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16.5147 11.5C17.7284 12.7137 18.9234 13.9087 20.1296 15.115C19.9798 15.2611 19.8187 15.4109 19.6651 15.5683C17.4699 17.7635 15.271 19.9587 13.0758 22.1539C12.9334 22.2962 12.7948 22.4386 12.6524 22.5735C12.6187 22.6034 12.5663 22.6296 12.5213 22.6296C11.3788 22.6334 10.2362 22.6297 9.09365 22.6334C9.01498 22.6334 9 22.6034 9 22.536C9 21.4009 9 20.2621 9.00375 19.1271C9.00375 19.0746 9.02997 19.0109 9.06368 18.9772C10.4123 17.6249 11.7609 16.2763 13.1095 14.9277C14.2295 13.8076 15.3459 12.6913 16.466 11.5712C16.4884 11.5487 16.4997 11.5187 16.5147 11.5Z" fill="white"></path>
                                                <path d="M20.9499 14.2904C19.7436 13.0842 18.5449 11.8854 17.3499 10.6904C17.5634 10.4694 17.7844 10.2446 18.0054 10.0199C18.2639 9.76139 18.5261 9.50291 18.7884 9.24443C19.118 8.91852 19.5713 8.91852 19.8972 9.24443C20.7251 10.0611 21.5492 10.8815 22.3771 11.6981C22.6993 12.0165 22.7105 12.4698 22.3996 12.792C21.9238 13.2865 21.4443 13.7772 20.9686 14.2717C20.9648 14.2792 20.9536 14.2867 20.9499 14.2904Z" fill="white"></path>
                                            </svg>
                                        </span>
                                    </label>
                                    <input id="document-file-input" class="image" type="file" data-target="#modalCropPic" data-column="ID_PROOF" data-fileFor="doctorDocumentPic">
                                </div>
                            </div>
                        </form>
                                <!--Tags Start-->
                                <div class="crancy-ptabs__ssingle crancy-ptabs__scover"> 
                                    <h4 class="crancy-ptabs__stitle crancy-ptabs__stitle--update selh4">Language</h4>
                                    <div id="tags-language">
                                    <?php foreach($dr_language as $drlanguage): ?>
                                        <div class="tag-container" data-druid="<?= $doctorDetails['user_id']; ?>" data-tag="<?= $drlanguage['language_name']; ?>">
                                            <span><?= $drlanguage['language_name']; ?></span>
                                            <input type="hidden" name="language[]" value="<?= $drlanguage['language_id']; ?>">
                                            <a href="javascript:void(0);" title="Removing tag" onclick="removeTag('<?= $drlanguage['language_name']; ?>', '<?= $drlanguage['language_id']; ?>', '#tags-language', '<?= $doctorDetails['user_id']; ?>')">x</a>
                                        </div>
                                    <?php endforeach; ?>
                                    </div>
                                    <select id="language" data-druid="<?= $doctorDetails['user_id']; ?>" class="form-select crancy__item-input">
                                        <option value="" data-value="">Select a language</option>
                                        <?php 
                                            foreach($languages as $language ){
                                                echo '<option value="'.$language["id"].'" data-value="'.$language["name"].'">'.$language["name"].'</option>';
                                            } 
                                        ?>
                                    </select>
                                    <?php if (isset($validation)) :
                                        if ($validation->hasError('language')) : ?>
                                            <span class="errMsg"><?= $validation->getError('language') ?></span>
                                    <?php endif;
                                    endif; ?>
                               
                                    <h4 class="crancy-ptabs__stitle crancy-ptabs__stitle--update selh4">Specialization</h4>
                                    <div id="tags-speciality">
                                        <?php foreach($dr_specialization as $drspecialization): ?>
                                        <div class="tag-container" data-druid="<?= $doctorDetails['user_id']; ?>" data-tag="<?= $drspecialization['specialization']; ?>">
                                            <span><?= $drspecialization['specialization']; ?></span>
                                            <input type="hidden" name="speciality[]" value="<?= $drspecialization['specialization_id']; ?>">
                                            <a href="javascript:void(0);" title="Removing tag" onclick="removeTag('<?= $drspecialization['specialization']; ?>', '<?= $drspecialization['specialization_id']; ?>', '#tags-speciality', '<?= $doctorDetails['user_id']; ?>')">x</a>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <select id="speciality" data-druid="<?= $doctorDetails['user_id']; ?>" class="form-select crancy__item-input">
                                        <option value="" data-value="">Select a specialization</option>
                                        <?php 
                                            foreach($specializations as $specialization ){
                                                echo '<option value="'.$specialization["id"].'" data-value="'.$specialization["specialization"].'">'.$specialization["specialization"].'</option>';
                                            } 
                                        ?>
                                    </select>
                                    <?php if (isset($validation)) :
                                        if ($validation->hasError('speciality')) : ?>
                                            <span class="errMsg"><?= $validation->getError('speciality') ?></span>
                                    <?php endif;
                                    endif; ?>
                                
                                    <h4 class="crancy-ptabs__stitle crancy-ptabs__stitle--update selh4">Qualification</h4>
                                    <div id="qualification-tags">
                                        <?php foreach($dr_qualification as $drqualification): ?>
                                        <div class="tag-container" data-druid="<?= $doctorDetails['user_id']; ?>" data-tag="<?= $drqualification['qualification'];?>">
                                            <span><?= $drqualification['qualification'];?></span>
                                            <input type="hidden" name="qualification[]" value="<?= $drqualification['qualification'];?>">
                                            <a href="javascript:void(0);" title="Removing tag" onclick="removeTag('<?= $drqualification['qualification'];?>', '<?= $drqualification['qualification'];?>', '#qualification-tags', '<?= $doctorDetails['user_id']; ?>')">x</a>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <input class="crancy__item-input" data-druid="<?= $doctorDetails['user_id']; ?>" id="qualification" name="qualification" type="text" placeholder="Qualification">
                                    <?php if (isset($validation)) :
                                        if ($validation->hasError('qualification')) : ?>
                                            <span class="errMsg"><?= $validation->getError('qualification') ?></span>
                                    <?php endif;
                                    endif; ?>          
                                <!--Tags End-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php //echo '<pre>'; print_r($serviceRates); ?>

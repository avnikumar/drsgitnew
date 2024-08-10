<?= $this->extend("layouts/front") ?>

<?= $this->section("body") ?>
<section class="banner-area">
    <div class="filter-search container">
        <form id="searchForm">
            <div class="search-detail default-search ">
                <div class="search-input">
                    <select name="speciality" id="speciality" class="form-select filter-form" aria-label=" select example">
                        <option selected>Speciality</option>
                        <option value="Allergy">Allergy</option>
                        <option value="Alternative Medicine">Alternative Medicine</option>
                        <option value="Ayurvedic Medicine">Ayurvedic Medicine</option>
                        <option value="Bariatric Surgery">Bariatric Surgery</option>
                        <option value="Behavioral Optometry">Behavioral Optometry</option>
                        <option value="Breast Surgery">Breast Surgery</option>
                        <option value="Cancer Surgery">Cancer Surgery</option>
                        <option value="Cardiac Surgery">Cardiac Surgery</option>
                        <option value="Cardiology">Cardiology</option>
                        <option value="Chest Physician">Chest Physician</option>
                        <option value="Clinical Audiologist and Speech Pathologist">Clinical Audiologist and Speech Pathologist</option>
                        <option value="Clinical Optometry">Clinical Optometry</option>
                        <option value="Cochlear Implant">Cochlear Implant</option>
                        <option value="Consultant Periodontist & Implantologist">Consultant Periodontist & Implantologist</option>
                        <option value="Corneal and Cosmetic Contact Lens Practice">Corneal and Cosmetic Contact Lens Practice</option>
                        <option value="Cosmetologist">Cosmetologist</option>
                        <option value="Critical Care">Critical Care</option>
                        <option value="Dentistry">Dentistry</option>
                        <option value="Dermatology">Dermatology</option>
                        <option value="Diabetologist">Diabetologist</option>
                        <option value="Dietician">Dietician</option>
                        <option value="Emergency Physician">Emergency Physician</option>
                        <option value="Endocrinology">Endocrinology</option>
                        <option value="ENT">ENT</option>
                        <option value="Eye Care">Eye Care</option>
                        <option value="Family Medicine">Family Medicine</option>
                        <option value="Gastroenterologist">Gastroenterologist</option>
                        <option value="General Dentist">General Dentist</option>
                        <option value="General Physician">General Physician</option>
                        <option value="General Plastic Surgeon">General Plastic Surgeon</option>
                        <option value="General Practitioner">General Practitioner</option>
                        <option value="General Surgery">General Surgery</option>
                        <option value="Geriatric">Geriatric</option>
                        <option value="Gynaecology and Gynae Oncology">Gynaecology and Gynae Oncology</option>
                        <option value="Haemoto Oncology">Haemoto Oncology</option>
                        <option value="Hair Transplant Surgeon">Hair Transplant Surgeon</option>
                        <option value="Head and Neck Oncology">Head and Neck Oncology</option>
                        <option value="Head and Neck Surgery">Head and Neck Surgery</option>
                        <option value="Hematology">Hematology</option>
                        <option value="Hernia Surgery">Hernia Surgery</option>
                        <option value="Homeopathy">Homeopathy</option>
                        <option value="Immunology and Rheumatology">Immunology and Rheumatology</option>
                        <option value="Internal Medicine">Internal Medicine</option>
                        <option value="Joint Replacement">Joint Replacement</option>
                        <option value="Laparoscopic Surgery">Laparoscopic Surgery</option>
                        <option value="Lifestyle Medicine">Lifestyle Medicine</option>
                        <option value="Maxillofacial surgery">Maxillofacial surgery</option>
                        <option value="Medical Doctor">Medical Doctor</option>
                        <option value="Medical Marijuana">Medical Marijuana</option>
                        <option value="Medical Supply Store">Medical Supply Store</option>
                        <option value="Obstetrices and Gynecologist">Obstetrices and Gynecologist</option>
                        <option value="Obstetrics Gynecologist">Obstetrics Gynecologist</option>
                        <option value="Occupational Eye Health and Safety">Occupational Eye Health and Safety</option>
                        <option value="Occupational Medicine">Occupational Medicine</option>
                        <option value="Oncology">Oncology</option>
                        <option value="Ophthalmology">Ophthalmology</option>
                        <option value="Ophthalmology Retina">Ophthalmology Retina</option>
                        <option value="Optometrist">Optometrist</option>
                        <option value="Orthodontist">Orthodontist</option>
                        <option value="Orthopedic">Orthopedic</option>
                        <option value="Pathology">Pathology</option>
                        <option value="Pediatric Endocrinology">Pediatric Endocrinology</option>
                        <option value="Pediatric Neurology">Pediatric Neurology</option>
                        <option value="Pediatric Optometry">Pediatric Optometry</option>
                        <option value="Pediatrician">Pediatrician</option>
                        <option value="Physical Therapy">Physical Therapy</option>
                        <option value="Physician Assistant">Physician Assistant</option>
                        <option value="Physiotherapy">Physiotherapy</option>
                        <option value="Plastic Surgeon">Plastic Surgeon</option>
                        <option value="Practical Vision Therapy">Practical Vision Therapy</option>
                        <option value="Primary Care">Primary Care</option>
                        <option value="Psychiatry">Psychiatry</option>
                        <option value="Psychology">Psychology</option>
                        <option value="Pulmonologist">Pulmonologist</option>
                        <option value="Radiologist">Radiologist</option>
                        <option value="Radiology and Imaging">Radiology and Imaging</option>
                        <option value="Reproductive Endocrinology and Fertility">Reproductive Endocrinology and Fertility</option>
                        <option value="Respiratory Medicine">Respiratory Medicine</option>
                        <option value="Rheumatology">Rheumatology</option>
                        <option value="Sleep Medicine">Sleep Medicine</option>
                        <option value="Sleep Medicine and Sleep Surgery">Sleep Medicine and Sleep Surgery</option>
                        <option value="Urgent Care">Urgent Care</option>
                        <option value="Urology">Urology</option>
                        <option value="Urology and Andrology">Urology and Andrology</option>
                        <option value="Weight Loss Surgery">Weight Loss Surgery</option>
                    </select>
                </div>
                <div class="search-input">
                    <!-- <input type="number" name="experience" id="exprnce" class="filter-form" placeholder="Experience" > -->
                    <select name="experience" id="experience" class="form-select filter-form" aria-label=" select example">
                        <option selected>Experience</option>
                        <option value="5+ years experience">5+ years experience</option>
                        <option value="10+ years experience">10+ years experience</option>
                        <option value="15+ years experience">15+ years experience</option>
                        <option value="20+ years experience">20+ years experience</option>
                    </select>
                </div>
                <div class="search-input">
                    <!-- <input type="text" class="filter-form" placeholder="Location"> -->
                    <select name="location" id="location" class="form-select filter-form" aria-label=" select example">
                        <option selected>Location</option>
                        <option value="India">India</option>
                        <option value="United States">United States</option>
                    </select>
                </div>
                <div class="submit-btn-area">
                    <input type="submit" value="Search" class="search-btn">
                    <button type="button" id="filter-search" data-bs-toggle="modal" data-bs-target="#exampleModal" class="search-btn">Filter Search </button>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-transparent">
                        <div class="search-detail filter-search-area">
                            <div class="row">
                                <div class="col-sm-12 mb-2">
                                    <div class="search-input">
                                        <select name="gender" id="gndr" class="form-select filter-form" aria-label="select example">
                                            <option selected>Select Gender</option>
                                            <option value="Female">Female</option>
                                            <option value="Male">Male</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="search-input">
                                        <!-- <input type="text" class="filter-form" placeholder="Location"> -->
                                        <select name="price" id="price" class="form-select filter-form" aria-label=" select example">
                                            <option selected>Price</option>
                                            <option value="₹0 - ₹500">₹0 - ₹500</option>
                                            <option value="Above ₹500">Above ₹500</option>
                                            <option value="Above ₹1000">Above ₹1000</option>
                                            <option value="Above ₹2000">Above ₹2000</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="search-input">
                                        <select name="consulttype" id="consultype" class="form-select filter-form" aria-label=" select example">
                                            <option selected>Consult Type</option>
                                            <option value="Virtual">Virtual</option>
                                            <option value="Clinic Visit">Clinic Visit</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="submit-btn-area mt-3 w-100 justify-content-end">
                                    <input type="submit" value="Search" class="search-btn">
                                    <button type="button" id="go-back" data-bs-dismiss="modal" class="search-btn">Go Back</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="banner-slider third">
        <div class="slider-item full">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div class="left second">
                            <h2>Medical Online Second Opinion</h2>
                            <p>Feeling uncertain about your diagnosis? <br>Take control of your health. Trust our thorough review and meticulous analysis</p>
                            <a href="#" class="pri-btn d-flex">Contact Us</a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2">
                        <div class="pic">
                            <img src="/public/front/images/bannerpic2.webp" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-item full">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div class="left second">
                            <h2>Medical Online Second Opinion</h2>
                            <p>Feeling uncertain about your diagnosis? <br>Take control of your health. Trust our thorough review and meticulous analysis</p>
                            <a href="#" class="pri-btn d-flex">Contact Us</a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2">
                        <div class="pic">
                            <img src="/public/front/images/bannerpic2.webp" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-item full">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div class="left second">
                            <h2>Medical Online Second Opinion</h2>
                            <p>Feeling uncertain about your diagnosis? <br>Take control of your health. Trust our thorough review and meticulous analysis</p>
                            <a href="#" class="pri-btn d-flex">Contact Us</a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2">
                        <div class="pic">
                            <img src="/public/front/images/bannerpic2.webp" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="why-area">
    <div class="container">
        <div class="choose mb-4">
            <h2 class="heading">Why <span>Choose Us?</span></h2>
            <p class="para d-none">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            <div class="row">
                <div class="col-md-3 col-6">
                    <div class="why-box">
                        <span class="number">450+</span>
                        <p class="content">
                            Lorem Ipsum is simply dummy text of the printing
                        </p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="why-box">
                        <span class="number">90+</span>
                        <p class="content">
                            Lorem Ipsum is simply dummy text of the printing
                        </p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="why-box">
                        <span class="number">70+</span>
                        <p class="content">
                            Lorem Ipsum is simply dummy text of the printing
                        </p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="why-box">
                        <span class="number">1000+</span>
                        <p class="content">
                            Lorem Ipsum is simply dummy text of the printing
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="network text-center">
            <h2 class="heading">Our network of world class doctors are highly experienced in their field of expertise,</h2>
            <p class="para">with a proven record of successful treatments. Applying corrections to over 60% of all diagnoses reviewed, they have highly improved our patients’ recovery rates. </p>
            <div class="network-slider">
                <div class="item">
                    <div class="pic">
                        <img src="/public/front/images/n1.webp" class="image" alt="">
                        <img src="/public/front/images/india.webp" class="flag" alt="">
                    </div>
                    <div class="details">
                        <h2 class="name">Dr. Prateek Yadav </h2>
                        <p class="role">Psychiatry</p>
                        <a href="#" class="read-btn">Read More</a>
                    </div>
                </div>
                <div class="item">
                    <div class="pic">
                        <img src="/public/front/images/n2.webp" class="image" alt="">
                        <img src="/public/front/images/canada.webp" class="flag" alt="">
                    </div>
                    <div class="details">
                        <h2 class="name">Dr. Garima Malik</h2>
                        <p class="role">Dermatology</p>
                        <a href="#" class="read-btn">Read More</a>
                    </div>
                </div>
                <div class="item">
                    <div class="pic">
                        <img src="/public/front/images/n3.webp" class="image" alt="">
                        <img src="/public/front/images/china.webp" class="flag" alt="">
                    </div>
                    <div class="details">
                        <h2 class="name">Dr. Abhijeet Ranjan </h2>
                        <p class="role">Family Medicine</p>
                        <a href="#" class="read-btn">Read More</a>
                    </div>
                </div>
                <div class="item">
                    <div class="pic">
                        <img src="/public/front/images/n4.webp" class="image" alt="">
                        <img src="/public/front/images/us.webp" class="flag" alt="">
                    </div>
                    <div class="details">
                        <h2 class="name">Dr. Shubha Bhalla</h2>
                        <p class="role">Rheumatology</p>
                        <a href="#" class="read-btn">Read More</a>
                    </div>
                </div>
                <div class="item">
                    <div class="pic">
                        <img src="/public/front/images/n5.webp" class="image" alt="">
                        <img src="/public/front/images/kuwet.webp" class="flag" alt="">
                    </div>
                    <div class="details">
                        <h2 class="name">Dr. Ashwani Chopra</h2>
                        <p class="role">General Physician</p>
                        <a href="#" class="read-btn">Read More</a>
                    </div>
                </div>
                <div class="item">
                    <div class="pic">
                        <img src="/public/front/images/n3.webp" class="image" alt="">
                        <img src="/public/front/images/china.webp" class="flag" alt="">
                    </div>
                    <div class="details">
                        <h2 class="name">Dr. Abhijeet Ranjan </h2>
                        <p class="role">Family Medicine</p>
                        <a href="#" class="read-btn">Read More</a>
                    </div>
                </div>
                <div class="item">
                    <div class="pic">
                        <img src="/public/front/images/n6.webp" class="image" alt="">
                        <img src="/public/front/images/brazil.webp" class="flag" alt="">
                    </div>
                    <div class="details">
                        <h2 class="name">Dr. Punit Gupta</h2>
                        <p class="role">Nephrology</p>
                        <a href="#" class="read-btn">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="how-area">
    <div class="container">
        <div class="section-title">
            <h2>How it <span>Works</span></h2>
            <p class="para">Booking a 2nd opinion is as easy as 123.</p>
        </div>
        <div class="box-area mt-4">
            <div class="how-box">
                <span class="number"><span>1</span></span>
                <p class="content">Download <b>“Drs on calls”</b></p>
            </div>
            <div class="arrow-icon"><i class="fa-solid fa-right-long"></i></div>
            <div class="how-box">
                <span class="number"><span>2</span></span>
                <p class="content">Click <b>book appointment</b> and <b>select second opinion</b></p>
            </div>
            <div class="arrow-icon"><i class="fa-solid fa-right-long"></i></div>
            <div class="how-box">
                <span class="number"><span>3</span></span>
                <p class="content">Select the medical expert of your choice</p>
            </div>
        </div>
    </div>
</section>
<section class="inform-area">
    <div class="container">
        <div class="details mb-3">
            <p class="para mb-4">A specially selected registered nurse will walk with you throughout the process and follow up with you regularly. You don’t have to leave
                home or go to a doctor’s office to pick up or transfer any of your medical records or previous test results. The nurse takes care of this for you.
                You don’t have to switch doctors.</p>
            <p class="para">
                After thoroughly reviewing your diagnosis and current treatment plan, the medical expert will give you a detailed report that’s easy to understand.
                The report can also be sent to your treating physician if you choose to share it. While the report may include treatment recommendations,
                you and your doctor will make all decisions about your care. Throughout the process, your records and consultations will remain
                private and held in strict confidentiality (according to HIPAA1 regulations).
            </p>
        </div>
        <div class="your">
            <h2>Your health. Your voice. Your decision</h2>
        </div>
    </div>
</section>
<section class="countries-area">
    <div class="container">
        <div class="section-title">
            <h2>Countries <span>We Serve</span></h2>
            <p class="mt-2">Our mission is to improve healthcare by connecting patients worldwide with world leading physicians specializing in their particular condition.</p>
            <div class="countries-slider my-3">
                <div class="item">
                    <img src="/public/front/images/us-flag.webp" alt="">
                </div>
                <div class="item">
                    <img src="/public/front/images/in-flag.webp" alt="">
                </div>

                <div class="item">
                    <img src="/public/front/images/phi-flag.webp" alt="">
                </div>
                <div class="item">
                    <img src="/public/front/images/ye-flag.webp" alt="">
                </div>
                <div class="item">
                    <img src="/public/front/images/pak-flag.webp" alt="">
                </div>
                <div class="item">
                    <img src="/public/front/images/ar-flag.webp" alt="">
                </div>
                <div class="item">
                    <img src="/public/front/images/us-flag.webp" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
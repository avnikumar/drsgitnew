<?= $this->extend("layouts/front") ?>

<?= $this->section("body") ?>
<section class="banner-area">
        <div class="filter-search container">
          <form id="searchForm">
            <div class="search-detail default-search ">
              <div class="search-input">
                <select name="speciality" id="speciality" class="form-select filter-form" aria-label=" select example" >
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
                <select name="experience" id="experience" class="form-select filter-form" aria-label=" select example" >
                  <option selected>Experience</option>
                  <option value="5+ years experience">5+ years experience</option>
                  <option value="10+ years experience">10+ years experience</option>
                  <option value="15+ years experience">15+ years experience</option>
                  <option value="20+ years experience">20+ years experience</option>
                </select>
              </div>
              <div class="search-input">
                <!-- <input type="text" class="filter-form" placeholder="Location"> -->
                <select name="location" id="location" class="form-select filter-form" aria-label=" select example" >
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
                          <select name="gender" id="gndr" class="form-select filter-form" aria-label="select example" >
                            <option selected>Select Gender</option>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="search-input">
                          <!-- <input type="text" class="filter-form" placeholder="Location"> -->
                          <select name="price" id="price" class="form-select filter-form" aria-label=" select example" >
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
                          <select name="consulttype" id="consultype" class="form-select filter-form" aria-label=" select example" >
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
        <div class="banner-slider">
          <div class="slider-item">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-lg-6 order-2 order-lg-1">
                  <div class="left  ">
                    <h2>SKIP THE WATING ROOM</h2>
                    <p>Spack to a Doctor <br>24/7 Anytime, Anywhere</p>
                    <a href="#" class="pri-btn d-flex">Contact Us</a>
                  </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                  <div class="pic"> 
                    <img src="/public/front/images/banner.webp" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="slider-item">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-lg-6 order-2 order-lg-1">
                  <div class="left ">
                    <h2>SKIP THE WATING ROOM</h2>
                    <p>Spack to a Doctor <br>24/7 Anytime, Anywhere</p>
                    <a href="#" class="pri-btn d-flex">Contact Us</a>
                  </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                  <div class="pic"> 
                    <img src="/public/front/images/banner.webp" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="slider-item">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-lg-6 order-2 order-lg-1">
                  <div class="left ">
                    <h2>SKIP THE WATING ROOM</h2>
                    <p>Spack to a Doctor <br>24/7 Anytime, Anywhere</p>
                    <a href="#" class="pri-btn d-flex">Contact Us</a>
                  </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                  <div class="pic"> 
                    <img src="/public/front/images/banner.webp" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <section class="services-area">
      <div class="container">
        <div class="section-title">
          <h2>Explore Our <span>Services</span></h2>
        </div>
        <div class="mb-4" id="services-slider">
          <div class="">
            <div class="services-item">
              <h4>Virtual Care</h4>
              <div class="pic">
                <img src="/public/front/images/s1.webp" alt="">
              </div>
            </div>
          </div>
          <div class="">
            <div class="services-item">
              <h4> Clinic Visit</h4>
              <div class="pic">
                <img src="/public/front/images/s2.webp" alt="">
              </div>
            </div>
          </div>
          <div class="">
            <div class="services-item">
              <h4>Second Opinion</h4>
              <div class="pic">
                <img src="/public/front/images/s3.webp" alt="">
              </div>
            </div>
          </div>
          <div class="">
            <div class="services-item">
              <h4>White Label</h4>
              <div class="pic">
                <img src="/public/front/images/s4.webp" alt="">
              </div>
            </div>
          </div>
          <div class="">
            <div class="services-item">
              <h4>Pharmacy</h4>
              <div class="pic">
                <img src="/public/front/images/s5.webp" alt="">
              </div>
            </div>
          </div>
          <div class="">
            <div class="services-item">
              <h4>Lab Test</h4>
              <div class="pic">
                <img src="/public/front/images/s2.webp" alt="">
              </div>
            </div>
          </div>
          <div class="">
            <div class="services-item">
              <h4>Telemedicine</h4>
              <div class="pic">
                <img src="/public/front/images/s6.webp" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="hospital-area">
      <div class="container">
        <div class="section-title">
          <h2>Check Out Our doctors in <span>Top Hospitals</span></h2>
        </div>
        <div class="hospital-slider" id="hospital-slider">
          <div class="slider-item">
            <div class="pic"><img src="/public/front/images/h1.png" alt=""></div>
            
          </div>
          <div class="slider-item">
            <div class="pic"><img src="/public/front/images/h2.png" alt=""></div>
            
          </div>
          <div class="slider-item">
            <div class="pic"><img src="/public/front/images/h3.png" alt=""></div>
           
          </div>
          <div class="slider-item">
            <div class="pic"><img src="/public/front/images/h4.png" alt=""></div>
            
          </div>
          <div class="slider-item">
            <div class="pic"><img src="/public/front/images/h1.png" alt=""></div>
            
          </div>
        </div>
      </div>
    </section>   
    <section class="shop-area">
      <div class="container">
        <div class="health-product mb-3">
          <h2 class="heading">Shop Health Products & Shop Pharmacy</h2>
          <div class="product-slider" id="health-product-slider">
            <div class="slide-item">
              <div class="pic"><img src="/public/front/images/s1.png" alt=""></div>
              <div class="content">
                <h2 class="name">Amara Gel Full Face...</h2>
                <div class="price">
                  <span><del>3999</del></span>
                  <span class="main">3919</span>
                </div>
                <div class="bottom">
                  <div class="offer">02% Off</div>
                  <a href="#" class="shop-btn">Buy</a>
                </div>
              </div>
            </div>
            <div class="slide-item">
              <div class="pic"><img src="/public/front/images/s2.png" alt=""></div>
              <div class="content">
                <h2 class="name">Airstart 10 From...</h2>
                <div class="price">
                  <span><del>39500</del></span>
                  <span class="main">38710</span>
                </div>
                <div class="bottom">
                  <div class="offer">02% Off</div>
                  <a href="#" class="shop-btn">Buy</a>
                </div>
              </div>
            </div>
            <div class="slide-item">
              <div class="pic"><img src="/public/front/images/s3.png" alt=""></div>
              <div class="content">
                <h2 class="name">Lorem Ipsum is simpl...</h2>
                <div class="price">
                  <span><del>5433</del></span>
                  <span class="main">5000</span>
                </div>
                <div class="bottom">
                  <div class="offer">00% Off</div>
                  <a href="#" class="shop-btn">Rent</a>
                </div>
              </div>
            </div>
            <div class="slide-item">
              <div class="pic"><img src="/public/front/images/s4.png" alt=""></div>
              <div class="content">
                <h2 class="name">10l Oxygen Cylinder...</h2>
                <div class="price">
                  <span><del>3000</del></span>
                  <span class="main">2700</span>
                </div>
                <div class="bottom">
                  <div class="offer">-10% Off</div>
                  <a href="#" class="shop-btn">Rent</a>
                </div>
              </div>
            </div>
            <div class="slide-item">
              <div class="pic"><img src="/public/front/images/s5.png" alt=""></div>
              <div class="content">
                <h2 class="name">Auto Cpap Machine...</h2>
                <div class="price">
                  <!-- <span><del>$00.00</del></span> -->
                  <span class="main">5000</span>
                </div>
                <div class="bottom">
                  <div class="offer">00% Off</div>
                  <a href="#" class="shop-btn">Rent</a>
                </div>
              </div>
            </div>
            <div class="slide-item">
              <div class="pic"><img src="/public/front/images/s6.png" alt=""></div>
              <div class="content">
                <h2 class="name">Lorem Ipsum is simpl...</h2>
                <div class="price">
                  <!-- <span><del>$00.00</del></span> -->
                  <span class="main">2456</span>
                </div>
                <div class="bottom">
                  <div class="offer">00% Off</div>
                  <a href="#" class="shop-btn">Rent</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="offer-area">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-sm-9 col-lg-10 col-md-9 mb-2 mb-md-0">
            <h4>Invest in your health! Get unlimited consultations, nutrition advice, discounts on lab tests and 
              pharmacy for as little as <span>$1</span> per day</h4>
          </div>
          <div class="col-sm-3 col-md-3 col-lg-2">
            <div class="action"><a href="#" class="d-flex pri-btn">Sign In</a></div>
          </div>
        </div>
      </div>
    </section>
    <section class="about-area">
      <div class="container">
        <div class="mid-title row">
          <div class="col-lg-4"></div>
          <div class="col-lg-8  right">
            <h2 class="title">Leadership</h2>
            
          </div>
        </div>
        <div class="main row">
          <div class="col-lg-4 d-none d-lg-block position-relative">
            <div class="left">
              <img src="/public/front/images/girl_on_phone.png" alt="">
              <div class="name-box">
                <h2>Mary Gorder</h2>
                <p>Founder/CEO</p>
              </div>
            </div>
          </div>
          <div class="col-lg-8 col-12">
            <div class="right">
              <p class="para">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
              <div class="cards ">
                <div class=" card-item">
                  <div class="pic"><img src="/public/front/images/avater2.webp" alt=""></div>
                  <div class="content">
                    <h2 class="name">Robert Frank </h2>
                    <p class="para">is simply dummy text of</p>
                  </div>
                </div>
                <div class=" card-item">
                  <div class="pic"><img src="/public/front/images/avater1.webp" alt=""></div>
                  <div class="content">
                    <h2 class="name">Michael How</h2>
                    <p class="para">is simply dummy text of</p>
                  </div>
                </div>
                <div class=" card-item">
                  <div class="pic"><img src="/public/front/images/avater3.webp" alt=""></div>
                  <div class="content">
                    <h2 class="name">Deepak Narula</h2>
                    <p class="para">is simply dummy text of</p>
                  </div>
                </div>
                <div class=" card-item">
                  <div class="pic"><img src="/public/front/images/avater4.webp" alt=""></div>
                  <div class="content">
                    <h2 class="name">Atul Jain</h2>
                    <p class="para">is simply dummy text of</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row top align-items-start about-us">
            <div class="col-md-4 col-6 mb-3 mb-lg-0 col-lg-3">
              <h4 class="top-title">About <span>Us</span></h4>
            </div>
            <div class="col-md-12 col-lg-9">
              <p class="top-para">We are a network of thousands of experienced, licensed and Board Certified Healthcare 
                Professionals providing quality, convenient, non-emergency medical consultations in the 
                comfort of your own home.  </p>
              <div class="action">
                <a href="#" class="pri-btn">Know More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="download-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-4  col-md-5 position-relative d-none d-md-block">
            <div class="left">
              <img src="/public/front/images/dctr-removebg-preview.png" alt="">
            </div>
          </div>
          <div class="col-lg-8 col-md-7 col-12">
            <div class="right">
              <h2 class="heading">Download <span>the App</span></h2>
              <p class="para">Search for Drs.On Calls</p>
              <h6 class="title">Enter Code FREE10 for 10% off of your first visit</h6>
              <form action="#">
                <div class="input-group">
                  <span class="input-group-text" id="inputGroup-sizing-default">+91</span>
                  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Enter Phone Number">
                </div>   
                <input type="submit" value="Send SMS" class="send-btn">
              </form>
              <div class="app">
                <a href="#"><img src="/public/front/images/app.webp" alt=""></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="newsroom-area">
      <div class="container">
        <div class="section-title">
          <h2>Newsroom</h2>
        </div>
        <div class="row mb-4">
          <div class="col-md-4 col-sm-6 mb-3">
            <div class="blog">
              <div class="pic"><img src="/public/front/images/newsroom_one.jpg" alt=""></div>
              <div class="content">
                <h2 class="title">Top MedTech Trends in 2024</h2>
                <p>
                  In 2024 the landscape of healthcare is set to undergo transformative changes, driven by cutting-edge advancements..
                  </p>
                  <div class="action"><a href="#" class="read-btn">Read More</a></div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 mb-3">
            <div class="blog">
              <div class="pic"><img src="/public/front/images/newsroom_two.jpg" alt=""></div>
              <div class="content">
                <h2 class="title">A light bulb went off: 'Alexa...</h2>
                <p>
                  As was the case with many healthcare organizations, the COVID-19 pandemic ushered in a significant increase in...
                  </p>
                  <div class="action"><a href="#" class="read-btn">Read More</a></div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 mb-3">
            <div class="blog">
              <div class="pic"><img src="/public/front/images/newsroom_three.jpg" alt=""></div>
              <div class="content">
                <h2 class="title">Blue Cross Blue Shield...</h2>
                <p>ALBANY, GA (WALB) - Many healthcare insurance companies have made a major change to their...</p>
                  <div class="action"><a href="#" class="read-btn">Read More</a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="action">
          <a href="#" class="pri-btn">Know More</a>
        </div>
      </div>
    </section>
    <section class="review-area">
      <div class="container">
        <div class="section-title">
          <h2>Customer <span>Reviews</span></h2>
        </div>
        <div class="row back">
          <div class="re">
            <div class="row">
              <div class="col-lg-6 col-md-12 col-12">
                  <div class="review-card row mb-3 justify-content-end">
                    <div class="col-lg-2 col-md-2 col-12 d-none d-md-block left"></div>
                    <div class=" col-md-10 right">
                      <p class="para">“Absolutely 10. My experiences with all things related to Drs. On Calls tend to be above...”
                        </p>
                      <div class="bottom">
                        <h2 class="name">Jose</h2>
                        <div class="review">
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="review-card row mb-3 justify-content-end">
                    <div class="col-lg-2 col-md-2 col-12 d-none d-md-block left"></div>
                    <div class=" col-md-10 right">
                      <p class="para">“Dr. Colon is first class. He managed this health crisis for me and made sure I was taken care of...”
                        </p>
                      <div class="bottom">
                        <h2 class="name">Lorem Ipsum</h2>
                        <div class="review">
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="review-card row mb-3 justify-content-end">
                    <div class="col-lg-2 col-md-2 col-12 d-none d-md-block left"></div>
                    <div class=" col-md-10 right">
                      <p class="para">“I’m so grateful to have partnered with healthcare providers who have created a place of such...”
                        </p>
                      <div class="bottom">
                        <h2 class="name">Beth</h2>
                        <div class="review">
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="review-card row mb-3 justify-content-end">
                    <div class="col-lg-2 col-md-2 col-12 d-none d-md-block left"></div>
                    <div class=" col-md-10 right">
                      <p class="para">“Absolutely 10. My experiences with all things related to Drs. On Calls tend to be above...”
                        </p>
                      <div class="bottom">
                        <h2 class="name">Jose</h2>
                        <div class="review">
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-lg-6 col-md-12 col-12">
                <div class="review-card row mb-3 justify-content-end">
                  <div class="col-lg-2 col-md-2 col-12 d-none d-md-block left"></div>
                  <div class=" col-md-10 right">
                    <p class="para">“Last night I lived and went through the very scary scene of being a Coronavirus 19 suspect...”
                    </p>
                    <div class="bottom">
                      <h2 class="name">Bruce</h2>
                      <div class="review">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="review-card row mb-3 justify-content-end">
                  <div class="col-lg-2 col-md-2 col-12 d-none d-md-block left"></div>
                  <div class=" col-md-10 right">
                    <p class="para">“When I recently got ill with a serious virus they were there with the response and follow up that...”
                      </p>
                    <div class="bottom">
                      <h2 class="name">Jimmy</h2>
                      <div class="review">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="review-card row mb-3 justify-content-end">
                  <div class="col-lg-2 col-md-2 col-12 d-none d-md-block left"></div>
                  <div class="col-md-10 right">
                    <p class="para">“Great service!!! It worth that price. Once my husband had strange symptoms and doctor...”
                      </p>
                    <div class="bottom">
                      <h2 class="name">Victoria</h2>
                      <div class="review">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="review-card row mb-3 justify-content-end">
                  <div class="col-lg-2 col-md-2 col-12 d-none d-md-block left"></div>
                  <div class="col-md-10 right">
                    <p class="para">“When I recently got ill with a serious virus they were there with the response and follow up that...”</p>
                    <div class="bottom">
                      <h2 class="name">Lorem Ipsum</h2>
                      <div class="review">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<?= $this->endSection() ?>
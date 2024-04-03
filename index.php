<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$con = mysqli_connect("localhost", "u766365105_user", "@Gemson21", "u766365105_thesi");


// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Thesi</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/ico.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">


  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center" style="background-image:linear-gradient(to right, #18a283 , #198d75);">
    <div class="container d-flex justify-content-between">

      <div class="logo" >
        <br><a style="height: 100%;" href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"><br>
        <p style="color:#ffffff;" class="font-italic">CSTC, Inc. - Pre-Registration and Strand Recommendation System</p></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li class="nav-link scrollto"><a href="#Strand"><span>Strand</span> </a></li>
          <li><a class="nav-link scrollto " href="#Admission">Admission</a></li>
          <li class="nav-link scrollto"><a href="#Campus"><span>Campus</span> </a></li>
          <li><a class="nav-link scrollto" href="Login/index.php">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- #header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="clearfix">
    <div class="container" data-aos="fade-up">

      <div class="hero-img" data-aos="zoom-out" >
        <!--<img src="assets/img/hero-img.svg" alt="" class="img-fluid">-->
      </div>

      <div class="hero-info" data-aos="zoom-in" >
        <h2>Discover Your Academic Path Today!</h2>
        <p style="color:#ffffff;">Ready to take the next step towards your educational journey? Our cutting-edge pre-enrollment system is here to guide you. With our advanced content-based filtering algorithm, we'll recommend the perfect academic strand tailored just for you. Say goodbye to uncertainty and hello to a brighter future.</p>
        <p style="color:#ffffff;"> Explore your potential | Find the ideal academic strand | Unleash your full potential</p>
        <div>
          <a href="Register/index.php" class="btn btn-glass scrollto">Register Now</a>
        </div>
      </div>

    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- =======  ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>Explore your Options and Career Paths</h3>
          <p>Whether you know exactly what you want to do with your life or you want to explore your options and career paths. we're here to help guide and push you along the way.</p>
        </header>

        <div class="row about-container">

          <div class="col-lg-6 content order-lg-1 order-2">

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><img src="assets/img/ico1.png"></div>
              <h4 class="title"><a href="">Personalized Strand Recommendations</a></h4>
              <p class="description">The content-based filtering algorithm can provide personalized strand recommendations based on your academic background, interests, and preferences. This can help you find strand that align with your goals and increase your engagement and motivation.</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><img src="assets/img/ico2.png"></div>
              <h4 class="title"><a href="">Improved Strand Selection Process</a></h4>
              <p class="description">The system can help you make informed decisions about your strand selections and ensure that you are on track to meet your academic goals. This can help you stay focused and motivated throughout your academic career.</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><img src="assets/img/ico3.png"></div>
              <h4 class="title"><a href="">Increased Efficiency</a></h4>
              <p class="description">The web-based system can streamline the strand selection and enrollment process, allowing you to quickly and easily search for and enroll in programs offered by CSTC. </p>
            </div>

          </div>

          <div class="col-lg-6 background order-lg-2" data-aos="zoom-in">
            <img src="assets/img/a1.png" class="img-fluid" alt="">
          </div>
        </div>

      </div>
    </section><!--  -->

    <!-- ======= Strand Section ======= -->
    <section id="Strand" class="section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>Senior High School Programs</h3>
          <p>CSTC provides excellent and distinctive academic programs for students that exemplify and demonstrate the extraordinary value of education.</p>
        </header>

        <div class="row justify-content-center">

          <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="100">
            <div class="box">
              <div class="icon"><i class="bi bi-calculator" style="color: #ff689b;"></i></div>
              <h4 class="title"><a href="">STEM</a></h4>
              <p class="description">Science, Technology, Engineering, and Mathematics is designed for students interested in pursuing careers in science, technology, engineering, and mathematics. It includes subjects like Physics, Chemistry, Calculus, and General Biology.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="200">
            <div class="box">
              <div class="icon"><i class="bi bi-bar-chart" style="color: #e9bf06;"></i></div>
              <h4 class="title"><a href="">ABM</a></h4>
              <p class="description">Accountancy, Business, and Management is for those aspiring to work in business and finance, this strand offers subjects like Accounting, Business Ethics and Social Responsibility, and Business Math.<br><br></p>
            </div>
          </div>

          <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="100">
            <div class="box">
              <div class="icon"><i class="bi bi-globe" style="color: #3fcdc7;"></i></div>
              <h4 class="title"><a href="">HUMSS</a></h4>
              <p class="description">Humanities and Social Sciences is for students with a strong interest in the social sciences, humanities, and arts. It includes subjects like Philippine Politics and Governance, Creative Writing, and World Religions and Belief Systems.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="200">
            <div class="box">
              <div class="icon"><i class="bi bi-binoculars" style="color:#41cf2e;"></i></div>
              <h4 class="title"><a href="">GAS</a></h4>
              <p class="description">General Academic Strand provides a broad range of subjects, allowing students to explore various fields before deciding on a specific career path.<br><br><br></p>
            </div>
          </div>

          <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="100">
            <div class="box">
              <div class="icon"><i class="bi bi-house-door" style="color: #d6ff22;"></i></div>
              <h4 class="title"><a href="">HE</a></h4>
              <p class="description">Home Economics focused on skills related to home management, food preparation, and other domestic activities.<br><br><br></p>
            </div>
          </div>

          <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="200">
            <div class="box">
              <div class="icon"><i class="bi bi-laptop" style="color: #4680ff;"></i></div>
              <h4 class="title"><a href="">ICT</a></h4>
              <p class="description">Information and Communications Technology is for students who are interested in technology and IT-related careers, it includes subjects like computer programming and web development.<br><br></p>
            </div>
          </div>

          <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="100">
            <div class="box">
              <div class="icon"><i class="bi bi-lightning" style="color: #ff689b;"></i></div>
              <h4 class="title"><a href="">IAE</a></h4>
              <p class="description">The Industrial Arts - Electrical typically includes a range of subjects and practical skills related to electrical systems, wiring, electronics, and electrical maintenance. <br><br><br></p>
            </div>
          </div>
          <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="200">
            <div class="box">
              <div class="icon"><i class="bi bi-tools" style="color: #e9bf06;"></i></div>
              <h4 class="title"><a href="">IAA</a></h4>
              <p class="description">The Industrial Arts Automotive is designed to provide students with knowledge and skills related to automotive technology, mechanics, and the maintenance and repair of vehicles.<br><br><br></p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Strand Section -->

    <!-- ======= Admission Section ======= -->
    <section id="Admission">
      <div class="container" data-aos="fade-up">
        
        <div class="row row-eq-height justify-content-center">

          <div class="col-lg-4 mb-4">
            <div class="card" data-aos="zoom-in" data-aos-delay="100">
              <div class="card-body">
                <h5 class="card-title">Admission Policies</h5><hr>
                <p class="card-text">At CSTC, we are committed to providing quality education and fostering a supportive learning environment for our students. To ensure a fair and transparent admission process, we have established the following admission policies</p><br>
                <a href="#about" class="btn btn-glass scrollto">read more</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card" data-aos="zoom-in" data-aos-delay="200">
              <div class="card-body">
                <h5 class="card-title">Admission Procedures </h5><hr>
                <p class="card-text">We strive to make the admission process as straightforward and welcoming as possible. Our aim is to ensure that every student and their family feel comfortable and supported during this important transition. Here is an overview of our admission procedure</p>
                <a href="#about" class="btn btn-glass scrollto">read more</a>
              </div>
            </div>
          </div>


          <div class="col-lg-4 mb-4">
            <div class="card" data-aos="zoom-in" data-aos-delay="200">
              <div class="card-body">
                <h5 class="card-title">Admission Requirement </h5><hr>
                <p class="card-text">We have outlined our admission requirements to help guide you through the application process. Our goal is to make the process clear and accessible to all families:</p><br><br>
                 <a href="#about" class="btn btn-glass scrollto">read more</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
<!--
  <!-- End Admission Section -->


    <!-- ======= Campus Section ======= -->
    <section id="Campus" class="section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3 class="section-title">Our Campuses</h3>
        </header>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".Sariaya">Sariaya</li>
              <li data-filter=".Lucena">Lucena</li>
              <li data-filter=".Atimonan">Atimonan</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-4 col-md-6 portfolio-item Sariaya">
            <div class="portfolio-wrap">
              <img src="assets/img/sariaya1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <div>
                  <a href="assets/img/sariaya1.jpg" data-gallery="portfolioGallery" title="Sariaya Campus" class="portfolio-lightbox link-preview"><i class="bi bi-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item Lucena">
            <div class="portfolio-wrap">
              <img src="assets/img/lucena1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <div>
                  <a href="assets/img/lucena1.jpg" data-gallery="portfolioGallery" title="Lucena Campus" class="portfolio-lightbox link-preview"><i class="bi bi-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item Atimonan">
            <div class="portfolio-wrap">
              <img src="assets/img/atimonan1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <div>
                  <a href="assets/img/atimonan1.jpg" data-gallery="portfolioGallery" title="Atimonan Campus" class="portfolio-lightbox link-preview"><i class="bi bi-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item Sariaya">
            <div class="portfolio-wrap">
              <img src="assets/img/sariaya2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <div>
                  <a href="assets/img/sariaya2.jpg" data-gallery="portfolioGallery" title="Sariaya Campus" class="portfolio-lightbox link-preview"><i class="bi bi-plus"></i></a>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 portfolio-item Lucena">
            <div class="portfolio-wrap">
              <img src="assets/img/lucena2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <div>
                  <a href="assets/img/lucena2.jpg" data-gallery="portfolioGallery" title="Lucena Campus" class="portfolio-lightbox link-preview"><i class="bi bi-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item Atimonan">
            <div class="portfolio-wrap">
              <img src="assets/img/atimonan2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <div>
                  <a href="assets/img/atimonan2.jpg" data-gallery="portfolioGallery" title="Atimonan Campus" class="portfolio-lightbox link-preview"><i class="bi bi-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item Sariaya">
            <div class="portfolio-wrap">
              <img src="assets/img/sariaya3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <div>
                  <a href="assets/img/sariaya3.jpg" data-gallery="portfolioGallery" title="Sariaya Campus" class="portfolio-lightbox link-preview"><i class="bi bi-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item Lucena">
            <div class="portfolio-wrap">
              <img src="assets/img/lucena3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <div>
                  <a href="assets/img/lucena3.jpg" data-gallery="portfolioGallery" title="Lucena Campus" class="portfolio-lightbox link-preview"><i class="bi bi-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item Atimonan">
            <div class="portfolio-wrap">
              <img src="assets/img/atimonan3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <div>
                  <a href="assets/img/atimonan3.jpg" data-gallery="portfolioGallery" title="Atimonan Campus" class="portfolio-lightbox link-preview"><i class="bi bi-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item Sariaya">
            <div class="portfolio-wrap">
              <img src="assets/img/sariaya4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <div>
                  <a href="assets/img/sariaya4.jpg" data-gallery="portfolioGallery" title="Sariaya Campus" class="portfolio-lightbox link-preview"><i class="bi bi-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item Lucena">
            <div class="portfolio-wrap">
              <img src="assets/img/lucena4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <div>
                  <a href="assets/img/lucena4.jpg" data-gallery="portfolioGallery" title="Lucena Campus" class="portfolio-lightbox link-preview"><i class="bi bi-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item Atimonan">
            <div class="portfolio-wrap">
              <img src="assets/img/atimonan4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <div>
                  <a href="assets/img/atimonan4.jpg" data-gallery="portfolioGallery" title="Atimonan Campus" class="portfolio-lightbox link-preview"><i class="bi bi-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Campus Section -->

    <!-- ======= Testimonials Section ======= -->
    <!--
    <section id="testimonials" class="section-bg">
      <div class="container" data-aso="zoom-in">

        <header class="section-header">
          <h3>Alumni Testimonials</h3>
        </header>

        <div class="row justify-content-center">
          <div class="col-lg-8">

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
              <div class="swiper-wrapper">

                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <img src="assets/img/testimonial-1.jpg" class="testimonial-img" alt="">
                    <h3>Saul Goodman</h3>
                    <h4>Ceo &amp; Founder</h4>
                    <p>
                      Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                    </p>
                  </div>
                </div>--><!-- End testimonial item -->
<!-- 
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <img src="assets/img/testimonial-2.jpg" class="testimonial-img" alt="">
                    <h3>Sara Wilsson</h3>
                    <h4>Designer</h4>
                    <p>
                      Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                    </p>
                  </div>
                </div>--><!-- End testimonial item -->
<!-- 
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <img src="assets/img/testimonial-3.jpg" class="testimonial-img" alt="">
                    <h3>Jena Karlis</h3>
                    <h4>Store Owner</h4>
                    <p>
                      Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                    </p>
                  </div>
                </div>--><!-- End testimonial item -->
<!-- 
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <img src="assets/img/testimonial-4.jpg" class="testimonial-img" alt="">
                    <h3>Matt Brandon</h3>
                    <h4>Freelancer</h4>
                    <p>
                      Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                    </p>
                  </div>
                </div>--><!-- End testimonial item -->
<!-- 
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <img src="assets/img/testimonial-5.jpg" class="testimonial-img" alt="">
                    <h3>John Larson</h3>
                    <h4>Entrepreneur</h4>
                    <p>
                      Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                    </p>
                  </div>
                </div>--><!-- End testimonial item -->
<!-- 
              </div>
              <div class="swiper-pagination"></div>
            </div>

          </div>
        </div>

      </div>
    </section>--><!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    <section id="team">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3>Meet our Senior High School Administrators</h3>
          <p> We are here to assist you with any questions related to enrollment, transcripts, or academic records.</p>
        </div>

        <div class="row">

          <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4" data-aos="zoom-out" data-aos-delay="100">
            <div class="member">
              <img src="assets/img/sariaya_principal.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Niño Joseph A. Ballares</h4>
                  <span>CSTC Sariaya SHS Principal</span>
                  <div class="social">
                    <a href="https://www.facebook.com/onin.ballares"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/onin_ballares/"><i class="bi bi-instagram"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4" data-aos="zoom-out" data-aos-delay="100">
            <div class="member">
              <img src="assets/img/lucena_principal.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Mariane Hanna Garra</h4>
                  <span>CSTC Lucena SHS Principal</span>
                  <div class="social">
                    <a href="https://www.facebook.com/marianehoney"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/marianehannnagarra/"><i class="bi bi-instagram"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4" data-aos="zoom-out" data-aos-delay="100">
            <div class="member">
              <img src="assets/img/atimonan_principal.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Czar Ciprian S. Lopez</h4>
                  <span>CSTC Atimonan SHS Principal</span>
                  <div class="social">
                    <a href="https://www.facebook.com/czarciprian.lopez1996"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/czarlopezph/"><i class="bi bi-instagram"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4" data-aos="zoom-out" data-aos-delay="100">
            <div class="member">
              <img src="assets/img/sariaya_registrar.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Noreen De Luna</h4>
                  <span>CSTC Sariaya SHS Registrar</span>
                  <div class="social">
                    <a href="https://www.facebook.com/noreen.deluna.5"><i class="bi bi-facebook"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4" data-aos="zoom-out" data-aos-delay="100">
            <div class="member">
              <img src="assets/img/default.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Armida M. Maaño</h4>
                  <span>CSTC Lucena SHS Principal</span>
                  <div class="social">

                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4" data-aos="zoom-out" data-aos-delay="100">
            <div class="member">
              <img src="assets/img/atimonan_registrar.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Lexter Ramirez Aliling</h4>
                  <span>CSTC Atimonan SHS Registrar</span>
                  <div class="social">
                    <a href="https://www.facebook.com/lexter.aliling.1"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/alexander.ramirezzzzz/"><i class="bi bi-instagram"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->


  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6 footer-info">
           <img src="assets/img/logo.png" alt="" class="img-fluid">
            <h4>CSTC, Inc. - Pre-Registration and Strand Recommendation System</h4>
          </div>

          <div class="col-lg-2 col-md-2 footer-contact">
             <h4>CSTC Sariaya</h4>
            <p>
              Gen. Luna St. <br>
              Maharlika Highway, Arellano Subdivision<br>
              Sariaya, Quezon <br>
              <strong>Phone:</strong> (042) 719 2818<br>
              <strong>Website:</strong> http://www.cstc.edu.ph/<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-2 footer-contact">
            <h4>CSTC Lucena</h4>
            <p>
              Purok Camia <br>
              Barangay 10, Lucena City<br>
              beside Convention Center <br>
              <strong>Phone:</strong> (042) 795-6753 / 09532175460<br>
              <strong>Email:</strong> jan0867_knell@yahoo.com/<br>
            </p>

          </div>

          <div class="col-lg-2 col-md-2 footer-contact">
           <h4>CSTC Atimonan</h4>
            <p>
              Parafina's Compound  <br>
              Barangay Tagbakin<br>
              Atimonan, Quezon <br>
              <strong>Phone:</strong> 0970 401 3838<br>
              <strong>Email:</strong> cstc.atimonan91@gmail.com/<br>
            </p>

        </div>
      </div>
    </div>


  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
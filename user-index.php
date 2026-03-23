<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>BMI CALCULATOR</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


  <!-- =======================================================
  * Template Name: Dewi
  * Template URL: https://bootstrapmade.com/dewi-free-multi-purpose-html-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">BMI</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="user-profile.php">Profile</a></li>
          <li><a href="bmi-index.php">BMI Calculator</a></li>
           <li><a href="chart.php">BMI History</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <a class="cta-btn" href="user-index.php#about">Get Started</a>
      <a class="cta-btn" href="logout.php">Logout</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="assets/img/bmi-bg.jpg" alt="" data-aos="fade-in">

      <div class="container d-flex flex-column align-items-center">
        <h2 data-aos="fade-up" data-aos-delay="100">BODY. MASS. INDEX.</h2>
        <p data-aos="fade-up" data-aos-delay="200">Focus on habits, not just numbers</p>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
          <a href="#about" class="btn-get-started">Get Started</a>
          <a href="https://www.youtube.com/watch?v=z_3S2_41_FE" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3>Health isn’t linear, and neither is BMI</h3>
            <img src="assets/img/abt1.jpg" class="img-fluid rounded-4 mb-4" alt="">
            <p>Body Mass Index (BMI) is a widely used method to estimate whether an individual has a healthy body weight in relation to their height.
               It is calculated by dividing a person's weight in kilograms by the square of their height in meters (kg/m²). Although it serves as a quick screening tool, 
               BMI has its limitations—it does not account for factors like muscle mass, age, gender, or overall body composition.</p>
            <p>Our website provides an easy-to-use BMI calculator along with additional tools to support your wellness journey. From personalized health tips to fitness tracking
               and nutrition advice, we offer resources designed to help you make informed decisions 
              and achieve balanced, long-term health goals.</p>
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                Body Mass Index (BMI) is a simple numerical measure used to determine whether a person has a healthy body weight in relation to their height.
              </p>
              <ul>
                <li><i class="bi bi-check-circle-fill"></i> <span><b>BMI Calculator</b> – Instantly calculate your Body Mass Index based on your height and weight.</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span><b>Health Insights</b> – Get personalized tips and guidance based on your BMI category (underweight, healthy, overweight, obese).</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span><b>Progress Tracking</b> – Monitor changes in your BMI over time and set goals for maintaining or improving your health.</span></li>
              </ul>
              <p>
               Watch the advice about BMI to better understand how it relates to your overall health and why it should be considered alongside other factors.
              </p>

              <div class="position-relative mt-4">
                <img src="assets/img/abt2.jpg" class="img-fluid rounded-4" alt="">
                <a href="https://www.youtube.com/watch?v=yBvJXMduo8k" class="glightbox pulsating-play-btn"></a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-emoji-smile color-blue flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="4523" data-purecounter-duration="1" class="purecounter"></span>
                <p>People Assessed</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-journal-richtext color-orange flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="1210" data-purecounter-duration="1" class="purecounter"></span>
                <p>BMI Reports Generated</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-headset color-green flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="950" data-purecounter-duration="1" class="purecounter"></span>
                <p>Health consultation Hours</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-people color-pink flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                <p>Active Health Experts</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>Featured Srvices<br></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-5">

          <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="service-item">
              <div class="img">
                <img src="assets/img/srvs1.webp" class="img-fluid" alt="">
              </div>
              <div class="details position-relative">
                <div class="icon">
                 <i class="bi bi-calculator"></i>
                </div>
                <a href="bmi-index.php" class="stretched-link">
                  <h3>BMI Calculator</h3>
                </a>
                <p>Instantly calculate your Body Mass Index based on height and weight.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="service-item">
              <div class="img">
                <img src="assets/img/srvs2.webp" class="img-fluid" alt="">
              </div>
              <div class="details position-relative">
                <div class="icon">
                 <i class="bi bi-heart-pulse"></i>
                </div>
                <a href="health-insights.html" class="stretched-link">
                  <h3>Health Insights</h3>
                </a>
                <p>Get detailed health recommendations based on your BMI category.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
            <div class="service-item">
              <div class="img">
                <img src="assets/img/srvs3.jpg" class="img-fluid" alt="">
              </div>
              <div class="details position-relative">
                <div class="icon">
                  <i class="bi bi-egg-fried"></i>
                </div>
                <a href="diet_plan.html" class="stretched-link">
                  <h3>Diet Suggestions</h3>
                </a>
                <p>Personalized diet plans to maintain or achieve a healthy BMI.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Services Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section light-background">

      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients/cli1.webp" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients/cli2.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients/cli3.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients/cli4.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients/cli5.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets/img/clients/cli6.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

        </div>

      </div>

    </section><!-- /Clients Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

      <div class="container">

        <ul class="nav nav-tabs row  d-flex" data-aos="fade-up" data-aos-delay="100">
          <li class="nav-item col-3">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
             <i class="bi bi-person-lines-fill"></i>
              <h4 class="d-none d-lg-block">BMI data entry or Body measurements</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
              <i class="bi bi-activity"></i>
              <h4 class="d-none d-lg-block">Health tracking, overall activity, or metabolism</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
            <i class="bi bi-clipboard-data"></i>
              <h4 class="d-none d-lg-block">Reports or logged BMI/weight data</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-4">
              <i class="bi bi-bar-chart-line"></i>
              <h4 class="d-none d-lg-block">Progress tracking (BMI changes over time)</h4>
            </a>
          </li>
        </ul><!-- End Tab Nav -->

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

          <div class="tab-pane fade active show" id="features-tab-1">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>BMI Data Entry & Body Measurements.</h3>
                <p class="fst-italic">
                 BMI data entry allows users to input personal details like height and weight to assess their body mass index.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i>
                    <spab>Inputs include height, weight, age, and optionally waist or body fat percentage.</spab>
                  </li>
                  <li><i class="bi bi-check2-all"></i> <span>Real-time calculation shows your BMI category (e.g., underweight, normal, overweight).</span>.</li>
                  <li><i class="bi bi-check2-all"></i> <span>Supports history tracking to monitor progress and changes over time.</span></li>
                </ul>
                <p>
                 Tracking body measurements over time helps monitor health changes and supports fitness or weight management goals.Accurate and regular data entry 
                 ensures reliable health insights and personalized recommendations.
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/working1.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End Tab Content Item -->

          <div class="tab-pane fade" id="features-tab-2">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Health Tracking, Overall Activity & Metabolism</h3>
                <p>
                 Health tracking allows users to monitor vital signs, daily activity, and wellness patterns.
                 Understanding your overall activity helps in maintaining energy balance and setting realistic fitness goals.
                 Monitoring tabolism supports better nutrition planning and weight management decisions.
                </p>
                <p class="fst-italic">
                 Consistent health tracking builds long-term awareness of how your body responds to daily habits.
                 By understanding your metabolic rate, you can optimize your diet and exercise routines for better results.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>Track daily steps, calories burned, and active minutes to stay informed.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Integrate with wearable devices for automatic health and fitness data logging.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Receive insights on how activity levels and metabolism affect your BMI and overall health.</span></li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/working2.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End Tab Content Item -->

          <div class="tab-pane fade" id="features-tab-3">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Reports & Logged BMI/Weight Data</h3>
                <p>
                 Logged BMI and weight data provide a clear picture of your health trends over time.
Regular updates allow for accurate tracking of changes, making it easier to adjust your fitness goals.
Reports summarize your progress, showing improvements or areas needing attention.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>Automatically generate weekly or monthly health reports based on input data.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Visual dashboards track weight changes, BMI categories, and progress milestones.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Exportable data for sharing with health professionals or personal trainers.</span></li>
                </ul>
                <p class="fst-italic">
                  Visual graphs and charts make it simple to understand how your weight or BMI has fluctuated.
Consistent logging builds accountability and encourages long-term health commitment.
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/working3.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End Tab Content Item -->

          <div class="tab-pane fade" id="features-tab-4">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Progress Tracking – BMI Changes Over Time</h3>
                <p>
                  Tracking your BMI over time helps visualize your health journey and identify long-term trends.It enables you to set 
                  realistic goals and measure how consistent habits affect your body.Seeing progress, even gradual, boosts motivation
                   and helps maintain accountability.
                </p>
                <p class="fst-italic">
                  It allows for early detection of unhealthy weight gain or loss before it becomes a problem.Historical BMI data can guide
                   smarter decisions in diet, exercise, and overall wellness planning.
                </p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>Interactive charts show weekly, monthly, or custom BMI trends.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Compare current BMI with previous entries to evaluate progress.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Set target BMI goals and track performance toward them.</span></li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/working4.png" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End Tab Content Item -->

        </div>

      </div>

    </section><!-- /Features Section -->

    <!-- Services 2 Section -->
    <section id="services-2" class="services-2 section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>CHECK OUR SERVICES</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item d-flex position-relative h-100">
             <i class="bi bi-activity"></i>
              <div>
                <h4 class="title">Health tracking, overall activity, or metabolism</a></h4>
                <p class="description">Monitoring health metrics like overall activity levels and metabolism helps you understand your body’s 
                  performance and supports better fitness and nutrition decisions.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-person-lines-fill"></i>
              <div>
                <h4 class="title">Body measurements or BMI data entry</a></h4>
                <p class="description">Entering body measurements or BMI data provides the foundation for accurate health assessments and personalized wellness 
                  tracking.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-bar-chart-line"></i>
              <div>
                <h4 class="title">Progress tracking (BMI changes over time)</h4>
                <p class="description">Progress tracking of BMI changes over time allows you to monitor improvements, stay motivated, and make informed decisions
                   about your health and lifestyle.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-graph-up-arrow"></i>
              <div>
                <h4 class="title">BMI trend analysis or weight progress</h4>
                <p class="description">BMI trend analysis and weight progress tracking help you understand how your body is changing over time, enabling smarter
                   adjustments to your fitness and nutrition plans.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item d-flex position-relative h-100">
             <i class="bi bi-heart-pulse"></i>
              <div>
                <h4 class="title">Vital health indicator (heart rate, BMI, etc.)</h4>
                <p class="description">Vital health indicators like heart rate, BMI, and blood pressure offer key insights into your body’s current condition 
                  and help detect potential health risks early.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item d-flex position-relative h-100">
             <i class="bi bi-body-text"></i>
              <div>
                <h4 class="title">Human body-related stats or information</a></h4>
                <p class="description">Human body-related stats provide essential information such as height, weight, body fat percentage, and muscle mass, helping
                   to assess overall health and physical fitness.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Services 2 Section -->

    
    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section dark-background">

      <img src="assets/img/test-bg.jpg" class="testimonials-bg" alt="">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/anusha1.jpg" class="testimonial-img" alt="">
                <h3>Anusha Antony</h3>
                <h4>Ceo &amp; Founder</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
               
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/adithya1.jpg" class="testimonial-img" alt="">
                <h3>Adithya Shaiju</h3>
                <h4>Designer</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
               
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/anamika1.jpg" class="testimonial-img" alt="">
                <h3>Anamika A B</h3>
                <h4>Store Owner</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/archana1.jpg" class="testimonial-img" alt="">
                <h3>Archana A D</h3>
                <h4>Entrepreneur</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/anargha1.jpg" class="testimonial-img" alt="">
                <h3>Anargha V P</h3>
                <h4>Freelancer</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
               
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Portfolio</h2>
        <p>CHECK OUR PORTFOLIO</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-Diet">Diet</li>
            <li data-filter=".filter-BMI">BMI</li>
            <li data-filter=".filter-Weight">Weight</li>
            <li data-filter=".filter-workouts">Workouts</li>
          </ul><!-- End Portfolio Filters -->

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-Diet">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/diet1.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Diet 1</h4>
               
                  <a href="assets/img/portfolio/diet1.jpg" title="Diet 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-Diet">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/diet2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Diet 2</h4>
                  
                  <a href="assets/img/portfolio/diet2.jpg" title="Diet 2" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-BMI">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/bmi2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>BMI 1</h4>
                  
                  <a href="assets/img/portfolio/bmi2.jpg" title="BMI 1" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                 
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-Diet">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/diet3.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Diet 2</h4>
                 
                  <a href="assets/img/portfolio/diet3.jpg" title="Diet 3" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                 
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-BMI">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/bmi1.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>BMI 2</h4>
                 
                  <a href="assets/img/portfolio/bmi1.jpg" title="App 2" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-workouts">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/wrkout1.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Workout 1</h4>
                  
                  <a href="assets/img/portfolio/wrkout1.jpg" title="Product 2" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                 
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-workouts">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/wrkout2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Workout 2</h4>
                
                  <a href="assets/img/portfolio/wrkout2.jpg" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-Weight">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/weight1.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Weight 1</h4>
                  
                  <a href="assets/img/portfolio/weight1.jpg" title="Branding 2" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                 
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-Weight">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/weight2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Weight 2</h4>
                
                  <a href="assets/img/portfolio/weight2.jpg" title="App 3" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-BMI">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/bmi3.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>BMI 3</h4>
              
                  <a href="assets/img/portfolio/bmi3.jpg" title="Product 3" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-Diet">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/diet4.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Diet 4</h4>
                  <a href="assets/img/portfolio/diet4.jpg" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-Weight">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/weight3.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Weight 3</h4>
                  
                  <a href="assets/img/portfolio/weight3.jpg" title="Branding 3" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                 
                </div>
              </div>
            </div><!-- End Portfolio Item -->

          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->


  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">BMI</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Thalakkottukara</p>
            <p>Kerala,India</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+91 8589 55488 55</span></p>
            <p><strong>Email:</strong> <span>bmi@example.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="bmi-index.php">BMI Calculator</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="health-insights.html">Health Insights</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="login.php">Profile Management</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="diet_plan.html">Diet Suggestions</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Our Newsletter</h4>
  <p>Subscribe to our newsletter and receive the latest news about services!</p>
<form id="newsletter-form">
  <div class="newsletter-form">
    <input type="email" name="email" id="email" required placeholder="Enter your email">
    
    <!-- Properly labeled submit button -->
    <button type="submit">Subscribe</button>
  </div>

  <!-- These are hidden by default -->
  <div class="loading" style="display: none;">Loading...</div>
  <div class="sent-message" style="display: none;">Your subscription request has been sent. Thank you!</div>
</form>
<script>
  const form = document.getElementById('newsletter-form');
  const loading = form.querySelector('.loading'); // scoped to this form
  const sentMessage = form.querySelector('.sent-message');
  const emailInput = document.getElementById('email');

  form.addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent actual form submission

    // Validate email input
    if (!emailInput.value || !emailInput.checkValidity()) {
      alert("Please enter a valid email address.");
      return;
    }

    // Show "Loading" message
    loading.style.display = 'block';
    sentMessage.style.display = 'none';

    // Simulate processing
    setTimeout(() => {
      loading.style.display = 'none';
      sentMessage.style.display = 'block';
      form.reset(); // Clear the input
    }, 1500);
  });
</script>

  </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">BMI</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
       
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>


  <!-- AOS Library -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({ once: true });
  </script>
</body>

</html>
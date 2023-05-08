<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Fatima Kashmiri</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Favicons
    ================================================== -->
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="{{ asset('Template') }}img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="{{ asset('Template/css/bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('Template/fonts/font-awesome/css/font-awesome.css') }}">

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css" href="{{ asset('Template/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('Template/css/nivo-lightbox/nivo-lightbox.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('Template/css/nivo-lightbox/default.css') }}">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('admin/dist/css/style.css') }}"/>
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation
    ==========================================-->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand page-scroll" href="#page-top">Fatima Kashmiri</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about" class="page-scroll">About</a></li>
        <li><a href="#services" class="page-scroll">Services</a></li>
        <li><a href="#portfolio" class="page-scroll">Projects</a></li>
        <li><a href="#testimonials" class="page-scroll">Life Style</a></li>
        {{-- <li><a href="#booking_details" class="page-scroll">Booking Details</a></li> --}}
        <li><a href="#contact" class="page-scroll">Contact</a></li>
        @guest
              @if (Route::has('login'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
              @endif
          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }}
                  </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
              
          @endguest
        {{-- @if (session('email') != "")
            <li><a href="{{ route('logout') }}">Logout &nbsp;<i class="fa fa-sign-in pl-2"></i></a></li>
            <li><a href="/profile/{{ auth()->user()->id }}">{{ session('name') }} <i class="fa fa-user pl-2"></i></a></li>
        @else
            <li><a href="{{ route('login') }}">LOGIN &nbsp;<i class="fa fa-sign-in pl-2"></i></a></li>
        @endif --}}
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
</nav>
<!-- Header -->
<header id="header">
  <div class="intro">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 intro-text">
            <h1>Book Your Plot<br>
              at Karachi M9 Moterway Loation</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at.</p>
            <a href="#about" class="btn btn-custom btn-lg page-scroll">Learn More</a> </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Get Touch Section -->
<div id="get-touch">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-6 col-md-offset-1">
        <h3>Cost for your home renovation project</h3>
        <p>Get started today and complete our form to request your free estimate</p>
      </div>
      <div class="col-xs-12 col-md-4 text-center"><a href="../Template/img/Banglos/rufi-01.jpg" class="btn btn-custom btn-lg page-scroll">Free Estimate</a></div>
    </div>
  </div>
</div>
<!-- About Section -->
<div id="about">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-6"> <img src="{{ asset('Template/img/Banglos/rufi-02.jpg') }}" class="img-responsive" alt=""> </div>
      <div class="col-xs-12 col-md-6">
        <div class="about-text">
          <h2>Who We Are</h2>
          {{-- <p>Fatima Kashmiri City, the flagship project of BGC-IGC Consortium, is a Pak China Friendly City. Adjacent to the Lahore-Islamabad Motorway (M2), on the CPEC route, at a 20-minute drive from New Islamabad International Airport, Fatima Kashmiri City is Pakistan’s first-ever world-class tourist destination within an international standard master-planned lifestyle community.</p>
                <p>Featuring some of the most renowned tourist destinations including Burj Al Arab, an exact replica of the Blue Mosque Istanbul, the world’s tallest Horse Mascot, Rumi’s Square and a world-class Water Theme Park, in a safe and secure gated community with a hilltop 5-star hotel, Fatima Kashmiri City is going to be a haven for local and international tourists. The inclusion of Fatima Kashmiri Economic Zone in the project makes it an ideal place for local and international traders and businessmen to conduct their business sitting next to the CPEC route.</p> --}}
                <p>Conceived as a city within the city, Fatima Kashmiri City is a masterpiece of town-planning and architectural excellence. The community project is equipped with all the facilities of an urbanized lifestyle in the most peaceful and picturesque surroundings. From precise planning to flawless execution, the project development is gaining momentum with every passing day, under the constant supervision of seasoned engineers, architects, town-planners and technical supervisors.</p>
                <p>In order to meet international standards, the fast-paced development and structuring are underway in line with the best and the latest American technique. The 208-feet wide Central Avenue and access avenue are being structured and developed at par with the professional parameter of B-tech engineering technique AASHTO (American Association of State Highway &amp; Transportation Officials).</p>
          <h3>Why Choose Us?</h3>
          <div class="list-style">
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <ul>
                <li>Years of Experience</li>
                <li>Fully Insured</li>
                <li>Cost Control Experts</li>
                <li>100% Satisfaction Guarantee</li>
              </ul>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <ul>
                <li>Free Consultation</li>
                <li>Satisfied Customers</li>
                <li>Project Management</li>
                <li>Affordable Pricing</li>
              </ul>
            </div>
            <div class="col-md-12">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Services Section -->
<!-- Services Section -->
<div id="services">
    <div class="container">
      <div class="section-title">
        <h2>Our Services</h2>
      </div>
      <div class="row">
        <div class="portfolio-items">
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="portfolio-item">
                    <div class="hover-bg"> <a href="{{ asset('Template/img/masjid.jpg') }}" title="Project Title" data-lightbox-gallery="gallery1">
                    <div class="hover-text">
                        <h4>Masjid</h4>
                    </div>
                    <img src="{{ asset('Template/img/masjid.jpg') }}" class="img-responsive" alt="Project Title"> </a> </div>
                </div>
                <div class="service-desc">
                  <h3>Masjid</h3>
                  <p>Masjid is available on our good location.</p>
                </div>
              </div>
            </div>
        <div class="col-md-4">
            <div class="portfolio-item">
                <div class="hover-bg"> <a href="{{ asset('Template/img/bus.jpg') }}" title="Project Title" data-lightbox-gallery="gallery1">
                    <div class="hover-text">
                        <h4>Free Visit</h4>
                    </div>
                    <img src="{{ asset('Template/img/bus.jpg') }}" class="img-responsive fv-2" alt="Project Title"> </a> </div>
                </div>
                <div class="service-desc">
                        <h3 class="fv-1">Free Visit</h3>
                        <p>If you will visit our location we will provide a bus</p>
                </div>
            </div>
        <div class="col-md-4">
            <div class="portfolio-item">
                <div class="hover-bg"> <a href="{{ asset('Template/img/Pump.jpg') }}" title="Project Title" data-lightbox-gallery="gallery1">
                    <div class="hover-text">
                        <h4>Petrol Pump</h4>
                    </div>
                <img src="{{ asset('Template/img/Pump.jpg') }}" class="img-responsive pmp" alt="Project Title"> </a> </div>
            </div>
            <div class="service-desc">
                <h3 class="pmp-1">Petrol Pump</h3>
                <p>Petrol Pump available on main road</p>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="{{ asset('Template/img/school.jpg') }}" title="Project Title" data-lightbox-gallery="gallery1">
            <div class="hover-text">
                <h4>Schools</h4>
            </div>
            <img src="{{ asset('Template/img/school.jpg') }}" class="img-responsive" alt="Project Title"> </a> </div>
        </div>
              <div class="service-desc">
                  <h3 class="sc-1">Schools</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam sedasd commodo nibh ante facilisis bibendum dolor feugiat at.</p>
              </div>
        </div>
        <div class="col-md-4">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="{{ asset('Template/img/mart.jpg') }}" title="Project Title" data-lightbox-gallery="gallery1">
            <div class="hover-text">
                <h4>Mart</h4>
            </div>
            <img src="{{ asset('Template/img/mart.jpg') }}" class="img-responsive mrt" alt="Project Title"> </a> </div>
        </div>
              <div class="service-desc">
                  <h3 class="mrt-1">Mart</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam sedasd commodo nibh ante facilisis bibendum dolor feugiat at.</p>
              </div>
        </div>
        <div class="col-md-4">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="{{ asset('Template/img/SportGround.jpg') }}" title="Project Title" data-lightbox-gallery="gallery1">
            <div class="hover-text">
                <h4>Paly Ground</h4>
            </div>
            <img src="{{ asset('Template/img/SportGround.jpg') }}" class="img-responsive" alt="Project Title"> </a> </div>
        </div>
              <div class="service-desc">
                  <h3>Paly Ground</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam sedasd commodo nibh ante facilisis bibendum dolor feugiat at.</p>
              </div>
        </div>
        <div class="col-md-4">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="{{ asset('Template/img/Park.jpg') }}" title="Project Title" data-lightbox-gallery="gallery1">
            <div class="hover-text">
                <h4>Park</h4>
            </div>
            <img src="{{ asset('Template/img/Park.jpg') }}" class="img-responsive" alt="Project Title"> </a> </div>
        </div>
              <div class="service-desc">
                  <h3>Park</h3>
                  <p>A park is an area of natural, semi-natural or planted space set aside for human enjoyment and recreation or for the protection of wildlife or natural habitats</p>
              </div>
        </div>
        <div class="col-md-4">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="{{ asset('Template/img/grayviyard.jpg') }}" title="Project Title" data-lightbox-gallery="gallery1">
            <div class="hover-text">
                <h4>Grayviyard</h4>
            </div>
            <img src="{{ asset('Template/img/grayviyard.jpg') }}" class="img-responsive gry" alt="Project Title"> </a> </div>
        </div>
              <div class="service-desc">
                  <h3 class="gry-1">Grayviyard</h3>
                  <p>graveyard is a place where the remains of dead people are buried or otherwise interred</p>
              </div>
        </div>
        <div class="col-md-4">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="{{ asset('Template/img/hospital.jpg') }}" title="Project Title" data-lightbox-gallery="gallery1">
            <div class="hover-text">
                <h4>Hospital</h4>
            </div>
            <img src="{{ asset('Template/img/hospital.jpg') }}" class="img-responsive hsp" alt="Project Title"> </a> </div>
        </div>
              <div class="service-desc">
                  <h3>Hospital</h3>
                  <p>Hospitals complement and amplify the effectiveness of many other parts of the health system, providing continuous availability of services for acute and complex conditions.</p>
              </div>
        </div>
        <div class="col-md-4">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="{{ asset('Template/img/vilas.jpg') }}" title="Project Title" data-lightbox-gallery="gallery1">
            <div class="hover-text">
                <h4>Vilas</h4>
            </div>
            <img src="{{ asset('Template/img/vilas.jpg') }}" class="img-responsive" alt="Project Title"> </a> </div>
        </div>
              <div class="service-desc">
                  <h3>Vilas</h3>
                  <p>A villa is a type of house that was originally an ancient Roman upper-class country house. In modern parlance, "villa" can refer to various types and sizes of residences.</p>
              </div>
        </div>
        <div class="col-md-4">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="{{ asset('Template/img/fastfood.jpg') }}" title="Project Title" data-lightbox-gallery="gallery1">
            <div class="hover-text">
                <h4>Fast Food</h4>
            </div>
            <img src="{{ asset('Template/img/fastfood.jpg') }}" class="img-responsive ff" alt="Project Title"> </a> </div>
        </div>
              <div class="service-desc">
                  <h3 class="ff-1">Fast Food</h3>
                  <p>The food served in fast food restaurants is typically part of a “meat-sweet diet”, offered from manues.</p>
              </div>
        </div>
        <div class="col-md-4">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="{{ asset('Template/img/minizoo.jpg') }}" title="Project Title" data-lightbox-gallery="gallery1">
            <div class="hover-text">
                <h4>Mini Zoo</h4>
            </div>
            <img src="{{ asset('Template/img/minizoo.jpg') }}" class="img-responsive mz" alt="Project Title"> </a> </div>
        </div>
              <div class="service-desc">
                  <h3 class="mz-1">Mini Zoo</h3>
                  <p>An open area where small or young animals are kept that children can hold, touch, and sometimes feed.</p>
              </div>
        </div>


      </div>
    </div>
  </div>
<!-- Gallery Section -->
<div id="portfolio">
    <div class="container">
        <div class="section-title">
            <h2>Our Works</h2>
        </div>
        <div class="row">
            <div class="portfolio-items">
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="portfolio-item">
                        <div class="hover-bg"> <a href="{{ asset('Template/img/Banglos/33490028_662193124119892_6254169121160691712_n.jpg') }}" title="Project Title" data-lightbox-gallery="gallery1">
                        <div class="hover-text">
                            <h4>Lorem Ipsum</h4>
                        </div>
                        <img src="{{ asset('Template/img/Banglos/33498260_662193590786512_5555922754408022016_n.jpg') }}" class="img-responsive" alt="Project Title"> </a> </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="portfolio-item">
                        <div class="hover-bg"> <a href="{{ asset('Template/img/Banglos/33573390_662196174119587_3619571121629691904_n.jpg') }}" title="Project Title" data-lightbox-gallery="gallery1">
                        <div class="hover-text">
                            <h4>Adipiscing Elit</h4>
                        </div>
                        <img src="{{ asset('Template/img/Banglos/33574494_662193550786516_8698518031032123392_n.jpg') }}" class="img-responsive ad-elt" alt="Project Title"> </a> </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="portfolio-item">
                        <div class="hover-bg"> <a href="{{ asset('Template/img/Banglos/33622892_662194747453063_9107447107144384512_n.jpg') }}" title="Project Title" data-lightbox-gallery="gallery1">
                        <div class="hover-text">
                            <h4>Lorem Ipsum</h4>
                        </div>
                        <img src="{{ asset('Template/img/Banglos/33624382_662193444119860_8826126113601224704_n.jpg') }}" class="img-responsive" alt="Project Title"> </a> </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="portfolio-item">
                        <div class="hover-bg"> <a href="{{ asset('Template/img/Banglos/33676279_662194234119781_7418022305378336768_n.jpg') }}" title="Project Title" data-lightbox-gallery="gallery1">
                        <div class="hover-text">
                            <h4>Lorem Ipsum</h4>
                        </div>
                        <img src="{{ asset('Template/img/Banglos/33762668_662193394119865_2165041465716113408_n.jpg') }}" class="img-responsive lm" alt="Project Title"> </a> </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="portfolio-item">
                        <div class="hover-bg"> <a href="{{ asset('Template/img/Banglos/33762668_662193394119865_2165041465716113408_n.jpg') }}" title="Project Title" data-lightbox-gallery="gallery1">
                        <div class="hover-text">
                            <h4>Adipiscing Elit</h4>
                        </div>
                        <img src="{{ asset('Template/img/Banglos/33676279_662194234119781_7418022305378336768_n.jpg') }}" class="img-responsive adp" alt="Project Title"> </a> </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="portfolio-item">
                        <div class="hover-bg"> <a href="{{ asset('Template/img/Banglos/33624382_662193444119860_8826126113601224704_n.jpg') }}" title="Project Title" data-lightbox-gallery="gallery1">
                        <div class="hover-text">
                            <h4>Dolor Sit</h4>
                        </div>
                        <img src="{{ asset('Template/img/Banglos/33624382_662193444119860_8826126113601224704_n.jpg') }}" class="img-responsive" alt="Project Title"> </a> </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="portfolio-item">
                        <div class="hover-bg"> <a href="{{ asset('Template/img/Banglos/33762668_662193394119865_2165041465716113408_n.jpg') }}" title="Project Title" data-lightbox-gallery="gallery1">
                        <div class="hover-text">
                            <h4>Dolor Sit</h4>
                        </div>
                        <img src="{{ asset('Template/img/Banglos/33762668_662193394119865_2165041465716113408_n.jpg') }}" class="img-responsive dolor" alt="Project Title"> </a> </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="portfolio-item">
                        <div class="hover-bg"> <a href="{{ asset('Template/img/Banglos/33767028_662193854119819_57365846653140992_n.jpg') }}" title="Project Title" data-lightbox-gallery="gallery1">
                        <div class="hover-text">
                            <h4>Lorem Ipsum</h4>
                        </div>
                        <img src="{{ asset('Template/img/Banglos/33767028_662193854119819_57365846653140992_n.jpg') }}" class="img-responsive" alt="Project Title"> </a> </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="portfolio-item">
                        <div class="hover-bg"> <a href="{{ asset('Template/img/Banglos/33490028_662193124119892_6254169121160691712_n.jpg') }}" title="Project Title" data-lightbox-gallery="gallery1">
                        <div class="hover-text">
                            <h4>Lorem Ipsum</h4>
                        </div>
                        <img src="{{ asset('Template/img/Banglos/33490028_662193124119892_6254169121160691712_n.jpg') }}" class="img-responsive" alt="Project Title"> </a> </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="portfolio-item">
                        <div class="hover-bg"> <a href="{{ asset('Template/img/Banglos/33573390_662196174119587_3619571121629691904_n.jpg') }}" title="Project Title" data-lightbox-gallery="gallery1">
                        <div class="hover-text">
                            <h4>Adipiscing Elit</h4>
                        </div>
                        <img src="{{ asset('Template/img/Banglos/33573390_662196174119587_3619571121629691904_n.jpg') }}" class="img-responsive" alt="Project Title"> </a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="testimonials">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <!-- Top content -->
               <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" style="max-height: 500px; min-height: 300px;">
                  <div class="item active">
                    <img src="{{ asset('img/karachi_slider_image.jpg') }}" style="width: 100%; height:100%;" alt="Los Angeles">
                  </div>

                  <div class="item">
                    <img src="{{ asset('img/Lahore_slider_image.jpg') }}" style="width: 100%; height:100%;" alt="Chicago">
                  </div>

                  <div class="item">
                    <img src="{{ asset('img/Islamabad_slider_image.jpg') }}" style="width: 100%; height:100%;" alt="New York">
                  </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="fa fa-next">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <i class="fas fa-angle-right">Next</i>
                </a>
              </div>
            </div>
        </div>
    </div>
</div>
  </div>
</div>
<main id="main">
<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Testimonials</h2>
      <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.</p>
    </div>
  </div>

  <div class="container-fluid">

    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
      <div class="col-xl-10">
        <div class="owl-carousel testimonials-carousel">

          <div class="testimonial-wrap">
            <div class="testimonial-item">
              <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
              <h3>Saul Goodman</h3>
              <h4>Ceo &amp; Founder</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>

          <div class="testimonial-wrap">
            <div class="testimonial-item">
              <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
              <h3>Sara Wilsson</h3>
              <h4>Designer</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>

          <div class="testimonial-wrap">
            <div class="testimonial-item">
              <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
              <h3>Jena Karlis</h3>
              <h4>Store Owner</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>

          <div class="testimonial-wrap">
            <div class="testimonial-item">
              <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
              <h3>Matt Brandon</h3>
              <h4>Freelancer</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>

          <div class="testimonial-wrap">
            <div class="testimonial-item">
              <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
              <h3>John Larson</h3>
              <h4>Entrepreneur</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat esse veniam culpa fore nisi cillum quid.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
</section><!-- End Testimonials Section -->
</main>
<!-- Contact Section -->
<div id="contact">
  <div class="container">
    <div class="col-md-8">
      <div class="row">
        <div class="section-title">
          <h2>Get In Touch</h2>
          <p>Please fill out the form below to send us an email and we will get back to you as soon as possible.</p>
        </div>
        <form method="POST" id="contact_us_form" novalidate>
            @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" name="name" id="name" class="form-control" placeholder="Name" required="required">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="required">
                <p class="help-block text-danger"></p>
              </div>
            </div>
          </div>
          <div class="form-group">
            <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
            <p class="help-block text-danger"></p>
          </div>
          <div id="success"></div>
          <button type="submit" class="btn btn-custom btn-lg contactus_submit">Send Message</button>
        </form>
      </div>
    </div>
    <div class="col-md-3 col-md-offset-1 contact-info">
      <div class="contact-item">
        <h4>Contact Info</h4>
        <p><span>Address</span>Karachi M9 Moterway Pakistan</p>
      </div>
      <div class="contact-item">
        <p><span>Phone</span> +92313-1119396</p>
      </div>
      <div class="contact-item">
        <p><span>Email</span> info@newfatimacity.com</p>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row">
        <div class="social">
          <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Footer Section -->
<div id="footer">
  <div class="container text-center">
    <p>&copy; {{ date('Y') }} Prince. Design & Develop by <a href="https://techexito.com/" rel="nofollow">TechExito</a></p>
  </div>
</div>
<script type="text/javascript" src="{{ asset('Template/js/jquery.1.11.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('Template/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('Template/js/SmoothScroll.js') }}"></script>
<script type="text/javascript" src="{{ asset('Template/js/nivo-lightbox.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('Template/js/jqBootstrapValidation.js') }}"></script>
<script type="text/javascript" src="{{ asset('Template/js/contact_me.js') }}"></script>
<script type="text/javascript" src="{{ asset('Template/js/main.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.contactus_submit').on('click',function(){
            var form = $('#contact_us_form')[0];
            var data = new FormData(form);

            for(var val of data){
                console.log(val);
            }
            $.ajax({
                url:'/contactUs',
                type:'POST',
                data:data,
                success:function(resp){
                    console.log(resp);
                },
                error:function(result){
                    console.log(result);
                }
            })
        })
    })
</script>
</body>
</html>

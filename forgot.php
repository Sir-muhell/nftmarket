<?php
include("functions/init.php");

if(isset($_SESSION['login'])) {

    unset($_SESSION['login']);
}


?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NftMarket | NFT Marketplace Responsive HTML Template</title> <!-- site title -->
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="themetum Team" />
    <!-- Favicon -->
  <link rel="shortcut icon" href="img/favicon.png">
    <!-- CSS File -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/boxicons.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/meanmenu.css">
  <link rel="stylesheet" href="css/splitting-cells.css">
  <link rel="stylesheet" href="css/splitting.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">
    <!-- End CSS File -->
</head>

<body>
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader-wrapper">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- Preloader-end --> 
    
  
    <header id="header-area" class="header-transparent sticky"> <!-- start header -->   
            <!-- Start Top Search -->
            <div class="top-search">
                <div class="container">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="bx bx-search-alt"></i></span>
                        <input type="text" class="form-control search-control" placeholder="Search here...">
                        <span class="input-group-addon close-search"><i class='bx bx-x'></i></span>
                    </div>
                </div>
            </div>
            <!-- End Top Search --> 
            <div class="mobile_menubar">
                <i class='bx bx-menu'></i>
            </div>          
            <div class="main-menu-area">    <!-- Main Menu Area -->
                <div class="container container-main-menu"> <!-- Container -->
                    <div class="main-menu d-flex align-items-center">
                        <div class="logo">  <!-- Logo -->
                            <a href="./" class="navbar-brand">
                                <img src="img/logo.png" alt="logo">
                            </a>
                        </div>  <!-- End Logo -->
                        <div class="menu ml-auto d-flex">
                            <nav class="navigation" id="mobile-menu">
                                <ul class="menu-list list-style-none mb-0">
                                    <li><a href="./">Home</a></li>
                                    <li class="has-children"><a href="#">Explore NFT</a>
                                        <ul class="sub-menu">
                                            <li><a href="explores.html">Explore One</a></li>                                            
                                            <li><a href="live.html"> Live Auction</a></li>
                                            <li><a href="item-details.html">Item Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children"><a href="#">Community</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog.html">News & Press</a></li>
                                            <li><a href="blog-details.html">Single Blog</a></li>
                                            <li><a href="faqs.html">Help Center</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children"><a href="#">Pages</a>
                                        <ul class="sub-menu">
                                            <li><a href="./signin">My Account</a></li>
                                            <li><a href="signup.html">Sign Up</a></li>
                                            <li><a href="testimonials.html">Testimonials</a></li>
                                            <li><a href="authors.html">Authors</a></li>
                                            <li><a href="author-details.html">Author Details</a></li>
                                            <li><a href="terms-conditions.html">Terms & Conditions</a></li>
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="privacy.html">Privacy Policy</a></li>
                                            <li><a href="wallet.html">Connect Wallet</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="activity.html">Activity</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </nav>
                            <div class="menu-social icon-set">
                                <ul class="social-list list-style-none mb-0">
                                    <li><a class="search" href="#"><i class="bx bx-search-alt"></i></a></li>
                                    <li><a href="./signin"><i class='bx bx-user'></i></a></li>
                                    <li><a href="#"><i class='bx bx-cart-alt' ></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Responsive Menu -->
                        <div class="mobile-menu mobile-menu-preview"></div>
                    </div>
                    <div class="main-menu-icon">
                        <span class="line line-1"></span>
                        <span class="line line-2"></span>
                        <span class="line line-3"></span>
                    </div> <!-- responsive menu icon -->
                </div> <!-- end container -->
            </div>  <!-- end main menu area -->
    </header>   <!-- end header -->
    
    <div id="hero-slider-area" class="header-hero-area site-breadcrumb-header fix"> <!-- start header banner -->
        
        <!-- Start Breadcrumb
        ============================================= -->
        <div class="site-breadcrumb pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center pt-200">
                        <h2 data-splitting class="breadcrumb-title wow fadeInUp" data-wow-duration=".003s" data-wow-delay=".003s">Recover Password</h2>
                        <ul class="breadcrumb-menu clearfix">
                            <li>
                                <a href="./">Home /</a> <a href="#" class="active">recover</a>
                            </li>
                        </ul>                   
                    </div>
                </div>
            </div>
        </div>
        <!-- End  Breadcrumb -->                
    </div>
    <section class="dark-bg-all">   <!-- start dark bg area -->
        <div id="account-contact-form" class="account-form-area pt-100"><!-- start contact area -->
            <div class="container"><!-- start container -->
                <div class="row"><!-- start row -->
                    
                    <div class="col-12"><!-- start col-6 -->
                        <div class="acount_form_bg text-center wow fadeInDown" data-wow-duration=".4s" data-wow-delay=".4s" style="visibility: visible; animation-duration: 0.4s; animation-delay: 0.4s;">
                            <div class="form-group account_input col-md-12 pb-10">
                                <input type="email" name="email" class="form-control account_style" id="femail" placeholder="Type your registered email here">
                            </div>
                            
                            <div class="row mt-5">
                                <div class="col-lg-12">
                                    <div class="account_form_area text-center">
                                        <button type="button" class="btn btn-account btn-contact-bg" id="forgot">Recover Password</button>
                                    </div>                          
                                </div>
                                
                            </div>                  
                        </div>
                    </div><!-- end col-6 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end contact area -->
        
        <div id="why_we_are" class="why-choose-us pb-150"> <!-- start why area -->
            <div class="container pb-30"> <!-- start container -->
                <div class="row pt-100"> <!-- start row -->
                    <div class="col-md-3 col-sm-6 mb-30"> <!-- start col-3 -->
                        <div class="single_feature_are how-one text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s;">
                            <div class="why_icon">
                                <i class="bx bx-wallet-alt"></i>
                            </div>
                            <div class="why_text">
                                <h6 class="why_title">Connect your Wallet</h6>
                            </div>
                        </div>
                    </div> <!-- end col-3 -->
                    <div class="col-md-3 col-sm-6 mb-30"> <!-- start col-3 -->
                        <div class="single_feature_are how-two text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.4s;">
                            <div class="why_icon">
                                <i class="bx bx-notepad"></i>
                            </div>
                            <div class="why_text">
                                <h6 class="why_title">Create a Collection</h6>
                            </div>
                        </div>
                    </div> <!-- end col-3 -->
                    <div class="col-md-3 col-sm-6 mb-30"> <!-- start col-3 -->
                        <div class="single_feature_are how-three text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.6s;">
                            <div class="why_icon">
                                <i class="bx bx-pyramid"></i>
                            </div>
                            <div class="why_text">
                                <h6 class="why_title">Add NFT Products</h6>
                            </div>
                        </div>
                    </div> <!-- end col-3 -->
                    <div class="col-md-3 col-sm-6 mb-30"> <!-- start col-3 -->
                        <div class="single_feature_are how-four text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".9s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.9s;">
                            <div class="why_icon">
                                <i class="bx bx-grid"></i>
                            </div>
                            <div class="why_text">
                                <h6 class="why_title">Ready for Sale</h6>
                            </div>
                        </div>
                    </div> <!-- end col-3 -->
                </div> <!-- end row -->
            </div> <!-- end container -->
        </div> <!-- end why area  -->
    </section> <!-- end dark bg area -->
    
    <footer id="footer_area" class="footer_area_bg"> <!-- start footer area -->
        <div class="container"> <!-- start container -->
            <div class="row"> <!-- start row -->
                <div class="col-md-12">
                    <div class="subscribe_form wow fadeInUp" data-wow-duration=".2s" data-wow-delay=".2s">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div data-splitting class="subsribe_text wow fadeInUp" data-wow-duration=".003s" data-wow-delay=".003s">
                                    <h6>Want to get notify <br />  and product updates from us?</h6>
                                </div>
                            </div> <!-- end col-6 -->
                            <div class="col-md-6 col-sm-12">
                                <div class="email-input">
                                    <form action="contact.php">
                                        <div class="form-group">
                                            <input placeholder="Email here..." class="form-control" id="subscribe">
                                            <button class="btn btn-subscribe" type="submit">Notify</button>
                                        </div>
                                    </form>
                                </div>                          
                            </div> <!-- end col-6 -->
                        </div>
                    </div>
                </div> <!-- end col-12 -->
            </div> <!-- end row -->
        </div> <!-- end container -->
        <div class="container"> <!-- start container -->
            <div class="row"> <!-- start row -->
                <div class="col-md-3 col-sm-6"> <!-- start col-3 -->
                    <div class="footer_widget wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="widget_title">
                            <h6>Company</h6>
                        </div>
                        <div class="widget_nav_link">
                            <ul class="footer_nav">
                                <li><a href="about.html">About</a></li>
                                <li><a href="team.html">Team</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                                <li><a href="blog.html">Blog</a></li>
                            </ul>
                            <div class="social_profile">
                                <a href="#" class="social_profile_link"><i class='bx bxl-facebook'></i></a>
                                <a href="#" class="social_profile_link"><i class='bx bxl-twitter' ></i></a>
                                <a href="#" class="social_profile_link"><i class='bx bxl-dribbble' ></i></a>
                                <a href="#" class="social_profile_link"><i class='bx bxl-behance' ></i></a>                             
                                <a href="#" class="social_profile_link"><i class='bx bxl-linkedin' ></i></a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col-3 -->
                <div class="col-md-3 col-sm-6"> <!-- col-3 -->
                    <div class="footer_widget wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                        <div class="widget_title">
                            <h6>Resource</h6>
                        </div>
                        <div class="widget_nav_link">
                            <ul class="footer_nav">
                                <li><a href="authors.html">Authors</a></li>
                                <li><a href="affiliate.html">Affiliate Program</a></li>
                                <li><a href="faqs.html">FAQS</a></li>
                                <li><a href="blog.html">News & Press</a></li>
                                <li><a href="testimonials.html">Testimonials</a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- end col-3 -->
                <div class="col-md-3 col-sm-6"> <!-- col-3 -->
                    <div class="footer_widget wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s">
                        <div class="widget_title">
                            <h6>Need Help ?</h6>
                        </div>                      
                        <div class="widget_nav_link">
                            <ul class="footer_nav">
                                <li><a href="contact.html">Privacy Policy</a></li>
                                <li><a href="signup.html">Sign up</a></li>
                                <li><a href="./signin">Sign in</a></li>
                                <li><a href="contact.html">Pre-sale Questions</a></li>
                                <li><a href="authors.html">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- end col-3 -->
                <div class="col-md-3 col-sm-6"> <!-- col-3 -->
                    <div class="footer_widget wow fadeInUp" data-wow-duration="1s" data-wow-delay=".9s">
                        <div class="widget_title">
                            <h6>Marketplace</h6>
                        </div>                      
                        <div class="widget_nav_link">
                            <ul class="footer_nav">
                                <li><a href="live.html">Live Auction</a></li>
                                <li><a href="products.html">NFT Product</a></li>
                                <li><a href="products.html">Virtual World</a></li>
                                <li><a href="products.html">Popular Art</a></li>
                                <li><a href="products.html">Domain Names</a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- end col-3 -->
            </div> <!-- end row -->
        </div> <!-- end container -->
        <div class="container pt-50"> <!-- start container -->
            <div class="row wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s"> <!-- start row -->
                <div class="col-md-2 col-sm-6"> <!-- col-2 footer logo -->
                    <div class="footer_logo">
                        <a href="./"><img src="img/logo.png" alt="" class="responsive-fluid" /></a>
                    </div>
                </div> <!-- end col-2 footer logo -->
                <div class="col-md-7  col-sm-12"> <!-- col-3 footer copyright -->
                    <div class="footer_copyright">
                        <p class="copyright_text text-center">All right reserved & designed by <span><a href="#">NftMarket</a></span></p>
                    </div>
                </div><!-- end col-3 footer copyright -->
                <div class="col-md-3  col-sm-12"><!-- col-3 footer payment -->
                    <div class="payment_method">
                        <img src="img/footer/payment.png" alt="" class="responsive-fluid" />
                    </div>
                </div><!-- end col-3 footer payment -->
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer area -->
    <!-- Back to Top
    ============================================= --> 
    <a id="back-to-top" class="rounded-circle" data-toggle="tooltip" title="Back to Top" href="javascript:void(0)">
        <i class='bx bxs-chevron-up'></i>
    </a> 
    
     <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div style="background: #FE5F75; color: #ff0000; border-radius: 20px 20px 20px 20px;" class="modal-content">
                <div class="modal-body">
                    <div id="msg" style="color: white;" class="text-center"></div>
                </div>
            </div>
        </div>
    </div>
  <!-- Start JS File -->    
  <!-- <script src="client.js"></script> -->
 <!--  <script>
      const form = document.getElementById('submitButton')
      form.addEventListener('clicked', registerUser)

      //send user to backend as JSON

      async function registerUser(event){
            event.preventDefault()
            const name = document.getElementById('name');
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            
            const result = await fetch('/api/register', {
                method: 'POST',
                headers: {
                    'content-Type': 'application/json'
                },
                body: JSON.stringify({
                    name, email,password
                })
            }).then((res) => res.json())

                console.log(result)

      }
  </script> -->
  
  <script src="js/modernizr-3.8.0.min.js"></script>
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/jquery.appear.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.waypoints.min.js"></script> 
  <script src="ajax.js"></script> 
  <script src="js/wow.js"></script>  
  <script src="js/splitting-animation.js"></script>
  <script src="js/splitting.min.js"></script>
  <script src="js/multi-countdown.js"></script>
  <script src="js/jquery.meanmenu.min.js"></script>
  <script src="js/main.js"></script>
  
   <!-- End JS File --> 
</body>

</html> 

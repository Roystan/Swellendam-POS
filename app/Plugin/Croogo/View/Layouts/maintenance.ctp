
<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
    	<!-- meta character set -->
        <meta charset="utf-8">
		<!-- Always force latest IE rendering engine or request Chrome Frame -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Swellendam Funeral Services</title>		
		<!-- Meta Description -->
        <meta name="description" content="Blue One Page Creative HTML5 Template">
        <meta name="keywords" content="one page, single page, onepage, responsive, parallax, creative, business, html5, css3, css3 animation">
        <meta name="author" content="Roystan Smith">
		
		<!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- CSS
		================================================== -->
		
        <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>-->
        
        <?php
        
        echo $this->Html->css(array(
			'/croogo/css/animate',
			'/croogo/css/bootstrap.min',
			'/croogo/css/font-awesome.min',
			'/croogo/css/jquery.fancybox',
			'/croogo/css/jquery.fs.boxer.min',
			'/croogo/css/lightview',
			'/croogo/css/main',
			'/croogo/css/owl.carousel',
			'/croogo/css/slit-slider',
			'/croogo/css/superslides',
		));
        
        ?>

        <?php
        
        echo $this->Html->script(array(
			'/croogo/js/modernizr-2.6.2.min',
		));
        
        ?>

    </head>
	
    <body id="body">

		<!-- preloader -->
		<div id="preloader">
            <div class="loder-box">
            	<div class="battery"></div>
            </div>
		</div>
		<!-- end preloader -->

        <!--
        Fixed Navigation
        ==================================== -->
        <header id="navigation" class="navbar-inverse navbar-fixed-top animated-header">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
                    </button>
					<!-- /responsive nav button -->
					
					<!-- logo -->
					<h1 class="navbar-brand">
						<a href="#body">Swellendam Funeral Services</a>
					</h1>
					<!-- /logo -->
                </div>

				<!-- main nav -->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <ul id="nav" class="nav navbar-nav">
                        <li><a href="#body">Home</a></li>
                        <li><a href="#service">Service</a></li>
                        <li><a href="#portfolio">portfolio</a></li>
                        <li><a href="#testimonials">Testimonial</a></li>
                        <li><a href="#social">Social</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </nav>
				<!-- /main nav -->
				
            </div>
        </header>
        <!--
        End Fixed Navigation
        ==================================== -->
		
		<main class="site-content" role="main">
		
        <!--
        Home Slider
        ==================================== -->
		
		<section id="home-slider">
            <div id="slider" class="sl-slider-wrapper">

				<div class="sl-slider">
				
					<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">

						<div class="bg-img bg-img-1"></div>

						<div class="slide-caption">
                            <div class="caption-content">
                                <h2 class="animated fadeInDown">Swellendam Funeral Services</h2>
                                <span class="animated fadeInDown">Affordable Funeral Cover</span>
                                <a href="/Swellendam-POS/trunk/admin/users/users/login" class="btn btn-blue btn-effect">Admin Login</a>
                            </div>
                        </div>
						
					</div>
					
					<div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
					
						<div class="bg-img bg-img-2"></div>
						<div class="slide-caption">
                            <div class="caption-content">
                                <h2>Various premium packages</h2>
                                <span>We have a list of premiums to fit your pocket</span>
                                <a href="/Swellendam-POS/trunk/admin/users/users/login" class="btn btn-blue btn-effect">Admin Login</a>
                            </div>
                        </div>
						
					</div>
					
					<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
						
						<div class="bg-img bg-img-3"></div>
						<div class="slide-caption">
                            <div class="caption-content">
                                <h2>Burial And Cremation</h2>
                                <span>Professional Services</span>
                                <a href="/Swellendam-POS/trunk/admin/users/users/login" class="btn btn-blue btn-effect">Admin Login</a>
                            </div>
                        </div>

					</div>

				</div><!-- /sl-slider -->

                <!-- 
                <nav id="nav-arrows" class="nav-arrows">
                    <span class="nav-arrow-prev">Previous</span>
                    <span class="nav-arrow-next">Next</span>
                </nav>
                -->
                
                <nav id="nav-arrows" class="nav-arrows hidden-xs hidden-sm visible-md visible-lg">
                    <a href="javascript:;" class="sl-prev">
                        <i class="fa fa-angle-left fa-3x"></i>
                    </a>
                    <a href="javascript:;" class="sl-next">
                        <i class="fa fa-angle-right fa-3x"></i>
                    </a>
                </nav>
                

				<nav id="nav-dots" class="nav-dots visible-xs visible-sm hidden-md hidden-lg">
					<span class="nav-dot-current"></span>
					<span></span>
					<span></span>
				</nav>

			</div><!-- /slider-wrapper -->
		</section>
		
        <!--
        End Home SliderEnd
        ==================================== -->
			
			<!-- about section -->
			<section id="about" >
				<div class="container">
					<div class="row">
						<div class="col-md-4 wow animated fadeInLeft">
							<div class="recent-works">
								<h3>Recent Works</h3>
								<div id="works">
									<div class="work-item">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br> <br> There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
									</div>
									<div class="work-item">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br><br> There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
									</div>
									<div class="work-item">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br><br> There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-7 col-md-offset-1 wow animated fadeInRight">
							<div class="welcome-block">
								<h3>Welcome To Our Site</h3>								
						     	 <div class="message-body">
									<img src="<?php echo $this->webroot.'/img/member-4.jpg' ?>" class="pull-left" alt="member">
						       		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
						     	 </div>
						       	<a href="#" class="btn btn-border btn-effect pull-right">Read More</a>
						    </div>
						</div>
					</div>
				</div>
			</section>
			<!-- end about section -->
			
			
			<!-- Service section -->
			<section id="service">
				<div class="container">
					<div class="row">
					
						<div class="sec-title text-center">
							<h2 class="wow animated bounceInLeft">Service</h2>
							<p class="wow animated bounceInRight">The Key Features of our Services</p>
						</div>
						
						<div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn">
							<div class="service-item">
								<div class="service-icon">
									<i class="fa fa-cutlery fa-3x"></i>
								</div>
								<h3>Food and Beverages</h3>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
							</div>
						</div>
					
						<div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.3s">
							<div class="service-item">
								<div class="service-icon">
									<i class="fa fa-tasks fa-3x"></i>
								</div>
								<h3>Print Programs</h3>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
							</div>
						</div>
					
						<div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.6s">
							<div class="service-item">
								<div class="service-icon">
									<i class="fa fa-group fa-3x"></i>
								</div>
								<h3>Arrangements</h3>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
							</div>
						</div>
					
						<div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.9s">
							<div class="service-item">
								<div class="service-icon">
									<i class="fa fa-heart fa-3x"></i>
								</div>
								
								<h3>Flower Decor</h3>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>							
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- end Service section -->
			
			<!-- portfolio section -->
			<section id="portfolio">
				<div class="container">
					<div class="row">
					
						<div class="sec-title text-center wow animated fadeInDown">
							<h2>GALLERY</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
						

						<ul class="project-wrapper wow animated fadeInUp">
							<li class="portfolio-item">
								<img src="<?php echo $this->webroot.'/img/portfolio/item.jpg' ?>" class="img-responsive" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat">
								<figcaption class="mask">
									<h3>Wall street</h3>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting ndustry. </p>
								</figcaption>
								<ul class="external">
									<li><a class="fancybox" title="Araund The world" data-fancybox-group="works" href="/coogo/img/portfolio/item.jpg"><i class="fa fa-search"></i></a></li>
									<li><a href=""><i class="fa fa-link"></i></a></li>
								</ul>
							</li>
							
							<li class="portfolio-item">
								<img src="<?php echo $this->webroot.'/img/portfolio/item2.jpg' ?>" class="img-responsive" alt="Lorem Ipsum is simply dummy text of the printing and typesetting ndustry. ">
								<figcaption class="mask">
									<h3>Wall street</h3>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting ndustry. </p>
								</figcaption>
								<ul class="external">
									<li><a class="fancybox" title="Wall street" href="img/slider/banner.jpg" data-fancybox-group="works" ><i class="fa fa-search"></i></a></li>
									<li><a href=""><i class="fa fa-link"></i></a></li>
								</ul>
							</li>
							
							<li class="portfolio-item">
								<img src="<?php echo $this->webroot.'/img/portfolio/item3.jpg' ?>" class="img-responsive" alt="Lorem Ipsum is simply dummy text of the printing and typesetting ndustry. ">
								<figcaption class="mask">
									<h3>Wall street</h3>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting ndustry. </p>
								</figcaption>
								<ul class="external">
									<li><a class="fancybox" title="Behind The world" data-fancybox-group="works" href="/coogo//portfolio/item3.jpg"><i class="fa fa-search"></i></a></li>
									<li><a href=""><i class="fa fa-link"></i></a></li>
								</ul>
							</li>
							
							<li class="portfolio-item">
								<img src="<?php echo $this->webroot.'/img/portfolio/item4.jpg' ?>" class="img-responsive" alt="Lorem Ipsum is simply dummy text of the printing and typesetting ndustry.">
								<figcaption class="mask">
									<h3>Wall street</h3>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting ndustry. </p>
								</figcaption>
								<ul class="external">
									<li><a class="fancybox" title="Wall street 4" data-fancybox-group="works" href="/coogo/portfolio/item4.jpg"><i class="fa fa-search"></i></a></li>
									<li><a href=""><i class="fa fa-link"></i></a></li>
								</ul>
							</li>
							
							<li class="portfolio-item">
								<img src="<?php echo $this->webroot.'/img/portfolio/item5.jpg' ?>" class="img-responsive" alt="Lorem Ipsum is simply dummy text of the printing and typesetting ndustry. ">
								<figcaption class="mask">
									<h3>Wall street</h3>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting ndustry. </p>
								</figcaption>
								<ul class="external">
									<li><a class="fancybox" title="Wall street 5" data-fancybox-group="works" href="/coogo/portfolio/item5.jpg"><i class="fa fa-search"></i></a></li>
									<li><a href=""><i class="fa fa-link"></i></a></li>
								</ul>
							</li>
							
							<li class="portfolio-item">
								<img src="<?php echo $this->webroot.'/img/portfolio/item6.jpg' ?>" class="img-responsive" alt="Lorem Ipsum is simply dummy text of the printing and typesetting ndustry. ">
								<figcaption class="mask">
									<h3>Wall street</h3>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
								</figcaption>
								<ul class="external">
									<li><a class="fancybox" title="Wall street 6" data-fancybox-group="works" href="/coogo/portfolio/item6.jpg"><i class="fa fa-search"></i></a></li>
									<li><a href=""><i class="fa fa-link"></i></a></li>
								</ul>
							</li>
						</ul>
						
					</div>
				</div>
			</section>
			<!-- end portfolio section -->
			
			<!-- Testimonial section -->
			<section id="testimonials" class="parallax">
				<div class="overlay">
					<div class="container">
						<div class="row">
						
							<div class="sec-title text-center white wow animated fadeInDown">
								<h2>What people say</h2>
							</div>
							
							<div id="testimonial" class=" wow animated fadeInUp">
								<div class="testimonial-item text-center">
									<img src="<?php echo $this->webroot.'/img/member-3.jpg' ?>" alt="Our Clients">
									<div class="clearfix">
										<span>Ursula Willemse and Family</span>
                                                                                <p>Thank you for all of your support and assistance with arrangements for my father. The kindness you showed to me and my family will never be forgotten.</p>
									</div>
								</div>
								<div class="testimonial-item text-center">
									<img src="<?php echo $this->webroot.'/img/member-2.jpg' ?>" alt="Our Clients">
									<div class="clearfix">
										<span>Wayne van der Poll</span>
										<p>"I want to thank you from the bottom of my heart for all the help you gave me while I was dealing with the loss of my wife, best friend and soul mate, Chanel. You provided me with comfort and care, as well as looking after so many tasks that I just wasn't
                                                                                    emotionally able to handle. I felt that I could call on you with any problems, at any time. Your personal touches meant the world to me and I don't have the words to express how
                                                                                    I feel. Thank you again, and I wish you every success in life."</p>
									</div>
								</div>
								<div class="testimonial-item text-center">
									<img src="<?php echo $this->webroot.'/img/member-1.jpg' ?>" alt="Our Clients">
									<div class="clearfix">
										<span>Zandrè Johannes and Meagan</span>
										<p>Swellendam Funeral Services, thank you for your support, kindness, help and caring during our sad time of Mom's passing. It is a pleasure to work with you at such a sad time. Thank you again.</p>
									</div>
								</div>
							</div>
						
						</div>
					</div>
				</div>
			</section>
			<!-- end Testimonial section -->
			
			<!-- Price section -->
<!--			<section id="price">
				<div class="container">
					<div class="row">
					
						<div class="sec-title text-center wow animated fadeInDown">
							<h2>Price</h2>
							<p>Our premium prices</p>
						</div>
						
						<div class="col-md-4 wow animated fadeInUp">
							<div class="price-table text-center">
								<span>Basic Premium</span>
								<div class="value">
									<span>R</span>
									<span>45,00</span><br>
									<span>month</span>
								</div>
								<ul>
									<li>R5000 Cover Amount</li>
									<li>R5000 Cover Amount</li>
									<li>R5000 Cover Amount</li>
									<li>R5000 Cover Amount</li>
									<li><a href="#">sign up</a></li>
								</ul>
							</div>
						</div>
						
						<div class="col-md-4 wow animated fadeInUp" data-wow-delay="0.4s">
							<div class="price-table featured text-center">
								<span>Regular Premium</span>
								<div class="value">
									<span>R</span>
									<span>45,00</span>+<br>
									<span>month</span>
								</div>
								<ul>
									<li>R10000 Cover Amount</li>
									<li>R10000 Cover Amount</li>
									<li>R10000 Cover Amount</li>
									<li>R10000 Cover Amount</li>
									<li><a href="#">sign up</a></li>
								</ul>
							</div>
						</div>
						
						<div class="col-md-4 wow animated fadeInUp" data-wow-delay="0.8s">
							<div class="price-table text-center">
								<span>Citizen Premium</span>
								<div class="value">
									<span>R</span>
									<span>10,00</span>+<br>
									<span>month</span>
								</div>
								<ul>
									<li>R5000 Cover Amount</li>
									<li>R5000 Cover Amount</li>
									<li>R5000 Cover Amount</li>
									<li>R5000 Cover Amount</li>
									<li><a href="#">sign up</a></li>
								</ul>
							</div>
						</div>
		
					</div>
				</div>
			</section>-->
			<!-- end Price section -->
			
			<!-- Social section -->
			<section id="social" class="parallax">
				<div class="overlay">
					<div class="container">
						<div class="row">
						
							<div class="sec-title text-center white wow animated fadeInDown">
								<h2>FOLLOW US</h2>
								<p>Follow us by clicking on the links below</p>
							</div>
							
							<ul class="social-button">
								<li class="wow animated zoomIn"><a href="#"><i class="fa fa-thumbs-o-up fa-2x"></i></a></li>
								<li class="wow animated zoomIn" data-wow-delay="0.3s"><a href="http://twitter.com"><i class="fa fa-twitter fa-2x"></i></a></li>
								<li class="wow animated zoomIn" data-wow-delay="0.6s"><a href="http://facebook.com"><i class="fa fa-facebook fa-2x"></i></a></li>							
							</ul>
							
						</div>
					</div>
				</div>
			</section>
			<!-- end Social section -->
			
			<!-- Contact section -->
			<section id="contact" >
				<div class="container">
					<div class="row">
						
						<div class="sec-title text-center wow animated fadeInDown">
							<h2>Contact</h2>
							<p>Leave a Message</p>
						</div>
						
						
						<div class="col-md-7 contact-form wow animated fadeInLeft">
							<form action="#" method="post">
								<div class="input-field">
									<input type="text" name="name" class="form-control" placeholder="Your Name...">
								</div>
								<div class="input-field">
									<input type="email" name="email" class="form-control" placeholder="Your Email...">
								</div>
								<div class="input-field">
									<input type="text" name="subject" class="form-control" placeholder="Subject...">
								</div>
								<div class="input-field">
									<textarea name="message" class="form-control" placeholder="Messages..."></textarea>
								</div>
						       	<button type="submit" id="submit" class="btn btn-blue btn-effect">Send</button>
							</form>
						</div>
						
						<div class="col-md-5 wow animated fadeInRight">
							<address class="contact-details">
								<h3>Contact Us</h3>						
								<p><i class="fa fa-pencil"></i>Swellendam Funeral Services<span>PO Box 345678</span> <span>Little Lonsdale St, Melbourne </span><span>South Africa</span></p><br>
								<p><i class="fa fa-phone"></i>Phone: (415) 124-5678 </p>
								<p><i class="fa fa-envelope"></i>swellendamfuneral@telkomsa.net</p>
							</address>
						</div>
			
					</div>
				</div>
			</section>
			<!-- end Contact section -->
			
			<section id="google-map">
				<div id="map-canvas" class="wow animated fadeInUp"></div>
			</section>
		
		</main>
		
		<footer id="footer">
			<div class="container">
				<div class="row text-center">
					<div class="footer-content">
						<p>Copyright &copy; 2014-2015 Design and Developed By <a href="http://www.swellensamfuneralservices.com">Swellendam Funeral Services</a> </p>
					</div>
				</div>
			</div>
		</footer>
		
		<!-- Essential jQuery Plugins
		================================================== -->
        
        <?php
        
        echo $this->Html->script(array(
                        '/croogo/js/jquery-1.11.1.min',                         // Main jQuery
			'/croogo/js/bootstrap.min',                              // Twitter Bootstrap
			'/croogo/js/jquery.singlePageNav.min',                  // Single Page Nav
                        '/croogo/js/jquery.fancybox.pack',                      // jquery.fancybox.pack
                        '/croogo/js/owl.carousel.min',                          // Owl Carousel
                        '/croogo/js/jquery.easing.min',                         // jquery easing
                        '/croogo/js/jquery.slitslider',                         // Fullscreen slider
                        '/croogo/js/jquery.ba-cond.min',
			'/croogo/js/main',                                      // Custom Functions             
			'/croogo/js/wow.min',                                   // Custom Functions             
			'/croogo/js/modernizr-2.6.2.min',
			'/croogo/js/wow.min',                                   // onscroll animation
		));
        
        ?>
        
    </body>
</html>
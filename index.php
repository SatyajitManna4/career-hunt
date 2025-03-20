<?php include('functions.php'); ?>
<?php include('include/header.php'); ?>

    <div class="main">

         <!--hero section start-->
        <section class="pt-0 pb-0">
            <div>
				<div class="home-slider owl-carousel owl-theme">
					<div class="item" style="background-image:url(assets/img/bg/bg-01.jpg);">
						<div class="container z-index-1 relative">
							<div class="row">
								<div class="col-md-6 col-lg-8">
									<div class="hero-slider-content text-white py-3">
										<h1 class="text-white font-40 line-height-50 mb-2 font-weight-300 text-uppercase"><span class="font-weight-700 text-warning">Career Hunt</span> is a Premium platform for the students, parents and education industry players</h1>
										<a href="#Modal_from" data-toggle="modal" data-target="#Modal_from" class="btn btn-warning btn-rounded font-18 mt-3 pt-1 pb-1 font-weight-600">Apply Now</a>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					<div class="item" style="background-image:url(assets/img/bg/bg-02.jpg);">
						<div class="container z-index-1 relative">
							<div class="row">
								<div class="col-md-6 col-lg-8">
									<div class="hero-slider-content text-white py-3">
										<h1 class="text-white font-40 line-height-50 mb-2 font-weight-300 text-uppercase"><span class="font-weight-700 text-warning">Apply</span> with <span class="font-weight-700 text-warning">Career Hunt</span> and get free expert career counseling</h1>
										<a href="#Modal_from" data-toggle="modal" data-target="#Modal_from" class="btn btn-warning btn-rounded font-18 mt-3 pt-1 pb-1 font-weight-600">Apply Now</a>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					<div class="item" style="background-image:url(assets/img/bg/bg-03.jpg);">
						<div class="container z-index-1 relative">
							<div class="row"> 
								<div class="col-md-6 col-lg-8">
									<div class="hero-slider-content text-white py-3">
										<h1 class="text-white font-40 line-height-50 mb-2 font-weight-300 text-uppercase"><span class="font-weight-700 text-warning">Secure</span> your seats in your desired college with just one click through <span class="font-weight-700 text-warning">Career Hunt</span></h1>
										<a href="#Modal_from" data-toggle="modal" data-target="#Modal_from" class="btn btn-warning btn-rounded font-18 mt-3 pt-1 pb-1 font-weight-600">Apply Now</a>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					
				</div>
            </div>
			<div class="banner_form">
				<div class="container">
					<div class="row justify-content-end">
						<div class="col-md-6 col-lg-4">
							<div class="bg-white inner_form border-radius-10px overflow-hidden">
								<div class="sign-up-form-wrap position-relative z-index-1 p-0 w-100 bg-white">
									<div class="sign-up-form-header text-center p-10 pb-1 bg-white-f1">
										<h4 class="mb-1 font-weight-700 font-25">Apply Now</h4>
										<p class="mb-1">Please fill the below application form</p> 
									</div>
									<div class="p-20 pb-30">
										<div class="message-box d-none">
											<div class="alert alert-danger"></div>
										</div>
										<div id="contactresults1"></div>
										<form class="login-signup-form get-quote-form-wrap" method="post" action="apply-form.php" id="formsubmit1" novalidate="true">
											<div class="form-group mb-2">
												<div class="input-group input-group-merge">
													<div class="input-icon">
														<span class="ti-user"></span>
													</div>
													<input type="text" name="name" class="form-control" placeholder="Full Name">
												</div>
											</div>
											<div class="form-group mb-2">
												<div class="input-group input-group-merge">
													<div class="input-icon">
														<span class="ti-mobile"></span>  
													</div>
													<input type="text" name="mobile" class="form-control" placeholder="Mobile Number">
												</div>
											</div>
											<div class="form-group mb-2">
												<div class="input-group input-group-merge">
													<div class="input-icon">
														<span class="ti-email"></span>
													</div>
													<input type="email" name="email" class="form-control" placeholder="Email Address">
												</div>
											</div>									
											<div class="form-group mb-2">
												<div class="input-group input-group-merge">
													<div class="input-icon">
														<span class="ti-layout-column2"></span>
													</div>
													<select class="form-control" name="eligibility" required="">
														<option value=""> Select Eligibility</option>
														<?php $collegesarray = runloopQuery("select * from eligibility");
															foreach($collegesarray as $colleges){
														?>
														<option value="<?php echo $colleges['eligibility_id'];?>"><?php echo $colleges['eligibility_name'];?></option>
															<?php }?>
													</select>
												</div>
											</div>							
											
											
											<div class="form-group row no-gutters mb-2">
												<div class="input-group input-group-merge col-6 pr-1">
													<div class="input-icon">
														<span class="ti-world"></span>
													</div>
													<select class="form-control statelist" name="state">
														<option value="">Select State</option>
															 <?php
																$upesdata = runloopQuery("select * from state where country_id = '101'  order by state asc");
																if(!empty($upesdata)){
																$x=1; foreach($upesdata as $allctse){	?>
																<option value="<?php echo $allctse['id'];?>"  ><?php echo $allctse['state'];?></option>
																<?php }}?>
													</select>

												</div>
												<div class="input-group input-group-merge col-6 pl-1">
													<div class="input-icon">
														<span class="ti-pie-chart"></span>
													</div>
													<select class="form-control citylist" name="city">
													  <option value="">Select City</option>
													</select>
												</div>
											</div>
											<div class="text-center">
											
												<button class="btn btn-warning btn-rounded font-16 font-weight-600 p-30 pt-1 pb-1 btn-block mt-3">Submit</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </section>
        
		<!--<div class="banner_bottom">
			<div class="container">
				<div class="shadow-sm rounded-sm bg-white p-3">
					<div class="row m-0">
						<div class="col-lg-2 col-md-4 col-sm-6 p-1">
							<div class="text-center mb-3 mb-lg-0 p-2 banner_bottom_box">
								<div class="banner_bottom_box_img" style="background: rgb(255 166 62 / 30%);">
									<img src="assets/img/icons/university.svg" width="70px">
								</div>
								<h4 class="mt-2 mb-1 font-weight-700 font-15">FIND BEST COLLEGE</h4>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6 p-1">
							<div class="text-center mb-3 mb-lg-0 p-2 banner_bottom_box">
								<div class="banner_bottom_box_img" style="background:rgb(0 86 179 / 30%);">
									<img src="assets/img/icons/test.svg" width="70px">
								</div>
								<h4 class="mt-2 mb-1 font-weight-700 font-15">EXPLORE EXAMS</h4>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6 p-1">
							<div class="text-center mb-3 mb-lg-0 p-2 banner_bottom_box">
								<div class="banner_bottom_box_img" style="background: rgb(244 67 54 / 30%);">
									<img src="assets/img/icons/newspaper.svg" width="70px">
								</div>
								<h4 class="mt-2 mb-1 font-weight-700 font-15">GET LATEST NEWS</h4>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6 p-1">
							<div class="text-center mb-3 mb-lg-0 p-2 banner_bottom_box">
								<div class="banner_bottom_box_img" style="background: rgb(96 125 139 / 30%);">
									<img src="assets/img/icons/rating.svg" width="70px">
								</div>
								<h4 class="mt-2 mb-1 font-weight-700 font-15">TOP REVIEWS</h4>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6 p-1">
							<div class="text-center mb-3 mb-lg-0 p-2 banner_bottom_box">
								<div class="banner_bottom_box_img" style="background: rgb(63 81 181 / 30%);">
									<img src="assets/img/icons/book.svg" width="70px">
								</div>
								<h4 class="mt-2 mb-1 font-weight-700 font-15">TOP COURSES</h4>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6 p-1">
							<div class="text-center mb-3 mb-lg-0 p-2 banner_bottom_box">
								<div class="banner_bottom_box_img" style="background:rgb(233 30 99 / 30%);">
									<img src="assets/img/icons/graduated.svg" width="70px">
								</div>
								<h4 class="mt-2 mb-1 font-weight-700 font-15">GET ADMISSION</h4>
							</div>
						</div>
					</div>
                </div>
			</div>
		</div>-->
		
        
        
        <section class="promo-section pt-40 pb-40">
            <div class="container">
				
                <div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="text-center mb-4">
							<h3 class="mb-2 font-36 sec_title">Choose Your Future</h3>
							<p>Career Hunt is an extensive search engine for the students, parents, and education industry players who are seeking information</p>
						</div>
					</div>
				</div>
				 <div class="row justify-content-center">
					<div class="col-lg-2 col-md-3 col-sm-4">
						<a href="college-list/school-of-management" class="single-pricing-pack d-block text-center mb-3 p-2 bg-white">
							<img src="assets/img/icons/research.svg" width="50px">
							<h4 class="mt-3 mb-1 font-weight-700 font-16 text-uppercase">MANAGEMENT</h4>
						</a>
					</div>
					
					
					<div class="col-lg-2 col-md-3 col-sm-4">
						<a href="college-list/school-of-engineering" class="single-pricing-pack d-block text-center mb-3 p-2 bg-white">
							<img src="assets/img/icons/engineer.svg" width="50px">
							<h4 class="mt-3 mb-1 font-weight-700 font-16 text-uppercase">Engineering</h4>

						</a>
					</div>
					<!--<div class="col-lg-2 col-md-3 col-sm-4">
						<a href="#" class="single-pricing-pack d-block text-center mb-3 p-2 bg-white">
							<img src="assets/img/icons/doctor.svg" width="50px">
							<h4 class="mt-3 mb-1 font-weight-700 font-16 text-uppercase">Medical</h4>
						</a>
					</div> -->
					<div class="col-lg-2 col-md-3 col-sm-4">
						<a href="college-list/school-of-science" class="single-pricing-pack d-block text-center mb-3 p-2 bg-white">
							<img src="assets/img/icons/stest.svg" width="50px">
							<h4 class="mt-3 mb-1 font-weight-700 font-16 text-uppercase">Science</h4>
						</a>
					</div>
					<div class="col-lg-2 col-md-3 col-sm-4">
						<a href="college-list/arts" class="single-pricing-pack d-block text-center mb-3 p-2 bg-white">
							<img src="assets/img/icons/paint-palette.svg" width="50px">
							<h4 class="mt-3 mb-1 font-weight-700 font-16 text-uppercase">Arts</h4>
						</a>
					</div>
					<!--<div class="col-lg-2 col-md-3 col-sm-4">
						<a href="#" class="single-pricing-pack d-block text-center mb-3 p-2 bg-white">
							<img src="assets/img/icons/online-shopping.svg" width="50px">
							<h4 class="mt-3 mb-1 font-weight-700 font-16 text-uppercase">Commerce</h4>
						</a>
					</div>-->
					<!--<div class="col-lg-2 col-md-3 col-sm-4">
						<a href="#" class="single-pricing-pack d-block text-center mb-3 p-2 bg-white">
							<img src="assets/img/icons/medicine.svg" width="50px">
							<h4 class="mt-3 mb-1 font-weight-700 font-16 text-uppercase">Pharmacy</h4>
						</a>
					</div>
					<div class="col-lg-2 col-md-3 col-sm-4">
						<a href="#" class="single-pricing-pack d-block text-center mb-3 p-2 bg-white">
							<img src="assets/img/icons/auction.svg" width="50px">
							<h4 class="mt-3 mb-1 font-weight-700 font-16 text-uppercase">Law</h4>
						</a>
					</div>-->
					<div class="col-lg-2 col-md-3 col-sm-4">
						<a href="college-list/school-of-design" class="single-pricing-pack d-block text-center mb-3 p-2 bg-white">
							<img src="assets/img/icons/creativity.svg" width="50px">
							<h4 class="mt-3 mb-1 font-weight-700 font-16 text-uppercase">Design</h4>
							<!--<p class="mb-0">6419 COLLEGES</p>-->
						</a>
					</div>
<!--					<div class="col-lg-2 col-md-3 col-sm-4">
						<a href="#" class="single-pricing-pack d-block text-center mb-3 p-2 bg-white">
							<img src="assets/img/icons/agriculture.svg" width="50px">
							<h4 class="mt-3 mb-1 font-weight-700 font-16 text-uppercase">Agriculture</h4>
						</a>
					</div>
					<div class="col-lg-2 col-md-3 col-sm-4">
						<a href="#" class="single-pricing-pack d-block text-center mb-3 p-2 bg-white">
							<img src="assets/img/icons/house-design.svg" width="50px">
							<h4 class="mt-3 mb-1 font-weight-700 font-16 text-uppercase">Architecture</h4>
						</a>
					</div>
					<div class="col-lg-2 col-md-3 col-sm-4">
						<a href="#" class="single-pricing-pack d-block text-center mb-3 p-2 bg-white">
							<img src="assets/img/icons/tooth.svg" width="50px">
							<h4 class="mt-3 mb-1 font-weight-700 font-16 text-uppercase">Dental</h4>
						</a>
					</div>-->
                </div>
            </div>
        </section>
		
        <!--section class="promo-section pt-40 pb-40">
            <div class="container">
				
                <div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="text-center mb-4">
							<h3 class="mb-2 font-36">STUDY ABROAD</h3>
							<p>Interested in studying abroad? Choose a country</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="border rounded text-center mb-3 bg-white">
							<img src="assets/img/flags/canada.jpg" width="100%">
							<h4 class="mt-2 mb-2 font-weight-700 font-16 text-uppercase">CANADA</h4>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="border rounded text-center mb-3 bg-white">
							<img src="assets/img/flags/uk.jpg" width="100%">
							<h4 class="mt-2 mb-2 font-weight-700 font-16 text-uppercase">UK</h4>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="border rounded text-center mb-3 bg-white">
							<img src="assets/img/flags/AUSTRALIA.jpg" width="100%">
							<h4 class="mt-2 mb-2 font-weight-700 font-16 text-uppercase">AUSTRALIA</h4>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="border rounded text-center mb-3 bg-white">
							<img src="assets/img/flags/usa.jpg" width="100%">
							<h4 class="mt-2 mb-2 font-weight-700 font-16 text-uppercase">USA</h4>
						</div>
					</div>
                </div>
            </div>
        </section-->
        
        <!--section class="bg-white">
            <div class="container pt-4 pb-2">
                <img src="assets/img/ads/niit-long.jpeg" width="100%" class="border rounded">
            </div>
        </section-->
        
        
		
		<section class="promo-section pt-20 pb-20 pt-lg-50 pb-lg-40 bg-white-f9">
            <div class="container-fluid">
				
                <div class="row m-0">
					<div class="col-lg-12 col-md-12 col-sm-12 p-0">
						<div class="text-center mb-4">
							<h3 class="mb-2 font-36 sec_title">Our Partnered Colleges/University</h3>
							<p>Experience a hassle-free, easy and smooth application process with all our partnered colleges.</p>
						</div>
					</div>
					<?php
					$collegesarray = runloopQuery("select * from colleges order by rand() limit 0,12");
					$j=1;
						$i=0;foreach($collegesarray as $colleges){ 
					?>  
					
					 
					
					<div class="col-lg-3 col-md-6 mb-10 mb-lg-20 p-2">
						<div class="border overflow-hidden single-pricing-pack">  
							<a href="<?php echo COLLEGE_SLUG.$colleges['slug'];?>" class=" mb-0 bg-white d-block">
								<img src="<?php echo COLLEGE_IMAGE.$colleges['cover_image'];?>" width="100%" height="200px" class="object-fit-cover border-bottom">
								<div class="pl-15 pr-15 pt-15 pb-1 college_list_item">
									<div class="p-0">
										<div class="college_logo">
											 <?php if(!empty($colleges['logo'])){?>
											<img src="<?php echo COLLEGE_IMAGE.$colleges['logo'];?>" width="100%">
											 <?php }else{?>
											<img src="https://img.collegedekhocdn.com/media/img/institute/logo/IIMA.png" width="100%">
											 <?php }?>
										</div>
										<div class="college_title">
											<h4 class="college_name one_line_dot"><?php echo $colleges['name'];?></h4>
											<p class="font-10 text-black mb-2"><i class="fas fa-map-marker-alt text-primary mr-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Location"></i>  <?php echo city_name($colleges['city']);?>, <?php echo state_name($colleges['state']);?></p>
										</div>
									</div>
									<div class="college_Details">
											<!--<ul class="p-0 mb-10 text-black course_list_it d-flex">
										<li>
												<h5>₹ <?php echo $colleges['fees'];?></h5>
											</li>
											<li> 
												<h5><?php echo $colleges['course'];?></h5>
											</li> 
										</ul>-->
										<ul class="college_title_facilities_link mb-0 p-0"> 
											<li>
												<i class="fas fa-bed text-dark" data-toggle="tooltip" data-placement="top" title="" data-original-title="Bed"></i>
											</li> 
											<li>
												<i class="fas fa-dumbbell text-dark" data-toggle="tooltip" data-placement="top" title="" data-original-title="Gym"></i>
											</li> 
											<li>
												<i class="fas fa-book-reader text-dark" data-toggle="tooltip" data-placement="top" title="" data-original-title="Library"></i>
											</li>
											<li>
												<i class="fas fa-running text-dark" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sports"></i>
											</li>
											<li>
												<i class="fas fa-coffee text-dark" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cafeteria"></i>
											</li>
											<li>
												<i class="fas fa-briefcase-medical text-dark" data-toggle="tooltip" data-placement="top" title="" data-original-title="Medical/Hospital"></i>
											</li>
											<li>
												<i class="fas fa-wifi text-dark" data-toggle="tooltip" data-placement="top" title="" data-original-title="Wifi"></i>
											</li> 
										</ul>
									</div>
									
								</div>
							</a>
							<div class="college_Details pt-0">
								<ul class="mb-0 ButtOne_in_list">
									<li class="no-border m-0 pr-0 pl-0">
										<a  href="#Modal_from" data-toggle="modal" data-target="#Modal_from"  class="btn btn-warning m-0 pl-3 pr-3 pb-1 pt-1">Brochure</a>
									</li>
									<li class="pr-0 pl-0 m-0 no-border">
										<a href="#Modal_from" data-toggle="modal" data-target="#Modal_from" class="btn btn-primary m-0 pl-3 pr-3 pb-1 pt-1">Apply Now</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
						<?php }?>
					 
                </div>
            </div>
        </section>
		
		<section class="promo-section pt-40 pb-40 bg-white">
            <div class="container">
				
                <div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="text-center mb-4">
							<h3 class="mb-2 font-36 sec_title">Top Courses</h3>
							<p>Interested in studying abroad? Choose a country</p>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="mb-2 Browse_by_Degree text-center">
							<a href="college-list/school-of-engineering" class="btn-rounded btn btn-outline-dark pt-0 pb-0 pl-2 pr-2 mb-2 mr-2">M.E /M.Tech.</a>
							<a href="college-list/school-of-engineering" class="btn-rounded btn btn-outline-dark pt-0 pb-0 pl-2 pr-2 mb-2 mr-2"> B.E /B.Tech.</a>
							<a href="college-list/school-of-science" class="btn-rounded btn btn-outline-dark pt-0 pb-0 pl-2 pr-2 mb-2 mr-2"> M.Sc.</a>
							<a href="college-list/school-of-science" class="btn-rounded btn btn-outline-dark pt-0 pb-0 pl-2 pr-2 mb-2 mr-2"> B.Sc.</a>
							<a href="college-list/school-of-management" class="btn-rounded btn btn-outline-dark pt-0 pb-0 pl-2 pr-2 mb-2 mr-2"> B.B.A</a>
							<a href="college-list/school-of-management" class="btn-rounded btn btn-outline-dark pt-0 pb-0 pl-2 pr-2 mb-2 mr-2"> M.B.A</a>
							<a href="college-list/school-of-engineering" class="btn-rounded btn btn-outline-dark pt-0 pb-0 pl-2 pr-2 mb-2 mr-2"> M.C.A.</a>
							<a href="college-list/school-of-engineering" class="btn-rounded btn btn-outline-dark pt-0 pb-0 pl-2 pr-2 mb-2 mr-2">M.E /M.Tech.</a>
							<a href="college-list/school-of-engineering" class="btn-rounded btn btn-outline-dark pt-0 pb-0 pl-2 pr-2 mb-2 mr-2"> B.E /B.Tech.</a>
									<a href="college-list/school-of-engineering" class="btn-rounded btn btn-outline-dark pt-0 pb-0 pl-2 pr-2 mb-2 mr-2">M.E /M.Tech.</a>
							<a href="college-list/school-of-engineering" class="btn-rounded btn btn-outline-dark pt-0 pb-0 pl-2 pr-2 mb-2 mr-2"> B.E /B.Tech.</a>
							<a href="college-list/school-of-science" class="btn-rounded btn btn-outline-dark pt-0 pb-0 pl-2 pr-2 mb-2 mr-2"> M.Sc.</a>
							<a href="college-list/school-of-science" class="btn-rounded btn btn-outline-dark pt-0 pb-0 pl-2 pr-2 mb-2 mr-2"> B.Sc.</a>
							<a href="college-list/school-of-management" class="btn-rounded btn btn-outline-dark pt-0 pb-0 pl-2 pr-2 mb-2 mr-2"> B.B.A</a>
							<a href="college-list/school-of-management" class="btn-rounded btn btn-outline-dark pt-0 pb-0 pl-2 pr-2 mb-2 mr-2"> M.B.A</a>
							<a href="college-list/school-of-engineering" class="btn-rounded btn btn-outline-dark pt-0 pb-0 pl-2 pr-2 mb-2 mr-2"> M.C.A.</a>
							<a href="college-list/school-of-engineering" class="btn-rounded btn btn-outline-dark pt-0 pb-0 pl-2 pr-2 mb-2 mr-2">M.E /M.Tech.</a>
							<a href="college-list/school-of-engineering" class="btn-rounded btn btn-outline-dark pt-0 pb-0 pl-2 pr-2 mb-2 mr-2"> B.E /B.Tech.</a>
									<a href="college-list/school-of-engineering" class="btn-rounded btn btn-outline-dark pt-0 pb-0 pl-2 pr-2 mb-2 mr-2">M.E /M.Tech.</a>
							<a href="college-list/school-of-engineering" class="btn-rounded btn btn-outline-dark pt-0 pb-0 pl-2 pr-2 mb-2 mr-2"> B.E /B.Tech.</a>
							<a href="college-list/school-of-science" class="btn-rounded btn btn-outline-dark pt-0 pb-0 pl-2 pr-2 mb-2 mr-2"> M.Sc.</a>
							<a href="college-list/school-of-science" class="btn-rounded btn btn-outline-dark pt-0 pb-0 pl-2 pr-2 mb-2 mr-2"> B.Sc.</a>
							<a href="college-list/school-of-management" class="btn-rounded btn btn-outline-dark pt-0 pb-0 pl-2 pr-2 mb-2 mr-2"> B.B.A</a>
							<a href="college-list/school-of-management" class="btn-rounded btn btn-outline-dark pt-0 pb-0 pl-2 pr-2 mb-2 mr-2"> M.B.A</a>
							<a href="college-list/school-of-engineering" class="btn-rounded btn btn-outline-dark pt-0 pb-0 pl-2 pr-2 mb-2 mr-2"> M.C.A.</a>
							<a href="college-list/school-of-engineering" class="btn-rounded btn btn-outline-dark pt-0 pb-0 pl-2 pr-2 mb-2 mr-2">M.E /M.Tech.</a>
							<a href="college-list/school-of-engineering" class="btn-rounded btn btn-outline-dark pt-0 pb-0 pl-2 pr-2 mb-2 mr-2"> B.E /B.Tech.</a>
						</div>
					</div>
                </div>
            </div>
        </section>
        
        <section class="promo-section pt-20 pb-20 pt-lg-50 pb-lg-50">
            <div class="container">
                <div class="row m-0">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="text-center mb-4">
							<h3 class="mb-2 font-36 sec_title">Latest Updates</h3>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="news_events owl-carousel owl-theme">
						<?php $collegesarray = runloopQuery("select * from news order by rand() limit 0,8");
						foreach($collegesarray as $colleges){
					?>
							<div class="item">
								<a href="<?php echo NEWS_SLUG.$colleges['slug'];?>" class="border rounded bg-white d-block">
									<img src="<?php echo NEWS_IMAGE.$colleges['image'];?>" width="100%" height="200px" class="object-fit-cover border-bottom">
									<div class="p-2 pb-3">
										<h4 class="mt-0 mb-1 text-capitalize font-weight-600 font-20 one_line_dot"><?php echo $colleges['name'];?></h4>
										<p class="mb-1 two_line_dot text-black"><?php echo substr(strip_tags($colleges['description']),0,200);?></p>
										
										<span class="font-16 pl-2 pr-2 pt-0 pb-0 rounded-pill btn btn-outline-success border-gray">Read More</span>
									</div>
								</a>
							</div> 
						<?php }?> 
						</div>
					</div>
                </div>
            </div>
        </section>
		
        <section class="promo-section pt-20 pb-20 pt-lg-70 pb-lg-40 bg-white">
            <div class="container">
                <div class="row m-0">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="text-center mb-4">
							<h3 class="mb-2 font-36 sec_title">Benefits Of Applying Through Career Hunt</h3>
						</div>
					</div>
					<div class="col-lg-12 mt-lg-30">
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-12">
										<div class="d-flex align-items-start mb-sm-0 mb-md-3 mb-lg-3">
											<img src="assets/img/icons/doc.svg" alt="app icon" width="80" class="img-fluid mr-3">
											<div class="icon-text">
												<h5 class="mb-2">Hassle-free application process</h5>
												<p>Career Hunt ensures a hassle-free and smooth online application process with various partnered universities.</p>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="d-flex align-items-start mb-sm-0 mb-md-3 mb-lg-3">
											<img src="assets/img/icons/hologram.svg" alt="app icon" width="80" class="img-fluid mr-3">
											<div class="icon-text">
												<h5 class="mb-2">Free expert advice</h5>
												<p>If you are confused among various career choices, you can still apply through Career Hunt and get free expert advice on course/ university selection.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-12">
										<div class="d-flex align-items-start mb-sm-0 mb-md-3 mb-lg-3">
											<img src="assets/img/icons/headphones.svg" alt="app icon" width="80" class="img-fluid mr-3">
											<div class="icon-text">
												<h5 class="mb-2">24*7 friendly online support</h5>
												<p>Career Hunt counselors and career experts are available for the students 24*7 to ensure that students can apply for their desired university without any problem.</p>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="d-flex align-items-start mb-sm-0 mb-md-3 mb-lg-3">
											<img src="assets/img/icons/fingerprints.svg" alt="app icon" width="80" class="img-fluid mr-3">
											<div class="icon-text">
												<h5 class="mb-2">No hidden charges</h5>
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
        
        <!--section class="bg-white">
            <div class="container pt-2 pb-2">
                <img src="assets/img/ads/jklu.jpeg" width="100%" class="border rounded">
            </div>
        </section-->
		
         
    </div>

<?php include('include/footer.php'); ?>
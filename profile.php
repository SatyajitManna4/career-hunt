<?php include('functions.php');  
?>
<?php include('include/header.php'); ?>

    <div class="main">

        <!--page header section start-->
        <section class="pt-0 pb-10 pb-xs-10 pt-xs-60 bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header-content text-black pt-4 text-center">
                            <h3 class="text-black mb-0 text-black font-32 text-uppercase">List of Eligible colleges in India</h3>
                        </div>
                    </div>
                </div>
            </div>    
        </section> 

        <!--promo section start-->
        <section class="promo-section pt-30 pb-30">
            <div class="container-fluid">
                <div class="row m-0">
				<?php 
					$profile=runloopQuery("select * from leads where ID=".$_SESSION['student_id'])[0];
					
					$collegesarray = runloopQuery("SELECT *
FROM colleges
WHERE EXISTS (
    SELECT 1
    FROM course
    WHERE FIND_IN_SET(course_id, colleges.course) > 0 and course_eligibility_id=".$profile['eligibility']."
)");
						foreach($collegesarray as $colleges){
					?>  
                    <div class="col-lg-3 col-md-6 mb-10 mb-lg-20 p-1">
						<div class="border rounded overflow-hidden">
							<a href="<?php echo COLLEGE_SLUG.$colleges['slug'];?>" class=" mb-0 bg-white d-block">
								<img src="<?php echo COLLEGE_IMAGE.$colleges['cover_image'];?>" width="100%" height="200px" class="object-fit-cover border-bottom">
								<div class="pl-15 pr-15 pt-2 pb-1 college_list_item">
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
											<p class="font-12 text-black mb-2"><i class="fas fa-map-marker-alt text-primary mr-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Location"></i>  <?php echo city_name($colleges['city']);?>, <?php echo state_name($colleges['state']);?></p>
										</div>
									</div>
									<div class="college_Details">
										<!--<ul class="p-0 mb-10 text-black course_list_it d-flex">
											<li>
												<h5>₹ <?php echo $colleges['fees'];?></h5>
												<p><?php echo $colleges['course'];?></p>
											</li>
											<li>
												<h5>₹ 2,315,000</h5>
												<p>MBA/PGDM - Total Fees</p>
											</li>
											<li>
												<h5>₹ 2,315,000</h5>
												<p>MBA/PGDM - Total Fees</p>
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
										<a href="Modal_from" data-toggle="modal" data-target="#Modal_from" class="btn btn-warning m-0 pl-3 pr-3 pb-1 pt-1">Brochure</a>
									</li>
									<li class="pr-0 pl-0 m-0 no-border">
										<a href="Modal_from" data-toggle="modal" data-target="#Modal_from" class="btn btn-primary m-0 pl-3 pr-3 pb-1 pt-1">Apply Now</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<?php }?>
                </div>
            </div>
        </section>

        <!--page header section start-->
        <section class="pt-0 pb-10 pb-xs-10 pt-xs-60 bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header-content text-black pt-4 text-center">
                            <h3 class="text-black mb-0 text-black font-32 text-uppercase">List of Eligible Exams</h3>
                        </div>
                    </div>
                </div>
            </div>    
        </section> 

        <!--promo section start-->
        <section class="promo-section pt-30 pb-30">
            <div class="container-fluid">
                <div class="row m-0">
				<?php 
					
					$examarray = runloopQuery("SELECT *
FROM exam where exam_eligibility_id=".$profile['eligibility']);
						foreach($examarray as $exam){
					?>  
                    <div class="col-lg-3 col-md-6 mb-10 mb-lg-20 p-1">
						<div class="border rounded overflow-hidden">
								<div class="pl-15 pr-15 pt-2 pb-1 college_list_item">
									<div class="p-0">
										<div style="text-align: center" >
											<h4><?php echo $exam['exam_name'];?></h4>
										</div>
									</div>
									
								</div>
							<div class="college_Details pt-0">
								<ul class="mb-0 ButtOne_in_list">
									<li class="pr-0 pl-0 m-0 no-border">
										<a href="<?php echo $exam['application_link'];?>" class="btn btn-primary m-0 pl-3 pr-3 pb-1 pt-1" target="_blank">Apply Now</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<?php }?>
                </div>
            </div>
        </section>
    </div>

<?php include('include/footer.php'); ?>
<?php
include( 'functions.php' );
$slug = mysqli_real_escape_string( $conn, $_GET[ 'slug' ] );
$singlecollege = runQuery( "select * from  colleges where slug = '" . $slug . "'" );
include( 'include/header.php' );
?>

<div class="main">

	<!--<section class="pt-80 pb-20 bg-white pt-lg-100 callege_header_mai" style="background-image:url(<?php echo COLLEGE_IMAGE.$singlecollege['cover_image'];?>);">
	</section>-->


	<section class="pt-10 pb-30 font-14 bg-white-f9">
		
		

		<div class="container">
			<div class="row">

				<div class="col-md-8 pr-lg-1">
					
		<div class="container relative">
			<div class="row align-items-center justify-content-lg-between justify-content-md-center justify-content-sm-center ">
				<div class="col-md-2 col-sm-2">
					<div class="border rounded p-0 shadow-sm">
						<img src="<?php echo COLLEGE_IMAGE.$singlecollege['logo'];?>" width="100%">
					</div>
				</div>
				<div class="col-md-10 col-sm-10">
					<div class="hero-slider-content text-dark py-3">
						<h1 class="text-dark font-36 mb-2">
							<?php echo $singlecollege['name'];?>
						</h1>
						<p class="text-dark"><i class="fas fa-map-marker-alt"></i>
							<?php echo city_name($singlecollege['city']);?>,
							<?php echo state_name($singlecollege['state']);?>
						</p>
					</div>
				</div>
			</div>
		</div>
					
					<div class="mb-4 ">
						<div class="bg-white p-4 mt-0">
							<div class="">
								<div class="row align-items-center justify-content-lg-between justify-content-md-center justify-content-sm-center">
									<div class="col-md-12 ">
										 <iframe width="100%" height="315" rel=0 src="https://www.youtube.com/embed/<?php echo $singlecollege['intro_video'];?>"></iframe> 
										<h4>Overview</h4>
										<div class="table_responsive">
											<?php echo $singlecollege['description'];?>
										</div>
										<?php if(!empty($singlecollege['why_choose'])){ ?>
										<hr class="my-12"/>
										<h4>Why Choose <?php echo $singlecollege['name'];?></h4>
										<div class="table_responsive">
											<?php echo $singlecollege['why_choose'];?>
										</div>
										<?php } ?>
										<hr class="my-12"/>
										<h4>Courses</h4>
										<div class="table_responsive" style="padding-left: 20px;">
										<div class="row">
										<?php
										$course_category = runloopQuery( "select * from school where school_id IN (select course_school_id from course where course_id IN (".$singlecollege['course']."))" );
										foreach($course_category as $DATA)
										{
											$course = runloopQuery( "select * from course where course_school_id=".$DATA['school_id']." and course_id IN (".$singlecollege['course'].")" );
										?>
											<div class="card col-4 p-1">
  												<div class="card-body">
												<strong><?php echo $DATA['school_name']; ?> : </strong>
												<ul style="list-style-type:disc;padding-left: 15px;">
													<?php
													foreach($course as $DATA2)
													{
													?>
													<li><?php echo $DATA2['course_name']; ?></li>
													<?php
													}
													?>
												</ul>
												</div>
											</div>
										<?php
										}
										?>
											</div>
										</div>
										
										<?php $image_gal=json_decode($singlecollege['image'],true);  if(!empty($image_gal)){ ?>
										<hr class="my-12"/>
										<h4>Photo Gallery</h4>
										<div class="table_responsive">
											<div class="row college-gallery">
												<?php foreach($image_gal as $DATA){ ?>
												<div class="col-md-3 col-sm-6 mb-2">
													<a href="collegeimage/<?php echo $DATA;?>"><img src="collegeimage/<?php echo $DATA;?>" alt="Image"></a>
												</div>
												<?php } ?>
											</div>
										</div>
										<?php } ?>
										
										<?php if(!empty($singlecollege['scholarship'])){ ?>
										<hr class="my-12"/>
										<h4>Scholarship</h4>
										<div class="table_responsive">
											<?php echo $singlecollege['scholarship'];?>
										</div>
										<?php } ?>
										
										
										<?php if(!empty($singlecollege['award'])){ ?>
										<hr class="my-12"/>
										<h4>Recognization & Academic Collaborations</h4>
										<div class="table_responsive">
											<?php echo $singlecollege['award'];?>
										</div>
										<?php } ?>
										
										<hr class="my-12"/>
										<h4>Placement</h4>
										<div class="table_responsive">
											<?php echo $singlecollege['placement'];?>
											
											<style type="text/css">
    .partners ul li img {
        width: 126px;
        height: 75px;
object-fit: scale-down;
display: block;
margin-bottom: -22px;
border: 2px solid #ccc;
    }
    .partners ul li {
width: 15%;
float: left;
background: #fff;
margin: 15px;
text-align: center;
}

@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
    .partners ul li img {
        width: 100%;
        height: 55px;
    }
    .partners ul li {
width: 23%;
}
}
</style>
<?php $image_placement_gal=json_decode($singlecollege['placement_logo'],true); if(!empty($image_placement_gal)){ ?>
<div class="partners">
    <ul>
		<?php foreach($image_placement_gal as $DATA){ ?>
        <li><img src="collegeimage/<?php echo $DATA;?>" class="img-responsive" alt="partner"></li>
		<?php } ?>
    </ul>
</div>
<?php } ?>
										</div>
										<br>
											<div style="text-align: center; clear: both; padding-top: 20px;">
											<h5>and many more....</h5>
											</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="col-md-4 pl-lg-2">
					<div class="bg-white p-1 inner_form">
						<div class="sign-up-form-wrap position-relative z-index p-10 pb-20 pt-15 w-100 gray-light-bg" style="background-color: #0056b3 !important; color: #fff; border-radius: 10px;">
							<div class="sign-up-form-header text-center mb-2">
								<h4 class="mb-1" style="color: #fff;">Apply Now</h4>
								<p class="mb-1">Please fill the below application form</p>
							</div>
							<div class="message-box d-none">
								<div class="alert alert-danger"></div>
							</div>
							<div id="contactresults1"></div>
							<form class="login-signup-form get-quote-form-wrap" method="post" action="apply-form.php" id="formsubmit1" novalidate="true">
								<div class="form-group mb-2">
									<div class="input-group input-group-merge">
										<div class="input-icon"> <span class="ti-user"></span> </div> <input type="text" name="name" class="form-control" placeholder="Full Name"> </div>
								</div>
								<div class="form-group mb-2">
									<div class="input-group input-group-merge">
										<div class="input-icon"> <span class="ti-mobile"></span> </div> <input type="text" name="mobile" class="form-control" placeholder="Mobile number"> </div>
								</div>
								<div class="form-group mb-2">
									<div class="input-group input-group-merge">
										<div class="input-icon"> <span class="ti-email"></span> </div> <input type="email" name="email" class="form-control" placeholder="Email Address"> </div>
								</div>

								<div class="form-group mb-2">
									<div class="input-group input-group-merge">
										<div class="input-icon">
											<span class="ti-layout-column2"></span>
										</div>
										<select class="form-control college-list" name="eligibility" required="">
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
										<div class="input-icon"> <span class="ti-world"></span> </div>
										<select class="form-control statelist" name="state">
											<option value="">Select State</option>
											<?php															$upesdata = runloopQuery("select * from state where country_id = '101'  order by state asc");															if(!empty($upesdata)){															$x=1; foreach($upesdata as $allctse){	?>
											<option value="<?php echo $allctse['id'];?>">
												<?php echo $allctse['state'];?>
											</option>
											<?php }}?> </select>
									</div>
									<div class="input-group input-group-merge col-6 pl-1">
										<div class="input-icon"> <span class="ti-pie-chart"></span> </div>
										<select class="form-control citylist" name="city">
											<option value="">Select City</option>
										</select>
									</div>
								</div>
								<div class="text-center"> <button class="btn btn-warning btn-rounded font-16 font-weight-600 p-30 pt-1 pb-1 btn-block mt-3">Submit</button> </div>
							</form>
						</div>
					</div>

					<!--<div class="mt-3">
						<img src="assets/img/ads/bennett-sq.jpeg" width="100%" class="border rounded">
					</div>

					<div class="mt-3 sticky-top">
						<img src="assets/img/ads/srm-sq.jpeg" width="100%" class="border rounded">
					</div>-->
				</div>
			</div>
		</div>
	</section>
</div>



<?php include('include/footer.php'); ?>

<script>
	$(".college-list").change(function () {
		window.location='college/'+ $(this).find(':selected').data('slug');
});
</script>
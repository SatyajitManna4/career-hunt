<section class=" bg-white pt-lg-30" id="footer_form">
            <div class="container pt-2 pb-2">
                <div class="footer_form">
					<div class="row">
						<div class="col-lg-3 col-md-4 bg-warning">
							<div class="sign-up-form-header text-center mb-2 pt-40">
								<img src="assets/img/icons/graduated.svg" width="120px">
								<h4 class="mb-1 font-weight-800 font-36 pt-10">Apply Now</h4>
								<p class="mb-1">Please fill the application form</p> 
							</div>
						</div>
						<div class="col-lg-9 col-md-8">
							<div class="sign-up-form-wrap position-relative z-index p-10 pb-20 pt-15 w-100">
								<div id="contactresults"></div>
								<form class="login-signup-form get-quote-form-wrap"  method="post" action="apply-form.php" id="formsubmit" novalidate="true">
									<div class="row">
										<div class="col-md-6">
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
													<input type="text" name="mobile" class="form-control" placeholder="Mobile number">
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
										</div>
										<div class="col-md-6">
											<div class="form-group mb-2">
												<div class="input-group input-group-merge">
													<div class="input-icon">
														<span class="ti-layout-column2"></span>
													</div>
													<select class="form-control" name="eligibility" required="">													<option value=""> Select Eligibility</option>
														<?php $collegesarray = runloopQuery("select * from eligibility");
															foreach($collegesarray as $colleges){
														?>
														<option value="<?php echo $colleges['eligibility_id'];?>"><?php echo $colleges['eligibility_name'];?></option>
															<?php }?>
													</select>
												</div>
											</div>
											
											
											<div class="form-group mb-2">
												<div class="input-group input-group-merge">
													<div class="input-icon">
														<span class="ti-world"></span>
													</div>
													<select class="form-control statelist" name="state">													<option value="">Select State</option>													 	 <?php															$upesdata = runloopQuery("select * from state where country_id = '101'  order by state asc");															if(!empty($upesdata)){															$x=1; foreach($upesdata as $allctse){	?>															<option value="<?php echo $allctse['id'];?>"  ><?php echo $allctse['state'];?></option>															<?php }}?>												</select>

												</div>
											</div>
											<div class="form-group mb-2">
												<div class="input-group input-group-merge">
													<div class="input-icon">
														<span class="ti-pie-chart"></span>
													</div>
												<select class="form-control citylist" name="city">												  <option value="">Select City</option>												</select>
												</div>
											</div>
											
										</div>
									</div>
									<div class="text-center">  									
										<button class="btn btn-warning btn-rounded font-16 font-weight-600 p-30 pt-1 pb-1 pl-lg-50 pr-lg-50 mt-3">Submit</button>
									</div>
								</form>
							</div>
						</div> 
					</div>
				</div>
            </div>
        </section>
    <footer class="footer-1 pt-50 pb-40">
        
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
					<a href="#" class="navbar-brand mb-2">
                        <img src="assets/img/footer-logo.png" alt="logo" class="img-fluid">
                    </a>
				</div>
                <div class="col-md-12 text-center">
					<a href="about.php">ABOUT</a> | <a href="college-list.php">UNIVERSITIES</a> | <a href="news.php">NEWS</a> | <a href="contact.php">CONTACT</a>
				</div>
            </div>
        </div>
        <!--end of container-->
    </footer>
    <!--footer bottom copyright start-->
    <div class="footer-bottom py-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright-wrap text-center">
                        <p class="mb-0 text-gray-lightgray font-12">COPYRIGHT © <?=date('Y');?> Career Hunt ALL RIGHTS RESERVED</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<div class="modal fade" id="Modal_from">
		<div class="modal-dialog modal-lg modal-dialog-centered">
			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="row m-0">
					<div class="col-md-5 p-0 d-none d-sm-none d-md-block d-lg-block">
						<img src="assets/img/bg/modal-form.jpg" width="100%">
					</div>
					<div class="col-md-7 p-0">
						<div class="bg-white border-radius-10px overflow-hidden">
							<div class="sign-up-form-wrap position-relative z-index p-0 w-100 bg-white">
								<div class="sign-up-form-header p-10 pb-1 pl-20 pt-20">
									<h4 class="mb-1 font-weight-700 font-25">Apply Now</h4>
									<p class="mb-1">Please fill the below application form</p> 
								</div>
								<div class="pt-1 p-20 pb-20 ">
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
	</div>
	
    <div class="scroll-top scroll-to-target bg-black text-white" data-target="html">
        <span class="fas fa-hand-point-up"></span>
    </div>
    <script src="assets/js/vendors/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendors/popper.min.js"></script>
    <script src="assets/js/vendors/bootstrap.min.js"></script>
    <script src="assets/js/vendors/jquery.easing.min.js"></script>
    <script src="assets/js/vendors/owl.carousel.min.js"></script>
    <script src="assets/js/vendors/countdown.min.js"></script>
    <script src="assets/js/vendors/jquery.waypoints.min.js"></script>
    <script src="assets/js/vendors/jquery.rcounterup.js"></script>
    <script src="assets/js/vendors/magnific-popup.min.js"></script>
    <script src="assets/js/vendors/validator.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/Chart.min.js"></script>
    <script src="assets/js/utils.js"></script>
    <script src="assets/lightbox/jquery.lightbox.js"></script>
	<script>
  // Initiate Lightbox
  $(function() {
    $('.college-gallery a').lightbox(); 
  });
</script>
	<script>
		$(document).ready(function() {
			
			$('.div_collapse').click(function(){
			  if($(this).hasClass('hide')) {
				$(this).animate(200).removeClass('hide');
			  } else { 
				$(this).animate(200).addClass('hide');
			  }
			});
			
			$('.popup-gallery').magnificPopup({
				delegate: 'a',
				type: 'image',
				tLoading: 'Loading image #%curr%...',
				mainClass: 'mfp-img-mobile',
				gallery: {
					enabled: true,
					navigateByImgClick: true,
					preload: [0,1] // Will preload 0 - before current, and 1 after the current image
				},
				image: {
					tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
					titleSrc: function(item) {
						return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
					}
				}
			});
		});
	</script>
	<script>
		var DATA_COUNT = 16;

		var utils = Samples.utils;

		utils.srand(110);

		function colorize(opaque, ctx) {
			var v = ctx.dataset.data[ctx.dataIndex];
			var c = v < -50 ? '#D60000'
				: v < 0 ? '#F46300'
				: v < 50 ? '#0358B6'
				: '#44DE28';

			return opaque ? c : utils.transparentize(c, 1 - Math.abs(v / 150));
		}

		function generateData() {
			return utils.numbers({
				count: DATA_COUNT,
				min: -100,
				max: 100
			});
		}

		var data = {
			labels: utils.months({count: DATA_COUNT}),
			datasets: [{
				data: generateData()
			}]
		};

		var options = {
			legend: false,
			tooltips: false,
			elements: {
				rectangle: {
					backgroundColor: colorize.bind(null, false),
					borderColor: colorize.bind(null, true),
					borderWidth: 2
				}
			}
		};

		var chart = new Chart('chart-0', {
			type: 'bar',
			data: data,
			options: options
		});

		// eslint-disable-next-line no-unused-vars
		function randomize() {
			chart.data.datasets.forEach(function(dataset) {
				dataset.data = generateData();
			});
			chart.update();
		}

		// eslint-disable-next-line no-unused-vars
		function addDataset() {
			chart.data.datasets.push({
				data: generateData()
			});
			chart.update();
		}

		// eslint-disable-next-line no-unused-vars
		function removeDataset() {
			chart.data.datasets.shift();
			chart.update();
		}
	</script>
	
	<script>
		$(document).ready(function(){
		  $('[data-toggle="tooltip"]').tooltip();   
		});
	</script>
	<script>
    /*$("#formsubmit, #formsubmit1").submit(function(event) {
        event.preventDefault();
        proceed = true;
        if (proceed) {
            var post_url = $(this).attr("action");
            var request_method = $(this).attr("method");
            var form_data = new FormData(this);
            $.ajax({
                url: 'apply-form.php',
                type: request_method,
                data: form_data,
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $("#contactresults, #contactresults1").show();
                    $("#contactresults, #contactresults1").html("<div class='alert alert-danger'>Please wait..</div>");
                },
                success: function(res) {
                    if (res.status == "0") {
                        $("#contactresults, #contactresults1").show();
                        $("#contactresults, #contactresults1").html("<div class='alert alert-danger'>" + res.message + "</div>");
                        $("#contactresults, #contactresults1").html(res.message);
                    }
                    if (res.status == "1") {
                        $("#contactresults, #contactresults1").hide();
                        $("#contactresults, #contactresults1").show();
                        $("#contactresults, #contactresults1").html("<div class='alert alert-success'>" + res.message + "</div>");
                        $("#formsubmit, #formsubmit1")[0].reset(); 
                    }
                }
            });
        }
    });*/
    $(".statelist").change(function(event) {
        event.preventDefault();
        proceed = true;
        if (proceed) {
            var post_url = $(this).attr("action");
            var request_method = $(this).attr("method");
            var state = $(this).val();
            $.ajax({
                url: 'admin/citylist.php',
                type: 'POST',
                data: {
                    'state': state
                },
                success: function(res) {
                    $(".citylist").html("");
                    $(".citylist").html(res);
                }
            });
        }
    });
</script>
	
	<script>
		$( document ).ready(function() {
			$(function (){
				$('.table_responsive > table').wrap('<div class="table-responsive"></div>');
			}); 
			$('.table_responsive > table').addClass('table');
		});
	</script>
</body>
</html>

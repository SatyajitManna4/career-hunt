<?php include('functions.php'); 
$colleges = runQuery("select * from news where slug = '".$_GET['slug']."'");
?>
<?php include('include/header.php'); ?>


    <div class="main">

        <section class="pt-lg-80 pb-30 pt-70 font-14 bg-white-f9" >
			<div class="container">
				<div class="row">
					<div class="col-md-8 pr-lg-1">
						<div class="breadcrumb-bar gray-light-bg border-bottom">
								<div class="container">
									<div class="row">
										<div class="col-12">
											<div class="custom-breadcrumb">
												<ol class="breadcrumb pl-0 mb-0 bg-transparent">
													<li class="breadcrumb-item"><a href="/">Home</a></li>
													<li class="breadcrumb-item"><a href="news.php">Home</a></li>
													<li class="breadcrumb-item active"><?php echo $colleges['name'];?></li>
												</ol>
											</div>
										</div>
									</div>
								</div>
							</div>
						<div class="bg-white p-4 mt-0">
							<img class="mb-20" src="<?php echo NEWS_IMAGE.$colleges['image'];?>" width="100%">
							<h3 class="text-black mb-10 pb-10 text-black font-32 border-bottom "><?php echo $colleges['name'];?></h3>
							<!--p class="text-white"><i class="fas fa-map-marker-alt"></i> <?php echo city_name($colleges['city']);?>, <?php echo 	state_name($colleges['state']);?></p-->
							
							<?php echo $colleges['description'];?>
						</div>
					</div>


				</div>

			</div>

        </section>

    </div>



<?php include('include/footer.php'); ?>
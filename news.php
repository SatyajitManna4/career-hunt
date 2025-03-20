<?php include('functions.php');  
?>
<?php include('include/header.php'); ?>

	<div class="main">
	
		<!--page header section start-->
        <section class="pt-60 pb-10 pb-xs-10 pt-xs-60 bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header-content text-black pt-4">
                            <h3 class="text-black mb-0 text-black font-32 text-uppercase">News</h3>
                        </div>
                    </div>
                </div>
            </div>    
        </section>
		<div class="breadcrumb-bar gray-light-bg border-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="custom-breadcrumb">
                            <ol class="breadcrumb pl-0 mb-0 bg-transparent">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item active">About us</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		
		<section class="promo-section pt-30 pb-30 bg-white-f9">
            <div class="container">
                <div class="row">
				<?php $collegesarray = runloopQuery("select * from news order by rand() limit 0,8");
						foreach($collegesarray as $colleges){
					?>
					<div class="col-lg-4 col-md-6">
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
        </section>
        

    </div>


<?php include('include/footer.php'); ?>
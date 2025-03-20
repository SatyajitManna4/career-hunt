<?php
session_start();
error_reporting(0); 
include('../functions.php');
$userid = current_adminid();
$userrole = user_adminrole();
if(empty($userid)){
	header("Location: index.php");
}
$college = runQuery("select * from eligibility where eligibility_id = '".$_GET['edit']."'");
if(!empty($_POST['eligibilitysubmit'])){
	
	$eligibilitylug = filter_string(mysqli_real_escape_string($conn,$_POST['eligibility_name']));
	$prevcolle = runQuery("select * from eligibility where eligibility_name = '".$eligibilitylug."' and eligibility_id <> '".$college['eligibility_id']."'");
	
	if(empty($prevcolle['eligibility_id'])){
		$collegearray = $collegewherearray = array();
		$collegewherearray['eligibility_id'] = $college['eligibility_id'];
		$collegearray['eligibility_name'] = mysqli_real_escape_string($conn,$_POST['eligibility_name']);
		$collegearray['slug'] = $eligibilitylug; 

		$result = updateQuery($collegearray,'eligibility',$collegewherearray);

		if (!$result) {

		header("Location: eligibility.php?success=success");

		} else {
			$message = "Error deleting record: " . $conn->error;
		}
	} else {
		$message = "Eligibility already exists.";
	}
}
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Career Hunt</title>

<?php include('headerscripts.php');?>
		
</head>
<body>
	<div class="main-wrapper">

<?php include('header.php');?> 
	
		<div class="page-wrapper">
				
<?php include('topbar.php');?>
		
			<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit Eligibility</li>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Edit eligibility</h6> 
				<? if(!empty($message)){?>

								<div class="alert alert-danger">

								<?=$message;?>

								</div>

								<? }?>
				<form method="post" action="" autocomplete="off" enctype="multipart/form-data" >
                <div class="row">
					<div class="col-md-12">
						<label>Name: </label>
						<input type="text" class="form-control" required name="eligibility_name" value="<?php echo $college['eligibility_name'];?>" />
					</div> 
					<div class="col-md-12"> 
						<button class="btn btn-primary" name="eligibilitysubmit" value="submit" >Submit</button>
					</div>
				</div>
				</form> 
              </div>
            </div>
					</div>
				</div>

			</div>

<?php include('footer.php');?>
		
	
		</div>
	</div>

<?php include('footerscripts.php');?>
	<script>
		   $("#state").on('change', function(){
           var state = $(this).val();
           var route = 'citylist.php?state='+state;
           $.ajax({
               type:"POST",
               url:route,
               data:{
                   state:state
               },
               success: function(data) {
                   $("#city").html("");
                   $("#city").html(data);
               }
           });
       });
	</script>
</body> 
</html>
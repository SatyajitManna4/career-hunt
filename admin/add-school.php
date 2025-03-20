<?php
session_start();
error_reporting(0); 
include('../functions.php');
$userid = current_adminid();
$userrole = user_adminrole();
if(empty($userid)){
	header("Location: index.php");
}
 if(!empty($_POST['schoolsubmit'])){
	  		
	$schoollug = filter_string(mysqli_real_escape_string($conn,$_POST['school_name']));
	$prevcolle = runQuery("select * from school where slug = '".$schoollug."'");
	if(empty($prevcolle['school_id'])){
		
	$collegearray = array();
	$collegearray['school_name'] = mysqli_real_escape_string($conn,$_POST['school_name']);
	$collegearray['slug'] = $schoollug; 
	$result = insertQuery($collegearray,'school');
	
if (!$result) {
   
header("Location: add-school.php?success=success");
   
} else {
    $message = "Error deleting record: " . $result;
}
} else {
    $message = "Course Category already exists.";
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
						<li class="breadcrumb-item active" aria-current="page">Add Course Category</li>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Add Course Category</h6> 
				<? if(!empty($message)){?>

								<div class="alert alert-danger">

								<?=$message;?>

								</div>

								<? }?>
				<form method="post" action="" autocomplete="off" enctype="multipart/form-data" >
                <div class="row">
					<div class="col-md-12">
						<label>Name: </label>
						<input type="text" class="form-control" required name="school_name" />
					</div> 
					<div class="col-md-12"> 
						<button class="btn btn-primary" name="schoolsubmit" value="submit" >Submit</button>
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
</body> 
</html>
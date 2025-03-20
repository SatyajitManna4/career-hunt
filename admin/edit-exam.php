<?php
session_start();
error_reporting(0); 
include('../functions.php');
$userid = current_adminid();
$userrole = user_adminrole();
if(empty($userid)){
	header("Location: index.php");
}
$college = runQuery("select * from exam where exam_id = '".$_GET['edit']."'");
 if(!empty($_POST['examsubmit'])){
	  		
	$examlug = filter_string(mysqli_real_escape_string($conn,$_POST['exam_name']));
	$prevcolle = runQuery("select * from exam where exam_name = '".$examlug."' and exam_id <> '".$college['exam_id']."'");
	if(empty($prevcolle['exam_id'])){
		
	$collegearray = $collegewherearray = array();
	$collegewherearray['exam_id'] = $college['exam_id'];
	$collegearray['exam_name'] = mysqli_real_escape_string($conn,$_POST['exam_name']);
	$collegearray['exam_eligibility_id'] = mysqli_real_escape_string($conn,$_POST['exam_eligibility_id']);
	$collegearray['application_link'] = mysqli_real_escape_string($conn,$_POST['application_link']);
	
	$result = updateQuery($collegearray,'exam',$collegewherearray);
	
if (!$result) {
   
header("Location: exam.php?success=success");
   
} else {
    $message = "Error deleting record: " . $conn->error;
}
} else {
    $message = "exam already exists.";
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
						<li class="breadcrumb-item active" aria-current="page">Edit exam</li>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Edit exam</h6> 
				<? if(!empty($message)){?>

								<div class="alert alert-danger">

								<?=$message;?>

								</div>

								<? }?>
				<form method="post" action="" autocomplete="off" enctype="multipart/form-data" >
                <div class="row">
					<div class="col-md-12">
						<label>Name: </label>
						<input type="text" class="form-control" required name="exam_name" value="<?php echo $college['exam_name'];?>" />
					</div> 
					<div class="col-md-12">
						<label>Application Link: </label>
						<input type="text" class="form-control" required name="application_link" value="<?php echo $college['application_link'];?>" />
					</div> 
					<div class="col-md-12">
						<label>Select Eligibility:  </label>
						<select class="form-control" required name="exam_eligibility_id">
							<option value="">Choose One</option>
							<?php
							$upesdata = runloopQuery("select * from eligibility  order by eligibility_name asc");
                            if(!empty($upesdata)){
                            foreach($upesdata as $allctse){	?>
							<option value="<?php echo $allctse['eligibility_id'];?>" <?php if($allctse['eligibility_id']==$college['exam_eligibility_id']) echo "selected"; ?>><?php echo $allctse['eligibility_name'];?></option>
							<?php } } ?>
						</select>
					</div> 
					<div class="col-md-12"> 
						<button class="btn btn-primary" name="examsubmit" value="submit" >Submit</button>
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
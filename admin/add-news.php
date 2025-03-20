<?php
session_start();
error_reporting(0); 
include('../functions.php');
$userid = current_adminid();
$userrole = user_adminrole();
if(empty($userid)){
	header("Location: index.php");
}
 if(!empty($_POST['newsubmit'])){
	  		
	$newslug = filter_string(mysqli_real_escape_string($conn,$_POST['name']));
	$prevcolle = runQuery("select * from news where slug = '".$newslug."'");
	if(empty($prevcolle['id'])){
		
	$collegearray = array();
	$collegearray['name'] = mysqli_real_escape_string($conn,$_POST['name']);
	$collegearray['slug'] = $newslug; 
	$collegearray['description'] = mysqli_real_escape_string($conn,$_POST['description']);
	if(!empty($_FILES['image']['name'])){
		
		if (!file_exists('../newsimage')) {	

			mkdir('../newsimage', 0777, true);	

			}
	$target_dir = '../newsimage/';
  
	$file = $_FILES['image']['name'];	
	$uploadOk = 1;
	$imageFileType = pathinfo($file,PATHINFO_EXTENSION);								

	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" )

		{

	$message .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		

	$uploadOk = 0;						

	}			
	$filename = strtolower(base_convert(time(), 10, 36) . '_' . md5(microtime())).'.'.$imageFileType;	
	$target_file = $target_dir .$filename; 	

	if ($uploadOk == 0) {			

	$message .= "Sorry, your file was not uploaded.";		

	} else {
	  if (move_uploaded_file($_FILES['image']["tmp_name"], $target_file)){
		  $collegearray['image'] = $filename;						

			} else {

				$message .= "Sorry, There Was an Error Uploading Your File.";
				}

			} 
	}
	
	$result = insertQuery($collegearray,'news');
	
if (!$result) {
   
header("Location: add-news.php?success=success");
   
} else {
    $message = "Error deleting record: " . $result;
}
} else {
    $message = "College already exists.";
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
						<li class="breadcrumb-item active" aria-current="page">Add News</li>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Add News</h6> 
				<? if(!empty($message)){?>

								<div class="alert alert-danger">

								<?=$message;?>

								</div>

								<? }?>
				<form method="post" action="" autocomplete="off" enctype="multipart/form-data" >
                <div class="row">
					<div class="col-md-12">
						<label>Name: </label>
						<input type="text" class="form-control" required name="name" />
					</div> 
					<div class="col-md-12">
						<label>Image: </label>
						<input type="file" class="form-control" required name="image" />
					</div>
					 
					<div class="col-md-12">
						<label>Description: </label>
						<textarea class="form-control" name="description"  id="editor1"   required></textarea>
					</div>
					<div class="col-md-12"> 
						<button class="btn btn-primary" name="newsubmit" value="submit" >Submit</button>
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
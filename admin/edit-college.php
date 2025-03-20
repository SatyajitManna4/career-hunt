<?php session_start(); error_reporting(0); include( '../functions.php' ); ?>
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
<?php
$userid = current_adminid();
$userrole = user_adminrole();
if ( empty( $userid ) ) {
	header( "Location: index.php" );
}
$college = runQuery( "select * from colleges where id = '" . $_GET[ 'edit' ] . "'" );
if ( !empty( $_POST[ 'collegesubmit' ] ) ) {

	$collegeslug = filter_string( $_POST[ 'name' ] );
	$prevcolle = runQuery( "select * from colleges where slug = '" . $collegeslug . "' and id <> '" . $college[ 'id' ] . "'" );
	if ( empty( $prevcolle[ 'id' ] ) ) {

		$collegearray = $collegewherearray = array();
		$collegewherearray[ 'id' ] = $college[ 'id' ];
		$collegearray[ 'name' ] = mysqli_real_escape_string( $conn, $_POST[ 'name' ] );
		$collegearray[ 'slug' ] = $collegeslug;
		$collegearray[ 'course' ] = implode( ",", $_POST[ 'course' ] );
		$collegearray[ 'school' ] = implode( ",", $_POST[ 'school' ] );
		$collegearray[ 'fees' ] = mysqli_real_escape_string( $conn, $_POST[ 'fees' ] );
		$collegearray['intro_video'] = mysqli_real_escape_string($conn,$_POST['intro_video']);
		$collegearray[ 'state' ] = mysqli_real_escape_string( $conn, $_POST[ 'state' ] );
		$collegearray[ 'city' ] = mysqli_real_escape_string( $conn, $_POST[ 'city' ] );
		$collegearray[ 'description' ] = mysqli_real_escape_string( $conn, $_POST[ 'description' ] );
		$collegearray[ 'why_choose' ] = mysqli_real_escape_string( $conn, $_POST[ 'why_choose' ] );
		$collegearray['scholarship'] = mysqli_real_escape_string($conn,$_POST['scholarship']);
		$collegearray['award'] = mysqli_real_escape_string($conn,$_POST['award']);
		$collegearray['placement'] = mysqli_real_escape_string($conn,$_POST['placement']);

		/*print_r($_FILES['image']['name']);*/
		$total = count($_FILES['image']['name']);
		
		if (!empty($_FILES['image']['name'][0])) {

			if ( !file_exists( '../collegeimage' ) ) {

				mkdir( '../collegeimage', 0777, true );

			}
			$target_dir = '../collegeimage/';
			
			for( $i=0 ; $i < $total ; $i++ ) {
			
				$file = $_FILES[ 'image' ][ 'name' ][$i];
				$uploadOk = 1;
				$imageFileType = pathinfo( $file, PATHINFO_EXTENSION );

				if ( $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )

				{

					$imgmessage .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

					$uploadOk = 0;

				}
				$filename = strtolower( base_convert( time(), 10, 36 ) . '_' . md5( microtime() ) ) . '.' . $imageFileType;
				$target_file = $target_dir . $filename;

				if ( $uploadOk == 0 ) {

					$imgmessage .= "Sorry, your file was not uploaded.";

				}
				else
				{
					if ( move_uploaded_file( $_FILES[ 'image' ][ "tmp_name" ][$i], $target_file ) ) 
					{
						$image[] = $filename;
					}
					else
					{
						$imgmessage .= "Sorry, There Was an Error Uploading Your File.";
					}
				}
				
			}
			
			if(!empty($_POST['image_prev']) and count($_POST['image_prev'])>0)
				$collegearray[ 'image' ] = json_encode(array_merge($image,$_POST['image_prev']));
			else
				$collegearray[ 'image' ] = json_encode($image);
				
		}
		
		
		
		
		
		
		
		$total2 = count($_FILES['placement_logo']['name']);
		if (!empty($_FILES['placement_logo']['name'][0])) {

			if ( !file_exists( '../collegeimage' ) ) {

				mkdir( '../collegeimage', 0777, true );

			}
			$target_dir = '../collegeimage/';
			
			for( $i=0 ; $i < $total2 ; $i++ ) {
			
				$file = $_FILES[ 'placement_logo' ][ 'name' ][$i];
				$uploadOk = 1;
				$imageFileType = pathinfo( $file, PATHINFO_EXTENSION );

				if ( $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )

				{

					$imgmessage .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

					$uploadOk = 0;

				}
				$filename = strtolower( base_convert( time(), 10, 36 ) . '_' . md5( microtime() ) ) . '.' . $imageFileType;
				$target_file = $target_dir . $filename;

				if ( $uploadOk == 0 ) {

					$imgmessage .= "Sorry, your file was not uploaded.";

				}
				else
				{
					if ( move_uploaded_file( $_FILES[ 'placement_logo' ][ "tmp_name" ][$i], $target_file ) ) 
					{
						$placement_logo[] = $filename;
					}
					else
					{
						$imgmessage .= "Sorry, There Was an Error Uploading Your File.";
					}
				}
				
			}
			
			
			if(!empty($_POST['placement_image_prev']) and count($_POST['placement_image_prev'])>0)
				$collegearray[ 'placement_logo' ] = json_encode(array_merge($placement_logo,$_POST['placement_image_prev']));
			else
				$collegearray[ 'placement_logo' ] = json_encode($placement_logo);
			
						
		}
		
		

		if ( !empty( $_FILES[ 'cover_image' ][ 'name' ] ) ) {

			if ( !file_exists( '../collegeimage' ) ) {

				mkdir( '../collegeimage', 0777, true );

			}
			$target_dir = '../collegeimage/';

			$file = $_FILES[ 'cover_image' ][ 'name' ];
			$uploadOk = 1;
			$imageFileType = pathinfo( $file, PATHINFO_EXTENSION );

			if ( $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )

			{

				$imgmessage .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

				$uploadOk = 0;

			}
			$filename = strtolower( base_convert( time(), 10, 36 ) . '_' . md5( microtime() ) ) . '.' . $imageFileType;
			$target_file = $target_dir . $filename;

			if ( $uploadOk == 0 ) {

				$imgmessage .= "Sorry, your file was not uploaded.";

			} else {
				if ( move_uploaded_file( $_FILES[ 'cover_image' ][ "tmp_name" ], $target_file ) ) {
					$collegearray[ 'cover_image' ] = $filename;

				} else {

					$imgmessage .= "Sorry, There Was an Error Uploading Your File.";
				}

			}
		}
		
		

		if ( !empty( $_FILES[ 'logo' ][ 'name' ] ) ) {

			if ( !file_exists( '../collegeimage' ) ) {

				mkdir( '../collegeimage', 0777, true );

			}
			$target_dir = '../collegeimage/';

			$file = $_FILES[ 'logo' ][ 'name' ];
			$uploadOk = 1;
			$imageFileType = pathinfo( $file, PATHINFO_EXTENSION );

			if ( $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )

			{

				$imgmessage .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

				$uploadOk = 0;

			}
			$filename = strtolower( base_convert( time(), 10, 36 ) . '_' . md5( microtime() ) ) . '.' . $imageFileType;
			$target_file = $target_dir . $filename;

			if ( $uploadOk == 0 ) {

				$imgmessage .= "Sorry, your file was not uploaded.";

			} else {
				if ( move_uploaded_file( $_FILES[ 'logo' ][ "tmp_name" ], $target_file ) ) {
					$collegearray[ 'logo' ] = $filename;

				} else {

					$imgmessage .= "Sorry, There Was an Error Uploading Your File.";
				}

			}
		}
		
		/*echo "<pre>";
		print_r($collegearray); die;*/

		$result = updateQuery( $collegearray, 'colleges', $collegewherearray );

		if ( !$result ) {

			echo("<script>location.href = 'edit-college.php?edit=".$college[ 'id' ]."';</script>");

		} else {
			$message = "Error deleting record: " . $conn->error;
		}
	} else {
		$message = "College already exists.";
	}
}	
?>
	<div class="main-wrapper">

<?php include('header.php');?> 
	
		<div class="page-wrapper">
				
<?php include('topbar.php');?>
		
			<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit Institute</li>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Edit Institute</h6> 
				<? if(!empty($message)){?>

								<div class="alert alert-danger">

								<?=$message;?>

								</div>

								<? }?>
				<form method="post" action="" autocomplete="off" enctype="multipart/form-data" >
                <div class="row">
					<div class="col-md-12">
						<label>Name: </label>
						<input type="text" class="form-control"  name="name" value="<?php echo $college['name'];?>" />
					</div>

										<div class="col-md-12">
											<label>Select Course Category: (Press CTRL and select multiple course Category) </label>
											<select class="form-control"  name="school[]" multiple>
												<option value="">Choose One</option>
												<?php
							$SCHOOL=explode(",",$college['school']);
												$upesdata = runloopQuery( "select * from school  order by school_name asc" );
												if ( !empty( $upesdata ) ) {
													foreach ( $upesdata as $allctse ) {
														?>
												<option value="<?php echo $allctse['school_id'];?>"  <?php if(in_array($allctse['school_id'],$SCHOOL)) echo "selected"; ?>>
													<?php echo $allctse['school_name'];?>
												</option>
												<?php } } ?>
											</select>
										</div>
					
					<div class="col-md-12">
						<label>Select Course: (Press CTRL and select multiple course) </label>
						<select class="form-control"  name="course[]" multiple>
							<option value="">Choose One</option>
							<?php
							$COURSE=explode(",",$college['course']);
							$upesdata = runloopQuery("select * from course  order by course_name asc");
                            if(!empty($upesdata)){
                            foreach($upesdata as $allctse){	?>
							<option value="<?php echo $allctse['course_id'];?>" <?php if(in_array($allctse['course_id'],$COURSE)) echo "selected"; ?>><?php echo $allctse['course_name'];?></option>
							<?php } } ?>
						</select>
					</div> 
					
					<div class="col-md-12">
						<label>Fees: </label>
						<input type="text" class="form-control"  name="fees" value="<?php echo $college['fees'];?>"  />
					</div>
					
					<div class="col-md-12">
						<label>Introductory Video (Youtube Link): </label>
						<input type="text" class="form-control" name="intro_video" value="<?php echo $college['intro_video'];?>"  />
					</div>

					<div class="col-md-12">
						<label>Cover Photo: </label>
						<img style="height:50px;" src="../collegeimage/<?php echo $college['cover_image'];?>" />
						<input type="file" class="form-control"  name="cover_image"/>
					</div>
					
					<div class="col-md-12">
						<label>Photo Gallery: </label>
						<?php $image_gal=json_decode($college['image'],true); if(!empty($image_gal)){ foreach($image_gal as $DATA){ ?>
						<span>
							<img style="width:50px;height:50px" src="../collegeimage/<?php echo $DATA;?>" />
							<input type="hidden" name="image_prev[]" value="<?php echo $DATA;?>"/>&nbsp;
							<a href="javascript:void(0)" onclick="return this.parentNode.remove();">Remove</a>
						</span>
						<?php } } ?>
						<input type="file" class="form-control" name="image[]" multiple />
					</div>
					<div class="col-md-12">
						<label>Logo: </label>
						<img style="height:50px;" src="../collegeimage/<?php echo $college['logo'];?>" />
						<input type="file" class="form-control" name="logo" />
					</div>
					<div class="col-md-12">
						<label>State: </label>
						<select class="form-control" name="state"  id="state">
							<option value=""></option>
							 <?php
							$upesdata = runloopQuery("select * from state where country_id = '101'  order by ID desc");
                            if(!empty($upesdata)){
                            $x=1; foreach($upesdata as $allctse){	?>
							<option value="<?php echo $allctse['id'];?>" <?php if($allctse['id']==$college['state']){ echo 'selected';}?>><?php echo $allctse['state'];?></option>
							<?php }}?>
						</select>
					</div>
					<div class="col-md-12">
						<label>City: </label>
						<select class="form-control" name="city"  id="city">
							<option value=""></option> 
							<?php
							if($college['state']){
							$upesdata = runloopQuery("select * from city where state_id = '".$college['state']."'  order by ID desc");
                            if(!empty($upesdata)){
                            $x=1; foreach($upesdata as $allctse){	?>
							<option value="<?php echo $allctse['id'];?>" <?php if($allctse['id']==$college['city']){ echo 'selected';}?>><?php echo $allctse['city'];?></option>
							<?php  } }}?>
						</select>
					</div>
					<div class="col-md-12">
						<label>Overview: </label>
						<textarea class="form-control" name="description"  id="editor1"   ><?php echo $college['description'];?></textarea>
					</div>
					<div class="col-md-12">
						<label>Why Choose: </label>
						<textarea class="form-control" name="why_choose"  id="editor5"   ><?php echo $college['why_choose'];?></textarea>
					</div>
					
					
					<div class="col-md-12">
						<label>Scholarship: </label>
						<textarea class="form-control" name="scholarship"  id="editor2"   ><?php echo $college['scholarship'];?></textarea>
					</div>
					
					
					<div class="col-md-12">
						<label>Award & Recognization: </label>
						<textarea class="form-control" name="award"  id="editor3"   ><?php echo $college['award'];?></textarea>
					</div>
					
					<div class="col-md-12">
						<label>Placement: </label>
						<textarea class="form-control" name="placement"  id="editor4"   ><?php echo $college['placement'];?></textarea>
						<?php $image_placement_gal=json_decode($college['placement_logo'],true); if(!empty($image_placement_gal)){ foreach($image_placement_gal as $DATA){ ?>
						<span>
							<img style="width:50px;height:50px" src="../collegeimage/<?php echo $DATA;?>" />
							<input type="hidden" name="placement_image_prev[]" value="<?php echo $DATA;?>"/>&nbsp;
							<a href="javascript:void(0)" onclick="return this.parentNode.remove();">Remove</a>
						</span>
						<?php } } ?>
						<input type="file" class="form-control" name="placement_logo[]" multiple />
					</div>
					
					<div class="col-md-12"> 
						<button class="btn btn-primary" name="collegesubmit" value="submit" >Submit</button>
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
	
	<script>
		var editor2 = new Jodit('#editor2');
		var editor3 = new Jodit('#editor3');
		var editor4 = new Jodit('#editor4');
		var editor5 = new Jodit('#editor5');
	</script>
</body> 
</html>
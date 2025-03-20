<?php
session_start();
error_reporting(0); 
include('../functions.php');
$userid = current_adminid();
$userrole = user_adminrole();
if(empty($userid)){
	header("Location: index.php");
}
 if(!empty($_GET['deleterecord'])){
	  		
	$sql = "DELETE FROM eligibility WHERE eligibility_id=".$_GET['deleterecord']."";

if ($conn->query($sql) === TRUE) {
   
header("Location: eligibility.php?success=success");
   
} else {
    echo "Error deleting record: " . $conn->error;
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
						<li class="breadcrumb-item active" aria-current="page">Eligibility</li>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Eligibility</h6> 
				<a href="add-eligibility.php" class="btn btn-primary" >Add Eligibility</a>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                       <tr>
                                <th>S.No.</th>
                                <th>Eligibility Name</th> 
                                <th>Actions</th>

                            </tr>
                    </thead>
                     <tbody id="after12_row">
                            <?php
							$upesdata = runloopQuery("select * from eligibility  order by eligibility_id desc");
                            if(!empty($upesdata)){
                            $x=1; foreach($upesdata as $allctse){	?>

                            <tr id="recordid<?php echo $allctse['ID'];?>">
                                <td><?php echo $x;?></td> 
                                <td><?php echo $allctse['eligibility_name'];?></td>
                                <td>
									<a  class="btn btn-success btn-sm"   href="edit-eligibility.php?edit=<?php echo $allctse['eligibility_id'];?>"><i class="fa fa-pencil mr-0-5"></i>Edit</a>
									<a  class="btn btn-danger btn-sm" onclick="confirm('Are you sure want to delete');" href="?deleterecord=<?php echo $allctse['eligibility_id'];?>"><i class="fa fa-trash mr-0-5"></i>Delete</a>
                                </td>
                            </tr>
                            <?php $x++; } }?>

                            </tbody>
                    </tbody>
                  </table>
                </div>
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
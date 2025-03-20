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
	  		
	$sql = "DELETE FROM leads WHERE ID=".$_GET['deleterecord']."";

if ($conn->query($sql) === TRUE) {
   
header("Location: leads.php?success=success");
   
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
						<li class="breadcrumb-item active" aria-current="page">Leads</li>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
						  <div class="card-body">
							<h6 class="card-title">Leads</h6> 
							<div class="table-responsive">
							  <table id="dataTableExample" class="table">
								<thead>
									<tr>
										<th>S.No.</th>
										<th>Name</th>
										<th>Email</th>
										<th>Mobile</th>
										<th>Eligibility</th>
										<th>State</th>
										<th>City</th>
										<th>Date & Time</th>
										<th>Actions</th> 
									</tr>
								</thead>
								 <tbody id="after12_row">
										<?php
										$upesdata = runloopQuery("select * from leads,eligibility where leads.eligibility=eligibility.eligibility_id order by ID desc");
										if(!empty($upesdata)){
										$x=1; foreach($upesdata as $allctse){	?>
										<tr id="recordid<?php echo $allctse['ID'];?>">
											<td><?php echo $x;?></td>
											<td><?php echo $allctse['name'];?></td>
											<td><?php echo $allctse['email'];?></td>
											<td><a href="javascript:void(0);"  onclick="landingpage(<?php echo $allctse['ID'];?>);"><?php echo $allctse['mobile'];?></a></td>
											<td><?php echo $allctse['eligibility_name'];?></td>
											<td><?php echo state_name($allctse['state']);?></td>
											<td><?php echo city_name($allctse['city']);?></td>
											<td><?php echo date('d M Y H:i:s',strtotime($allctse['reg_date']));?></td>
											<td><a  class="btn btn-danger btn-sm" onclick="confirm('Are you sure want to delete');" href="?deleterecord=<?php echo $allctse['ID'];?>"><i class="fa fa-trash mr-0-5"></i>Delete</a>
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
<?php 
include('../functions.php');
$state = $_POST['state']; 
?>
<?php
	$upesdata = runloopQuery("select * from city where state_id = '".$state."'  order by city asc");
	if(!empty($upesdata)){
	$x=1; foreach($upesdata as $allctse){	?>
	<option value="<?php echo $allctse['id'];?>"><?php echo $allctse['city'];?></option>
	<?php }}?>
<?php 
session_start();
include('functions.php');
$payload = array(); 
	if(!empty($_POST['name'])){
		if(!empty($_POST['email'])){
			if(!empty($_POST['mobile'])){
				if(strlen($_POST['mobile'])==10){
					$postarray = array();
					$postarray['name'] = mysqli_real_escape_string($conn,$_POST['name']);
					$postarray['email'] = mysqli_real_escape_string($conn,$_POST['email']);
					$postarray['mobile'] = mysqli_real_escape_string($conn,$_POST['mobile']);
					$postarray['state'] = mysqli_real_escape_string($conn,$_POST['state']);
					$postarray['city'] = mysqli_real_escape_string($conn,$_POST['city']);
					$postarray['eligibility'] = mysqli_real_escape_string($conn,$_POST['eligibility']);
					$result = insertIDQuery($postarray,"leads");
					if(!empty($result)){
						$_SESSION['student_id']=$result;
						$message = "Career Hunt";
						$message .= $postarray['name'].', ';
						$message .= $postarray['email'].', ';
						$message .= $postarray['mobile'].', '; 
						$message .= $postarray['utm_source'].', ';
						$message .= date('d M Y H:i A');
						$payload = array("status"=>"1","message"=>"Thank you for registering with us. Our counselors will contact you on the given details soon. ");
						header("location:profile.php");
						
						
					}else{
					$payload = array("status"=>"0","message"=>"Technical error found");
					}
				}else{
					$payload = array("status"=>"0","message"=>"Mobile number is invalid");
				}
			}else{
				$payload = array("status"=>"0","message"=>"Mobile is empty");
			}
		}else{
			$payload = array("status"=>"0","message"=>"Email is empty");
		}
	}else{
		$payload = array("status"=>"0","message"=>"Name is empty");
	} 
echo json_encode($payload);
?>
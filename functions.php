<?php
include('dbconfig.php');
date_default_timezone_set('Asia/Kolkata'); 
ini_set('display_errors', 'On'); 
ini_set('log_errors', 'On'); 
 
define('MAILID','info@collegeglobal.in');
define('SITE_URL','');
define('COLLEGE_SLUG',SITE_URL.'college/');
define('NEWS_SLUG',SITE_URL.'news/');
define('COLLEGE_IMAGE',SITE_URL.'collegeimage/');
define('NEWS_IMAGE',SITE_URL.'newsimage/');
 

function insertQuery($query,$table){
	include('dbconfig.php');
	$query['reg_date'] = date('Y-m-d H:i:s');
	$keys = array_keys($query);

$sql = 'INSERT INTO '.$table.' SET ';

for($e=0;$e<sizeof($keys);$e++) {

$sql .=  $keys[$e]."='".$query[$keys[$e]]."'";

if($e != sizeof($keys)-1) { $sql .= ","; }

}

$result = mysqli_query($conn,$sql);
	if(!$result) {
		return $conn->error;
	}
}


function insertIDQuery($query,$table){
	include('dbconfig.php');
	$query['reg_date'] = date('Y-m-d H:i:s');
	$keys = array_keys($query);

$sql = 'INSERT INTO '.$table.' SET ';

for($e=0;$e<sizeof($keys);$e++) {

$sql .=  $keys[$e]."='".$query[$keys[$e]]."'";

if($e != sizeof($keys)-1) { $sql .= ","; }

}

$result = mysqli_query($conn,$sql); 
	return $conn->insert_id; 
}

function updateQuery($query,$table,$wherec){
	include('dbconfig.php');
	
	$arr_keys = array_keys( $query );
	
	$second_arr_keys = array_keys( $wherec );
	
	$sql = 'UPDATE '.$table.' SET ';
	
	for($y=0;$y<sizeof($arr_keys);$y++) {
		
		$sql .=  $arr_keys[$y]." = '".$query[$arr_keys[$y]]."'";

        if($y != sizeof($arr_keys)-1) { $sql .= ","; }
		
	}
	
	$sql .= ' WHERE ';
	
	for($x=0;$x<sizeof($second_arr_keys);$x++) {
		
		$sql .=  $second_arr_keys[$x]."='".$wherec[$second_arr_keys[$x]]."'";

        if($x != sizeof($second_arr_keys)-1) { $sql .= " AND "; }
		
	}
	$result = mysqli_query($conn,$sql);

	if(!$result) {

		return $conn->error;
	}
	
}
function deleteQuery($wherec,$table){

	include('dbconfig.php');

 $second_arr_keys = array_keys( $wherec );



        $sql = "DELETE FROM ".$table." ";



        $sql .= " WHERE ";



        for($x=0;$x<sizeof($second_arr_keys);$x++) {



            $sql .=  $second_arr_keys[$x].'="'.$wherec[$second_arr_keys[$x]].'"';



            if($x != sizeof($second_arr_keys)-1) { $sql .= ' AND '; }



        }

$result = mysqli_query($conn,$sql);

     

	if(!$result) {



		return $conn->error;

	}

    }

function runQuery($query){

	include('dbconfig.php');

$data = array();

$result = $conn->query($query); 

    while($row = $result->fetch_assoc()) {

       $data = $row;

    }

      return $data;

}

function runloopQuery($query){

	include('dbconfig.php');

$data = array();

$result = $conn->query($query);



    // output data of each row

    while($row = $result->fetch_assoc()) {

       $data[] = $row;

    }

      return $data;

}

function selectQuery($tablename,$query=false){

	include('dbconfig.php');
	if(!empty($query)){
		$querydetails = runQuery("select * from $tablename where $query order by ID desc");
	}else{
		$querydetails = runQuery("select * from $tablename order by ID desc");
	}
	return $querydetails;
}
function selectloopQuery($tablename,$query=false){
	include('dbconfig.php');
	if(!empty($query)){
		$querydetails = runloopQuery("select * from $tablename where $query order by ID desc");
	}else{
		$querydetails = runloopQuery("select * from $tablename order by ID desc");
	}
	return $querydetails;
}
function filter_string($string){

	$string = preg_replace('/\s+/', '-', $string);
	$string= preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
   	$string =  preg_replace('/-+/', '-', $string);
   
	return strtolower($string);

}

function unfilter_string($string){

	$string = preg_replace('/-+/', ' ', $string);

	return $string;

}

function current_adminid(){

	$value = "";

if(!empty($_SESSION['global_adminid'])){

	return $value = $_SESSION['global_adminid'] ?: ""; 
}

}

if (! function_exists('sub_str')) {
    function sub_str($text,$length = false)
    {
        $length = $length ?: 100;
        $textlen = strlen($text);
        if($textlen>$length){
            $newtest = substr(strip_tags($text),0,$length).'...';
        }else{
            $newtest = $text;
        }

        return $newtest;
    }
}
if (! function_exists('get_uniqueid')) {
    function get_uniqueid($tablename,$text)
    {
		include("dbconfig.php");
		$uniquederails = (int)runQuery("select MAX(ID) as id from $tablename")['id'];
		$newid = $uniquederails+1;
        return $text.sprintf('%04d',$newid);
    }
}
if (! function_exists('image_url')) {
    function image_url($imagpath,$image)
    {	
		if(!empty($image)){ 
			if(file_exists(SYSPATH.$imagpath.$image)){
			 $name = SITE_URL.$imagpath.$image;
			}else{
			 $name = SITE_URL.'img/exam.jpg';
			}
		}else{
		 $name = SITE_URL.'img/exam.jpg';
		}
		return $name;
    }
}
function generate_string(){
	$length = 4;
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABDEFGHIJKLMNOQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function user_adminrole(){

	$value = "";

if(!empty($_SESSION['gvsonline_adminrole'])){

	return $value = $_SESSION['gvsonline_adminrole'] ?: "";

}
}

function current_userid(){

	$value = "";

if(!empty($_SESSION['gvsstudent_id'])){

	return $value = $_SESSION['gvsstudent_id'] ?: "";

	}

}

function user_role(){

	$value = "";

if(!empty($_SESSION['gvsonline_role'])){

	return $value = $_SESSION['gvsonline_role'] ?: "";
}

}
function admindata(){
	
include("dbconfig.php");
$admindata = runQuery("select id from superadmin where email='info@collegeglobal.in'");

if(empty($admindata)){

$password = password_hash("123456", PASSWORD_DEFAULT);

mysqli_query($conn,"insert into superadmin (name,email,password,role,reg_date) values('Career Hunt','bcastudent@gmail.com','".$password."','superadmin','".date('Y-m-d H:i:s')."')");

}
}  
function get_option($optionname){

include("dbconfig.php");

$optionvalue = runQuery("select value from options where name='".$optionname."'");
if(!empty($optionvalue['value'])){
return $optionvalue['value'];

}
}

function update_option($optionname,$newdata){

include("dbconfig.php");

$optionvalue = runQuery("select ID from options where name='".$optionname."'");

if(!empty($optionvalue['ID'])){

mysqli_query($conn,"update options set value = '".$newdata."' where ID = ".$optionvalue['ID']."");

}else{

mysqli_query($conn,"insert into options (name,value)values('".$optionname."','".$newdata."')");

}

}


function medget_option($optionname){

include("dbconfig.php");

$optionvalue = runQuery("select option_value from gvsonlineoption where option_name='".$optionname."'");
if(!empty($optionvalue['option_value'])){
return $optionvalue['option_value'];

}
}

function medupdate_option($optionname,$newdata){

include("dbconfig.php");

$optionvalue = runQuery("select ID from gvsonlineoption where option_name='".$optionname."'");

if(!empty($optionvalue['ID'])){

mysqli_query($conn,"update gvsonlineoption set option_value = '".$newdata."' where ID = ".$optionvalue['ID']."");

}else{

mysqli_query($conn,"insert into gvsonlineoption (option_name,option_value)values('".$optionname."','".$newdata."')");

}

}

function user_status(){

	include('dbconfig.php');

	$userid =   current_adminid();

	$user_role = user_adminrole();

		if($user_role){

			$table = $user_role=='superadmin' ? 'superadmin' : 'user';

		$student_name = runQuery("select status from $table where ID = $userid");

		$name = $student_name['status'];

		 

		if($name=='Active'){

	return $name;

		} 

		}

}


function encrypt($string) {
	$action= 'encrypt';
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'This is my secret key';
    $secret_iv = 'This is my secret iv';
    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    if ( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if( $action == 'decrypt' ) {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}
function decrypt($string) {
    $output = false;
	$action= 'decrypt';
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'This is my secret key';
    $secret_iv = 'This is my secret iv';
    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    if ( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if( $action == 'decrypt' ) {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}


function admin_id($id,$role=false){

	include('dbconfig.php');

	$userid =   $id;

	$user_role = $role ?: 'student';

		$adminid = runQuery("select user_id,user_role from user where role='".$user_role."' and ID = ".$userid."");

		$name = $adminid['user_role']=='admin' ? $adminid['user_id'] : '';

	return $name;

}

function lecturer_id($id=false){

	include('dbconfig.php');

	$userid =   $id ?: current_userid();

	$user_role = user_role();

		$adminid = runQuery("select user_id from user where role='student' and ID = $userid");

		$name = $adminid['user_id'];

		 $lecturerid = runloopQuery("select ID from user where role='lecturer' and user_id = $name and user_role = 'admin'");

		$lecturer = array_column($lecturerid, 'ID');

		

	return implode(',',$lecturer);

}

function user_image($id=false){

	include('dbconfig.php');

	$userid =   $id ?: current_userid();

	$user_role = user_role();

		if(!empty($userid)){

			 $lecturer_name = runQuery("select profilepic,role from user where ID = $userid");

		

		if($lecturer_name['profilepic']){

			if($lecturer_name['role']=='student'){

			$name = SITE_URL.$lecturer_name['profilepic'];

				

			}else{

			$name = PAGE_URL.$lecturer_name['profilepic'];

				

			}

		}else{

			$name = SITE_URL.'images/studentimage.jpeg';

		}

	}else{

		$name = SITE_URL.'images/studentimage.jpeg';

	}

	return $name;

}

function user_name($id=false,$role=false){

	include('dbconfig.php');

	$userid =   $id ?: current_userid();

	$user_role = $role ?: user_role();

		if(!empty($userid)){

		if($user_role!='superadmin'){

		$student_name = runQuery("select name from user where ID = $userid");

		$name = $student_name['name'];

	 }else{

		$student_name = runQuery("select name from superadmin where ID = $userid");

		$name = $student_name['name']; 

	 }

	 }

	return $name;

}

function user_email($id=false){

	include('dbconfig.php');

	$userid =   $id ?: current_userid();

	$user_role = $role ?: user_role();

		if(!empty($userid)){

		$student_name = runQuery("select email from user where ID = $userid");

		$name = $student_name['email'];

	return $name;

	 }

}

function user_mobile($id=false){

	include('dbconfig.php');

	$userid =   $id ?: current_userid();

	$user_role = $role ?: user_role();

		if(!empty($userid)){

		$student_name = runQuery("select mobilenumber from user where ID = $userid");

		$name = $student_name['mobilenumber'];

	return $name;

	 }

}

function subjects_details($id,$type){

	include('dbconfig.php'); 

		if(!empty($id)){

		$student_name = runQuery("select * from subjects where ID = $id");
		if(!empty($student_name)){
			
		$name = $student_name[$type];

		return $name;
		}

	 }

}

function tests_details($id,$type){

	include('dbconfig.php'); 

		if(!empty($id)){

		$student_name = runQuery("select * from tests where ID = $id");
		if(!empty($student_name)){
			
		$name = $student_name[$type];

		return $name;
		}

	 }

}


function topics_details($id,$type){

	include('dbconfig.php'); 

		if(!empty($id)){

		$student_name = runQuery("select * from topics where ID = $id");
		if(!empty($student_name)){
			
		$name = $student_name[$type];

		return $name;
		}

	 }

}

function exam_category($id,$type){
	include('dbconfig.php'); 
	  if($id>0){
		$student_name = runQuery("select * from exam_category where ID = $id");
		if(!empty($student_name)){
		  $catname = $student_name[$type];
		}
	  }else{
		  $catname = 'Parent';
	  }
	return $catname;
}
 
function book_category($id,$type){
	include('dbconfig.php'); 
	  if($id>0){
		$student_name = runQuery("select * from book_category where ID = $id");
		  $catname = $student_name[$type];
	  }else{
		  $catname = 'Parent';
	  }
	return $catname;
}
function packages_details($id,$type){ 
	include('dbconfig.php');  
		if(!empty($id)){ 
		$student_name = runQuery("select * from packages where ID = $id"); 
		$name = $student_name[$type]; 
		return $name; 
	 } 
}
function exams_details($id,$type){ 
	include('dbconfig.php');  
		if(!empty($id)){ 
		$student_name = runQuery("select * from exams where ID = $id"); 
		if(!empty($student_name[$type])){
		$name = $student_name[$type]; 
		return $name;
		} 
	 } 
}
function ebooks_details($id,$type){ 
	include('dbconfig.php');  
		if(!empty($id)){ 
		$student_name = runQuery("select * from ebooks where ID = $id"); 
		if(!empty($student_name[$type])){
		$name = $student_name[$type]; 
		return $name;
		} 
	 } 
}
function order_details($id,$type){ 
	include('dbconfig.php');  
		if(!empty($id)){ 
		$student_name = runQuery("select * from orders where ID = $id"); 
		if(!empty($student_name[$type])){
		$name = $student_name[$type]; 
		return $name;
		} 
	 } 
}
function exam_category_details($id,$type){ 
	include('dbconfig.php');  
		if(!empty($id)){ 
		$student_name = runQuery("select * from exam_category where ID = $id"); 
		if(!empty($student_name)){ 
		$name = $student_name[$type]; 
		return $name; 
		}
	 } 
}
function book_category_details($id,$type){ 
	include('dbconfig.php');  
		if(!empty($id)){ 
		$student_name = runQuery("select * from book_category where ID = $id"); 
		if(!empty($student_name)){ 
		$name = $student_name[$type]; 
		return $name; 
		} 
	 } 
}
function books_details($id,$type){ 
	include('dbconfig.php');  
		if(!empty($id)){ 
		$student_name = runQuery("select * from books where ID = $id"); 
		if(!empty($student_name)){ 
		$name = $student_name[$type]; 
		return $name; 
	 } 
	 } 
}
function ordersexam_status($id){ 
	$optionvalue = '';
	 switch($id){
		 case '1':
			$optionvalue = 'Active';
			break;
		 case '2':
			$optionvalue = 'Expired';
			break;
		 case '3':
			$optionvalue = 'Active';
			break;
	 }
	 return $optionvalue;
}

function student_details($id,$type){

	include('dbconfig.php'); 

		if(!empty($id)){

		$student_name = runQuery("select * from student where ID = $id");

		$name = $student_name[$type];
		if($type=='profilepic'){
			if(!empty($name)){
				if(file_exists(SYSPATH.'studentimages/'.$name)){
					return SITE_URL.'studentimages/'.$name;
				}else{
					return SITE_URL.'img/dummy-student.png';
				}
			}else{
				return SITE_URL.'img/dummy-student.png';
			}
		}else{
		return $name;
		}

	 }

}
function student_rank($student_exam){

$rankid = '';
$totalresultsarray = runloopQuery("select s.ID,RANK() OVER ( ORDER BY s.marks desc ) my_rank from  student_exam s,student u where u.ID = s.student_id and s.exam_id = '".$student_exam['exam_id']."' and u.status = '1'  order by my_rank asc");   
$rankkey = array_search($student_exam['ID'], array_column($totalresultsarray, 'ID'));  
$rankid = $totalresultsarray[$rankkey]['my_rank'];
return $rankid;
}
function home_page(){

	include('dbconfig.php');

	$userid = current_userid();

	if(!empty($userid)){

	$user_role = user_role();

		if($user_role=='superadmin'){

			$page = "superadmin-dashboard.php";

		}elseif($user_role=='admin'){

			$page = "admin-dashboard.php";

		}elseif($user_role=='lecturer'){

			$page = "add-eligibility.php";

		}elseif($user_role=='student'){

			$page = "user-exam-instacks.php";

		}

		}else{

			$page = SITE_URL.'index.php';

		}

	return $page;

}

function unique_id(){

	include('dbconfig.php');

	$userid = current_userid();

	$user_role = user_role();

	if($userid){

		$lecturer_name = runQuery("select unique_id from user where ID = $userid");

		$name = $lecturer_name['unique_id'];

	return $name;

	}

}

function txn_id(){

	include('dbconfig.php');

		$lecturer_name = runQuery("select MAX(ID) as id from transactions");

		$id = $lecturer_name['id']+1;

		$name = "INSTXN".$id;

	return $name;

}

if (! function_exists('send_sms')) {

    function send_sms($mobilenumbers,$message){
        if(!empty($mobilenumbers)){
                $message =  urlencode($message);
            $sender = 'CPOTLI';
	$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?sender=".$sender."&route=4&mobiles=".$mobilenumbers."&authkey=225283AIXSJtwyCUib5faaeeb9P1&encrypt=1&country=91&message=".$message."",	
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$response = curl_exec($curl);

$err = curl_error($curl);

curl_close($curl);

if ($err) {
  return  "cURL Error #:" . $err;
}
    }
    }
    }

function wallet($uid=false,$urole=false){

	include('dbconfig.php');

	$userid = $uid ?: current_userid();

	$user_role = $urole ?: user_role();

	$walletamt = runQuery("select amount from wallet where user_id = ".$userid." and user_role='".$user_role."'");

	return (int)$walletamt['amount'] ?: 0;

}

function wallet_update($id=false,$role=false,$amt=""){

	include('dbconfig.php');

	$userid = $id ?: current_userid();

	$user_role = $role ?: user_role();

	$amt = (int)$amt;

	$wallet_amt = runQuery("select * from wallet where user_id = ".$userid." and user_role = '".$user_role."'");

	if(!empty($wallet_amt['ID'])){

		$total_amt = (int)$wallet_amt['amount'] + $amt;

		$result = mysqli_query($conn,"update wallet set amount = ".$total_amt." where ID = ".$wallet_amt['ID']."");

	}else{

		$result =  mysqli_query($conn,"insert into wallet (user_id,user_role,amount,reg_date)values(".$userid.",'".$user_role."',".$amt.",'".date('Y-m-d H:i:s')."')");

	}

	if(!$result){

	echo $conn->error;

	}

}

function wallet_deduct($id=false,$role=false,$amt=""){

	include('dbconfig.php');

	$userid = $id ?: current_userid();

	$user_role = $role ?: user_role();

	$wallet_amt = runQuery("select * from wallet where user_id = ".$userid." and user_role = '".$user_role."'");

	if(!empty($wallet_amt['ID'])){

		if((int)$wallet_amt['amount']>=$amt){

		$amount = $wallet_amt['amount'] - $amt;

		mysqli_query($conn,"update wallet set amount = ".$amount." where ID = ".$wallet_amt['ID']."");

		}else{

		$message = 'Insufficient funds';

		return $message;

		}

	}else{

		$message = 'Wallet amt does not exits';

		return $message;

	}

}

function referralamount($uid=false,$urole=false){

	include('dbconfig.php');

	$userid = $uid ?: current_userid();

	$user_role = $urole ?: user_role();

	$referralamount = runQuery("select amount from referralamount where user_id = ".$userid." and user_role='".$user_role."'");

	return (int)$referralamount['amount'] ?: 0;

}

function referralamount_update($id=false,$role=false,$amt=""){

	include('dbconfig.php');

	$userid = $id ?: current_userid();

	$user_role = $role ?: user_role();

	$amt = (int)$amt;

	$referral_amt = runQuery("select * from referralamount where user_id = ".$userid." and user_role = '".$user_role."'");

	if(!empty($referral_amt['ID'])){

		$total_amt = (int)$referral_amt['amount'] + $amt;
		$result = mysqli_query($conn,"update referralamount set amount = ".$total_amt." where ID = ".$referral_amt['ID']."");

	}else{

		$result =  mysqli_query($conn,"insert into referralamount (user_id,user_role,amount,reg_date)values(".$userid.",'".$user_role."',".$amt.",'".date('Y-m-d H:i:s')."')");

	}

	if(!$result){

	echo $conn->error;

	}

}

function referralamount_deduct($id=false,$role=false,$amt=""){

	include('dbconfig.php');

	$userid = $id ?: current_userid();

	$user_role = $role ?: user_role();

	$referral_amt = runQuery("select * from referralamount where user_id = ".$userid." and user_role = '".$user_role."'");

	if(!empty($referral_amt['ID'])){

		if((int)$referral_amt['amount']>=$amt){

		$amount = $referral_amt['amount'] - $amt;

		mysqli_query($conn,"update referralamount set amount = ".$amount." where ID = ".$referral_amt['ID']."");

		}else{

		$message = 'Insufficient funds';

		return $message;

		}

	}else{

		$message = 'referralamount amt does not exits';

		return $message;

	}

}

function customer_type($id=false){

	include('dbconfig.php');

	$userid = $id ?: current_userid();

	$user_role = user_role();

	if($userid){

		$lecturer_name = runQuery("select customertype from user where ID = $userid");

		$name = $lecturer_name['customertype'];

	return $name;

		

	}

}
function questiontype($id){

	include('dbconfig.php');

	$questionquery = runQuery("select * from question where ID = $id");

	return  $questionquery['ques_type'] ?: '';

}



function subject_name($id){

	include('dbconfig.php');

	if($id){

	$module_name = runQuery("select * from subjects where ID = $id");

	return  $module_name['title'] ?: '';

		

	}

}
function chapter_name($id){

	include('dbconfig.php');

	if($id){

	$module_name = runQuery("select * from chapters where ID = $id");

	return  $module_name['title'] ?: '';

		

	}

}
function state_name($id){

	include('dbconfig.php');

	if($id){

	$module_name = runQuery("select * from state where ID = $id");

	return  $module_name['state'] ?: '';

		

	}

}
function city_name($id){

	include('dbconfig.php');

	if($id){

	$module_name = runQuery("select * from city where ID = $id");

	return  $module_name['city'] ?: '';

		

	}

}
function district_name($id){

	include('dbconfig.php');

	if($id){

	$module_name = runQuery("select * from district where ID = $id");

	return  $module_name['name'] ?: '';

		

	}

}
function competitive_exam($id){

	include('dbconfig.php');

	if($id){ 
	$chapter_name = runQuery("select * from competitive_exam where ID = $id");

	return  $chapter_name['title'] ?: '';

}

}
function exam_name($id){

	include('dbconfig.php');

	if($id){

	$chapter_name = runQuery("select * from exams where ID = $id");

	return  $chapter_name['title'] ?: '';

}

}
function mockexam_name($id){

	include('dbconfig.php');

	if($id){

	$chapter_name = runQuery("select * from mock_exams where ID = $id");

	return  $chapter_name['title'] ?: '';

}

}

function getUserIP()

{

    $client  = @$_SERVER['HTTP_CLIENT_IP'];

    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];

    $remote  = $_SERVER['REMOTE_ADDR'];



    if(filter_var($client, FILTER_VALIDATE_IP))

    {

        $ip = $client;

    }

    elseif(filter_var($forward, FILTER_VALIDATE_IP))

    {

        $ip = $forward;

    }

    else

    {

        $ip = $remote;

    }



    return $ip;

}



$path = $_SERVER['PHP_SELF'];

if(basename($path)!='user-exam-page.php'){

    $timeout = 20 * 60; 

}else{

	  $timeout = (int)$_SESSION['examtime'] * 60; 

}

    if(isset($_SESSION['timeout'])) {

		$cookierole = $cookieid = '';

		if(isset($_COOKIE['gvsonline_id'])){

			$cookieid = (int)trim($_COOKIE['gvsonline_id']);

		}

		if(isset($_COOKIE['gvsonline_role'])){

			$cookierole = (int)trim($_COOKIE['gvsonline_role']);

		}

		$userid = current_userid() ?: $cookieid;

		$user_role = user_role() ?: $cookierole;

        $duration = time() - (int)$_SESSION['timeout'];

        if($duration > $timeout && !empty($userid)) {

			 mysqli_query($conn,"update user set loginstatus = 'false' where ID = ".$userid."");

			 $ip = getUserIP();

	   $admin_sql = runQuery("select * from user where ID = ".$userid."");

	   	if($admin_sql['role']=='admin'){

		$name = user_name($admin_sql['ID']);

		$collegename = $admin_sql['collegename'];

			}elseif($user_role=='lecturer'){

				$name = user_name($admin_sql['ID']);

				$cname = runQuery("select collegename from user where ID = ".$admin_sql['user_id']."");

				$collegename = $cname['collegename'];

			}elseif($admin_sql['role']=='student'){

				$cname = runQuery("select collegename from user where ID = ".$admin_sql['user_id']."");

			$collegename = $cname['collegename'];

			$name = user_name($admin_sql['ID']);;

			}elseif($admin_sql['role']=='superadmin'){

				$name = user_name($admin_sql['ID']);;

				$collegename = 'Instacks_admin';

			

			}

		mysqli_query($conn,"insert into logs (user_id,user_name,institute_name,user_role,ip,action,reg_date)values(".$userid.",'".$name."','".$collegename."','".$user_role."','".$ip."','out','".date('Y-m-d H:i:s')."')"); 

		session_destroy();

			session_unset();

			session_start();

        }

          

    }

     

    $_SESSION['timeout'] = time();

if(basename($path)=='user-exam-instacks.php'){

  $userid = current_userid();

		$user_role = user_role();

		if(!empty($userid)&&!empty($user_role)){

		$userstatusforexam = runQuery("select * from examacess where user_id = ".$userid." and user_role = '".$user_role."'");

		if(!empty($userstatusforexam['ID'])&&$userstatusforexam['type']=='paid'){

			$today = time();

				$enddate = strtotime($userstatusforexam['pa_end']);

				if ($enddate < $today){

					mysqli_query($conn,"update examacess set type='' where ID = ".$userstatusforexam['ID']."");

				}

			}

		}

}

function category_purchase($id,$type,$category){

	include('dbconfig.php');

	$userid = current_userid();

		$user_role = user_role();

	$activepurchase = runQuery("select * from categorypurchase where user_id = ".$userid." and user_role = '".$user_role."' and type = '".$type."' and category = '".$category."' and status = 'Active'");

	$today = time();

		$enddate = strtotime($activepurchase['pa_end']);

		if ($enddate < $today){

			mysqli_query($conn,"update categorypurchase set status='Expire' where ID = ".$activepurchase['ID']."");

		}

	$purchaseid = runQuery("select ID from categorypurchase where user_id = ".$userid." and user_role = '".$user_role."' and  status = 'Active' and type = '".$type."' and category = '".$category."' and FIND_IN_SET(".$id.", valid_ids)");

	return $purchaseid['ID'];

}

function limit_words($string) {

	$string = strip_tags($string);

	$words = explode(' ', strip_tags($string));

	$return = trim(implode(' ', array_slice($words, 0, 10)));

	if(strlen($return) < strlen($string)){

	$return .= '...';

	}

	return $return;

}

function queryanwerscount($qid){

	include('dbconfig.php');

	$anserscount = runQuery("select count(*) as count from queryanswers where ques_id = ".$qid." and status = 'Active'");

	return $anserscount['count'] ?: 0;

	

}

	function convert_number_to_words($number){



    $hyphen      = '-';

    $conjunction = ' and ';

    $separator   = ', ';

    $negative    = 'negative ';

    $decimal     = ' point ';

    $dictionary  = array(

        0                   => 'zero',

        1                   => 'one',

        2                   => 'two',

        3                   => 'three',

        4                   => 'four',

        5                   => 'five',

        6                   => 'six',

        7                   => 'seven',

        8                   => 'eight',

        9                   => 'nine',

        10                  => 'ten',

        11                  => 'eleven',

        12                  => 'twelve',

        13                  => 'thirteen',

        14                  => 'fourteen',

        15                  => 'fifteen',

        16                  => 'sixteen',

        17                  => 'seventeen',

        18                  => 'eighteen',

        19                  => 'nineteen',

        20                  => 'twenty',

        30                  => 'thirty',

        40                  => 'fourty',

        50                  => 'fifty',

        60                  => 'sixty',

        70                  => 'seventy',

        80                  => 'eighty',

        90                  => 'ninety',

        100                 => 'hundred',

        1000                => 'thousand',

        1000000             => 'million',

        1000000000          => 'billion',

        1000000000000       => 'trillion',

        1000000000000000    => 'quadrillion',

        1000000000000000000 => 'quintillion'

    );



    if (!is_numeric($number)) {

        return false;

    }



    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {

        // overflow

        trigger_error(

            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,

            E_USER_WARNING

        );

        return false;

    }



    if ($number < 0) {

        return $negative . convert_number_to_words(abs($number));

    }
	
    $string = $fraction = null;



    if (strpos($number, '.') !== false) {

        list($number, $fraction) = explode('.', $number);

    }



    switch (true) {

        case $number < 21:

            $string = $dictionary[$number];

            break;

        case $number < 100:

            $tens   = ((int) ($number / 10)) * 10;

            $units  = $number % 10;

            $string = $dictionary[$tens];

            if ($units) {

                $string .= $hyphen . $dictionary[$units];

            }

            break;

        case $number < 1000:

            $hundreds  = $number / 100;

            $remainder = $number % 100;

            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];

            if ($remainder) {

                $string .= $conjunction . convert_number_to_words($remainder);

            }

            break;

        default:

            $baseUnit = pow(1000, floor(log($number, 1000)));

            $numBaseUnits = (int) ($number / $baseUnit);

            $remainder = $number % $baseUnit;

            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];

            if ($remainder) {

                $string .= $remainder < 100 ? $conjunction : $separator;

                $string .= convert_number_to_words($remainder);

            }

            break;

    }



    if (null !== $fraction && is_numeric($fraction)) {

        $string .= $decimal;

        $words = array();

        foreach (str_split((string) $fraction) as $number) {

            $words[] = $dictionary[$number];

        }

        $string .= implode(' ', $words);

    }



    return $string;

}

function generateRandomString($length = 9) {

										$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

										$charactersLength = strlen($characters);

										$randomString = '';

										for ($i = 0; $i < $length; $i++) {

											$randomString .= $characters[rand(0, $charactersLength - 1)];

										}

										return $randomString;

									}

function time_elapsed_string($datetime, $full = false) {

    $now = new DateTime;

    $ago = new DateTime($datetime);

    $diff = $now->diff($ago);



    $diff->w = floor($diff->d / 7);

    $diff->d -= $diff->w * 7;



    $string = array(

        'y' => 'year',

        'm' => 'month',

        'w' => 'week',

        'd' => 'day',

        'h' => 'hour',

        'i' => 'minute',

        's' => 'second',

    );

    foreach ($string as $k => &$v) {

        if ($diff->$k) {

            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');

        } else {

            unset($string[$k]);

        }

    }



    if (!$full) $string = array_slice($string, 0, 1);

    return $string ? implode(', ', $string) . ' ago' : 'just now';

}

function language_questions($question,$language){
	$optionsarray = array();
	$optionsarray['ID'] = $question['ID']; 
	$optionsarray['subject_id'] = $question['subject_id']; 
	if($language=='1'){
		$optionsarray['question'] = $question['english_question']; 
		$optionsarray['questionimage'] = $question['question_image']; 
		$optionsarray['description'] = $question['english_desc'];
		$optionsarray['ans'] = $question['ans'];
		$optionsarray['opta'] = $question['singleopta'];
		$optionsarray['optb'] = $question['singleoptb'];
		$optionsarray['optc'] = $question['singleoptc'];
		$optionsarray['optd'] = $question['singleoptd'];
		$optionsarray['opte'] = $question['singleopte'];
		$optionsarray['optimga'] = $question['singleoptimga'];
		$optionsarray['optimgb'] = $question['singleoptimgb'];
		$optionsarray['optimgc'] = $question['singleoptimgc'];
		$optionsarray['optimgd'] = $question['singleoptimgd'];
		$optionsarray['optimge'] = $question['singleoptimge'];
		$optionsarray['matchinglista'] = $question['matchinglist1a'];
		$optionsarray['matchinglistb'] = $question['matchinglist1b'];
		$optionsarray['matchinglistc'] = $question['matchinglist1c'];
		$optionsarray['matchinglistd'] = $question['matchinglist1d'];
		$optionsarray['matchingliste'] = $question['matchinglist1e'];
		$optionsarray['matchinglist1'] = $question['matchinglist11'];
		$optionsarray['matchinglist2'] = $question['matchinglist12'];
		$optionsarray['matchinglist3'] = $question['matchinglist13'];
		$optionsarray['matchinglist4'] = $question['matchinglist14'];
		$optionsarray['matchinglist5'] = $question['matchinglist15'];
		$optionsarray['matchingopta'] = $question['matchingopta'];
		$optionsarray['matchingoptb'] = $question['matchingoptb'];
		$optionsarray['matchingoptc'] = $question['matchingoptc'];
		$optionsarray['matchingoptd'] = $question['matchingoptd'];
		$optionsarray['matchingopte'] = $question['matchingopte'];
	}else{
		$optionsarray['question'] = $question['secondln_question'];
		$optionsarray['questionimage'] = $question['question_image']; 
		$optionsarray['description'] = $question['secondln_desc'];
		$optionsarray['ans'] = $question['ans'];
		$optionsarray['opta'] = $question['singleoptsecondlna'];
		$optionsarray['optb'] = $question['singleoptsecondlnb'];
		$optionsarray['optc'] = $question['singleoptsecondlnc'];
		$optionsarray['optd'] = $question['singleoptsecondlnd'];
		$optionsarray['opte'] = $question['singleoptsecondlne'];
		$optionsarray['optimga'] = $question['singleoptsecondlnimga'];
		$optionsarray['optimgb'] = $question['singleoptsecondlnimgb'];
		$optionsarray['optimgc'] = $question['singleoptsecondlnimgc'];
		$optionsarray['optimgd'] = $question['singleoptsecondlnimgd'];
		$optionsarray['optimge'] = $question['singleoptsecondlnimge'];
		$optionsarray['matchinglista'] = $question['matchinglist2a'];
		$optionsarray['matchinglistb'] = $question['matchinglist2b'];
		$optionsarray['matchinglistc'] = $question['matchinglist2c'];
		$optionsarray['matchinglistd'] = $question['matchinglist2d'];
		$optionsarray['matchingliste'] = $question['matchinglist2e'];
		$optionsarray['matchinglist1'] = $question['matchinglist21'];
		$optionsarray['matchinglist2'] = $question['matchinglist22'];
		$optionsarray['matchinglist3'] = $question['matchinglist23'];
		$optionsarray['matchinglist4'] = $question['matchinglist24'];
		$optionsarray['matchinglist5'] = $question['matchinglist25'];
		$optionsarray['matchingopta'] = $question['matchingopta'];
		$optionsarray['matchingoptb'] = $question['matchingoptb'];
		$optionsarray['matchingoptc'] = $question['matchingoptc'];
		$optionsarray['matchingoptd'] = $question['matchingoptd'];
		$optionsarray['matchingopte'] = $question['matchingopte'];
	}
		return $optionsarray;
	}  
	function gvsexam_nav($page,$table){
			include('dbconfig.php'); 
				$per_page=10;
							 
				$total = (int)runQuery("SELECT COUNT(*) as count FROM $table")['count'];
				 
				$adjacents = "2"; 
				 
				$prevlabel = "&lsaquo;";
				$nextlabel = "&rsaquo;";
				$lastlabel = "Last &rsaquo;&rsaquo;";
				$firstlabel = "&lsaquo;&lsaquo; First ";
				 
				$page = ($page == 0 ? 1 : $page);  
				$start = ($page - 1) * $per_page;                               
				 
				$prev = $page - 1;                          
				$next = $page + 1;
				 
				$lastpage = ceil($total/$per_page);
				
				$lpm1 = $lastpage - 1; // //last page minus 1
				 
				$pagination = "";
				if($lastpage > 1){    
					$pagination .= "<ul class='pagination  float-right'>";
						 
						if ($page > 1){
							$pagination.= "<li><a onclick='pagination(1);'><span aria-hidden='true'>{$firstlabel}</span></a></li>";
							$pagination.= "<li><a onclick='pagination(".$prev.");'><span aria-hidden='true'>{$prevlabel}</span></a></li>";
						}
					if ($lastpage < 7 + ($adjacents * 2)){   
						for ($counter = 1; $counter <= $lastpage; $counter++){
							if ($counter == $page)
								$pagination.= "<li class='active'><a ><span>{$counter}</span></a></li>";
							else
								$pagination.= "<li><a onclick='pagination(".$counter.");'><span>{$counter}</span></a></li>";                    
						}
					 
					} elseif($lastpage > 5 + ($adjacents * 2)){
						 
						if($page < 1 + ($adjacents * 2)) {
							 
							for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++){
								if ($counter == $page)
									$pagination.= "<li class='active'><a ><span>{$counter}</span></a></li>";
								else
									$pagination.= "<li><a  onclick='pagination(".$counter.");'><span>{$counter}</span></a></li>";                    
							}
							$pagination.= "<li class='dot'>...</li>";
							$pagination.= "<li><a  onclick='pagination(".$lpm1.");'><span>{$lpm1}</span></a></li>";
							$pagination.= "<li><a onclick='pagination(".$lastpage.");' ><span>{$lastpage}</span></a></li>";  
								 
						} elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
							 
							$pagination.= "<li><a onclick='pagination(1);' ><span>1</span></a></li>";
							$pagination.= "<li><a onclick='pagination(2);' ><span>2</span></a></li>";
							$pagination.= "<li class='dot'>...</li>";
							for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
								if ($counter == $page)
									$pagination.= "<li class='active'><a><span>{$counter}</span></a></li>";
								else
									$pagination.= "<li><a onclick='pagination(".$counter.");'  ><span>{$counter}</span></a></li>";                    
							}
							$pagination.= "<li class='dot'>..</li>";
							$pagination.= "<li><a onclick='pagination(".$lpm1.");' ><span>{$lpm1}</span></a></li>";
							$pagination.= "<li><a onclick='pagination(".$lastpage.");' ><span>{$lastpage}</span></a></li>";      
							 
						} else {
							 
							$pagination.= "<li><a onclick='pagination(1);' ><span>1</span></a></li>";
							$pagination.= "<li><a onclick='pagination(2);' ><span>2</span></a></li>";
							$pagination.= "<li class='dot'>..</li>";
							for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
								if ($counter == $page)
									$pagination.= "<li class='active' ><a ><span>{$counter}</span></a></li>";
								else
									$pagination.= "<li><a onclick='pagination(".$counter.");'><span>{$counter}</span></a></li>";                    
							}
						}
					}
					 
						if ($page < $counter - 1) {
							$pagination.= "<li><a onclick='pagination(".$next.");'><span aria-hidden='true' >{$nextlabel}</span></a></li>";
							$pagination.= "<li><a onclick='pagination(".$lastpage.");'><span aria-hidden='true' >{$lastlabel}</span></a></li>";
						}
					 
					$pagination.= "</ul>";        
				}
				 return $pagination;
			}
?>
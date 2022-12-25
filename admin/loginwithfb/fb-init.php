<?php 

// session start
// session_start();

require 'vendor/autoload.php';

$fb = new Facebook\Facebook([
	'app_id' => '633547644090449',
	'app_secret' => '8c412d440fe57552a548f08ba433ce5e',
	'default_graph_version' => 'v6.0'
]);

$helper = $fb->getRedirectLoginHelper();
$login_url = $helper->getLoginUrl("http://localhost/Bloodcells/admin/");

try{
	$accessToken = $helper->getAccessToken();
	if (isset($accessToken)) {
		$_SESSION['access_token'] = (string)$accessToken;  //convert to string
		//if session is set redirect to the user to page

	} 


} catch (Exception $exc) {
	echo $exc->getTraceAsString();
}

/// get name email lname

if(isset($_SESSION['access_token'])){


	// $url = "https://graph.facebook.com/v6.0/me?fields=id%2Cfirst_name%2Clast_name%2Cemail%2Cbirthday%2Cgender%2Cpicture&access_token=EAAJANU5GOFEBAIDcXyAn2TGMrrAeFXYUVeqrWpWYZC56MCkoUbvzj6WT8DR2ZBs6P0BRhCxGoewT3N62q7ecKhf5YouMlz0bvf8YBN3w7qBEmcWdJD5ZAm9OYZAKu85CzVGnhZAnyPKocTzqyrFlEi8NRdABYdOullcaPBt4XGlNekzldYM6aZBieE7jwIO7UZD";

	// $headers = array("Content-Type: application/json");


	// $ch = curl_init();
	// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	// curl_setopt($ch, CURLOPT_URL, $url);
	// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	// curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
	// curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	// curl_setopt($ch, CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.2 (KHTML, like Gecko) Chrome/22.0.1216.0 Safari/537.2");
	// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);


	// $st=curl_exec($ch);
	// $result=json_decode($st,TRUE);
	// echo "my id: ".$result['id']."<br>";
	// echo "my name: ".$result['first_name']."<br>";
	// echo "my surname: ".$result['last_name']."<br>";
	// echo "my email: ".$result['email']."<br>";
	// echo "my birthday: ".$result['birthday']."<br>";
	// echo "my gender: ".$result['gender']."<br>";

	
	// var_dump($result);



	try{

	$fb->setDefaultAccessToken($_SESSION['access_token']);
	$resourses = $fb->get('/me?fields=id,first_name,last_name,email,birthday,gender,picture');

	$user = $resourses->getGraphUser();
	$id = $user->getField('id');
	

	$fname = $user->getField('first_name');
	$lname = $user->getField('last_name');
	$email = $user->getField('email');
	$birthday = $user->getBirthday('birthday');
	$gender = $user->getField('gender');
	//echo $user->getField('picture')."<br>";

	$arrayy=json_decode($user->getField('picture'),TRUE);


	//$_SESSION['picurl'] = $arrayy['url'];


	} catch(Exception $exc) {
		echo $exc->getTraceAsString();
		}
}
//  elseif (  ) {
	
// }

	$mysqli = new mysqli('localhost','root','','bloodcells') or die(mysqli_error($mysqli));
	$getdata = $mysqli->query("SELECT * FROM admin") or die($mysqli->error());
	
	$row = $getdata->fetch_array();
	$sqlid = $row['id'];
	$sqlfname = $row['first_name'];
	$sqllname = $row['last_name'];
	$sqlmail = $row['emailid'];
	$sqlgender = $row['gender'];



// if(isset($_SESSION['access_token'])){
// 	if ($id==$sqlid&&$fname==$sqlfname&&$lname==$sqllname&&$email==$sqlmail&&$gender==$sqlgender) {
// 		header('location:index.php');
// 	} 
// 		else
// 	{
// 		echo "You cant login here because you are not admin of Bloodcells.";
// 	}
// }

?>
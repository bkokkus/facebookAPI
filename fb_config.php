<?php 

# 1. Installation
	# a. Session start
	session_start();

	if(isset($_SESSION["user"])){
		header("location:homepage.php");
		exit;		
	}

	# b. include Autoload.php file
	include "vendor/autoload.php";
	# c. Create FB Object via paramters
	$fb = new Facebook\Facebook([
		  'app_id' => 'app-id', // Replace {app-id} with your app id
		  'app_secret' => 'secret',
		  'default_graph_version' => 'v2.2',
		  ]);

	$redirect = "http://localhost/github/facebookAPI/index.php";

	

	//if ve isset içerisine aldık. 
	//Eğer set edilmemişse sayfa da hataya ve/veya hata çıktısına sebep olmasın. 
	if(isset($_SESSION['FBRLH_state']) && isset($_GET['state'])){
		//Bu session atamasını yapmazsak gönderilen accessToken codu almaya çalıştığımızda
			//hata alıyotuz.
		$_SESSION['FBRLH_state'] = $_GET['state'];	
	}

	$helper = $fb->getRedirectLoginHelper();

	try {
	  $accessToken = $helper->getAccessToken();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  // When Graph returns an error
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  // When validation fails or other local issues
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}

//echo $accessToken;

# 2. Beginner Syntax

		/* 
			*AccessToken set edimemişse
		*/
		if(!isset($accessToken)){

			//burada belirlediğim permission (izin) önemli
			$permission = ["email"];
			//geri dönüş adresinizi belirtiyoruz.
			//aynı zamanda mail adresi bilgisi için izin istemiş oluyoruz. 
			//yoksa mail adresini elde edemeyiz.
			$loginUrl = $helper->getLoginUrl($redirect,$permission);

			echo "<a href='$loginUrl'>Login with facebook</a> ";

			//Accesstoken set edilmişse
		} else {
			# a. if dont have acces code. create a link 		

			$fb->setDefaultAccessToken($accessToken);
			$response = $fb->get("/me?fields=email,name");
			$userNode = $response->getGraphUser();

			$img_url = "https://graph.facebook.com/" . $userNode->getId() ."/picture?width=200";

			$user = array (
				"name" 				=> $userNode->getName(),
				"email"				=> $userNode->getEmail(),
				"id"				=> $userNode->getId(),
				"profile_picture"	=> $img_url,
			);

			$_SESSION['user'] = $user;

			header("location:homepage.php");
		}

	
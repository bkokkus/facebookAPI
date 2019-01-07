<?php 

# 1. Installation
	# a. Session start
	session_start();

	# b. include Autoload.php file
	include "vendor/autoload.php";
	# c. Create FB Object via paramters
	$fb = new Facebook\Facebook([
		  'app_id' => '2260546047502821', // Replace {app-id} with your app id
		  'app_secret' => 'e0d432fcf347eaacf8f32a36858a4d0c',
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

			$permission = ["email"];
			//geri dönüş adresinizi belirtiyoruz.
			$loginUrl = $helper->getLoginUrl($redirect);

			echo "<a href='$loginUrl'>Login with facebook</a> ";

			//Accesstoken set edilmişse
		} else {
			# a. if dont have acces code. create a link 		

			$fb->setDefaultAccessToken($accessToken);
			$response = $fb->get("/me?fields=email,name");
			$userNode = $response->getGraphUser();

			echo $userNode->getName() . "<br>";
			echo $userNode->getId() . "<br>";
			echo $userNode->getEmail() . "<br>";

			$img_url = "https://graph.facebook.com/" . $userNode->getId() ."/picture?width=400";
			echo "<img src='$img_url'/>";
		}

	
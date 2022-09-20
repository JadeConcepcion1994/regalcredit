<?php 

require '../class/database.php';

$db = new Database;

if(isset($_POST['action'])){

	  switch ($_POST['action']){

	  	case 'addApiKeys':
	  		$api_key = $_POST['api_key'];
	  		$api_name = $_POST['api_name'];
	  		$date_added = date('Y-m-d H:i:s');

	  		$db->api_key = $api_key;
	  		$db->api_name = $api_name;
	  		$db->date_added = $date_added;
	  		$result = $db->addApiKey();

	  		if($result){
	  			echo "success";
	  		}else{	
	  			echo "failed";
	  		}

	  	break;

	  	case 'getAllApiKeys':
	  		$db->getAllApiKeys();
	  	break;

	  	case 'getAllLocationKeys':
	  		$db->getAllLocationKeys();
	  	break;

	  	case 'getApiAndLocation':
	  		$db->getLocationAndApi();
	  	break;


	  	case 'updateSelectedApiKey':
	  		$value = $_POST['value'];
	  		$result = $db->updateThisApiKey($value);
	  		

	  		if($result){
	  			echo "success";
	  		}else{	
	  			echo "failed";
	  		}
	  	break;

	  	case 'updateSelectedLocationKey':
	  		$value = $_POST['value'];
	  		$result = $db->updateThisLocationKey($value);
	  		

	  		if($result){
	  			echo "success";
	  		}else{	
	  			echo "failed";
	  		}
	  	break;

	  	case 'addLocationKeys':
	  		$location_key = $_POST['location_key'];
	  		$location_name = $_POST['location_name'];
	  		$date_added = date('Y-m-d H:i:s');

	  		$db->location_key = $location_key;
	  		$db->location_name = $location_name;
	  		$db->date_added = $date_added;
	  		$result = $db->addLocationKey();

	  		if($result){
	  			echo "success";
	  		}else{	
	  			echo "failed";
	  		}

	  	break;

	  }
}


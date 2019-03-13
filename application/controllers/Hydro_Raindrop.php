<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hydro_Raindrop extends CI_Controller {


	public function __construct() 
	{
		parent::__construct();
		$this->load->library('curl');
		

	}
	public function index()
	{
		
		$response =  $this->get_web_page('https://api.hydrogenplatform.com/hydro/v1/authenticate?hydro_address_id=cbcd0758-1314-11e8-b642-0ed5f89f718b');
		$resArr = array();
		$resArr = json_decode($response);
		if ($resArr->error == true) {
			echo "<pre>"; print_r($resArr->error_description); echo "</pre>";
		}
		
				
	}
	public function CreateToken()
	{
		require_once APPPATH."/../vendor/autoload.php";

		$clientId = 'suurpxpucsm6mg2f3vmv243n6g';
		$clientSecret = 'ocv1281prxvikoqbjocmmrbnge';
		$applicationId = '0161df87-3b3a-4005-a2c7-7c34a6764552';

		$settings = new \Adrenth\Raindrop\ApiSettings(
		    $clientId,
		    $clientSecret,
		    new \Adrenth\Raindrop\Environment\SandboxEnvironment
		);

		// Create token storage for storing the API's access token.
		$tokenStorage = new \Adrenth\Raindrop\TokenStorage\FileTokenStorage(__DIR__.'/token.txt');

		$client = new \Adrenth\Raindrop\Client($settings, $tokenStorage, $applicationId);

		$message = $client->generateMessage();
		echo $message;

	}
	function get_web_page($url)
	{
	    $options = array(
	        CURLOPT_RETURNTRANSFER => true,   // return web page
	        CURLOPT_HEADER         => false,  // don't return headers
	        CURLOPT_FOLLOWLOCATION => true,   // follow redirects
	        CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
	        CURLOPT_ENCODING       => "",     // handle compressed
	        CURLOPT_USERAGENT      => "test", // name of client
	        CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
	        CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
	        CURLOPT_TIMEOUT        => 120,    // time-out on response
	    ); 

	    $ch = curl_init($url);
	    curl_setopt_array($ch, $options);

	    $content  = curl_exec($ch);

	    curl_close($ch);

	    return $content;
	}
	public function curlv2()
	{
		$ch = curl_init();
		  $skipper = "luxury assault recreational vehicle";
		  $fields = array( 'penguins'=>$skipper, 'bestpony'=>'rainbowdash');
		  $url = 'https://api.hydrogenplatform.com/hydro/v1/application/client';
		  curl_setopt($ch,CURLOPT_URL,$url);
		  curl_setopt($ch,CURLOPT_POST, 1);                //0 for a get request
		  curl_setopt($ch,CURLOPT_POSTFIELDS,array( 'hydro_id'=>$skipper, 'application_id'=>'rainbowdash'));
		  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
		  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
		  curl_setopt($ch,CURLOPT_TIMEOUT, 20);
		  $response = curl_exec($ch);
		  if ($response)
		  {
		  	echo $response;
		  	echo "405";
		  }
		  else
		  {
		  	echo "566";
		  }
		  curl_close ($ch);
	}
}

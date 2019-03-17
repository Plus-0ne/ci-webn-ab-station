<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HydroMessage_Controller extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Model_Login');
		$this->load->helper('security');

	}

	public function LoadHydroMessage()
	{
		if ($this->session->flashdata('Step2') == 'Step 2') {
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


			$data['hydromessage'] = $client->generateMessage();
			$data['hyrdroid'] = $this->session->userdata('Hydro_ID');
			$data['UserNo'] = $this->session->userdata('UserNo');
			$this->load->view('pages/users/hydro_authmessage',$data);
		}
		else
		{
			$this->session->sess_destroy();
			redirect('Login');
		}
	}
	public function RegisterHydroVerify()
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

		$UserNo = $this->session->userdata('UserNo');

		$getHydroID = $this->Model_Select->getHydroID($UserNo);

		$data = array(
			'hydromessage' => $client->generateMessage(),
			 );
		
		$this->load->view('pages/users/hydro_authmessage_hydrosub',$data);
	}
}

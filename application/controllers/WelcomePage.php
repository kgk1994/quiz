<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WelcomePage extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() 
	{
		parent::__construct(); 
		$this->load->model('WelcomeModel');
		$this->load->model('QuizModel');
	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('welcomePage');
		$this->load->view('footer');
	}
	public function openQuiz()
	{
		if($this->input->post() !=''){
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('phone_number', 'Phone Number', 'required|regex_match[/^[0-9]{10}$/]');
			

			if ($this->form_validation->run() == FALSE){
				$errors = validation_errors();
				echo json_encode(['error'=>$errors]);
			}else{
				$postValues = $this->input->post();
				$sessionID = $this->WelcomeModel->createUserEntry($postValues);
				// echo $sessionID;die;
				if($sessionID != '' && isset($sessionID)){
					$postValues['userID'] = $sessionID;
					$postValues['expireTime'] = time() + 60;
					$this->session->set_userdata("userData",$postValues);
					if($this->session->get_userdata("userData") !=''){
						// print_r($this->session->get_userdata("userData"));
						$userDatas = $this->session->get_userdata("userData");
						$userData = $userDatas['userData'];
						
						if($userData !=''){
							// echo "a";die;
							echo json_encode(array("success"=>true,"redirect_url"=>base_url()."index.php/QuizPageCtrl/index"));
						}
						// echo json_encode(['success'=>'Record added successfully.']);
						
						
					}
				}else{
					echo json_encode(array("error"=>"Phone Number or Email is already exists"));
				}
				
			
			}
		}
		
	}
}

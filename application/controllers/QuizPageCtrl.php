<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuizPageCtrl extends CI_Controller {
    public function __construct() 
	{
		parent::__construct(); 
		$this->load->model('QuizModel');
	}
	public function index()
	{
        $userDatas = $this->session->get_userdata('userData');
        $userData = [];
        if($userDatas !=''){
            
            if(isset($userDatas['userData'])){
                $userData = $userDatas['userData'];
                if($userData !=''){
                    $expireTime = $userData['expireTime'];
                    if($expireTime > time()){
                        $question['question'] = $this->QuizModel->getFirstQuestion();
                        $this->load->view('header');
                        $this->load->view('quizPage',$question);
                        $this->load->view('footer');
                        
                    }else{
                        $this->session->unset_userdata('userData');
                        $this->session->set_flashdata('message','Quiz Ended');
                        redirect("/WelcomePage/index","refresh");
                    }
                    
                }else{
                    // echo "a";die;
                    $this->session->unset_userdata('userData');
                    redirect("/WelcomePage/index");
                }
                
            }
            else{
                $this->session->set_userdata('userData','');
                redirect("/WelcomePage/index");
            }
            
        }else{
            $this->session->unset_userdata('userData');
            redirect("/WelcomePage/index");
        }
        
    }
    public function postAnswer()
	{
        $userDatas = $this->session->get_userdata('userData');
        $userData = [];
        if($userDatas !=''){
            
            if(isset($userDatas['userData'])){
                $userData = $userDatas['userData'];
                if($userData !=''){
                    $expireTime = $userData['expireTime'];
                    if($expireTime > time()){
                        if($this->input->post() !=''){
                            $question_id = $this->input->post('question_id');
                            $answer = $this->input->post('answer');
                            $payload = $this->input->post();
                            $payload['userID'] = $userData['userID'];
                            if($question_id !='' && $answer !=''){
                                $resp =  $this->QuizModel->postAnswer($payload);
                                if($resp){
                                    // print_r($resp);die;
                                    // if($resp =='existing'){
                                    //     echo json_encode(array("error"=>"Already Answered"));
                                    // }else{
                                        
                                        $prevQuestion = $question_id;
                                        echo json_encode(array("success"=>true,"redirect_url"=>base_url()."index.php/QuizPageCtrl/question/".$prevQuestion));
                                    // }   
                                }
                            }
                        }
                        
                        
                    }else{
                        $this->session->unset_userdata('userData');
                        $this->session->set_flashdata('message','Quiz Ended');
                        redirect("/WelcomePage/index","refresh");
                    }
                    
                }else{
                    $this->session->unset_userdata('userData');
                    redirect("/WelcomePage/index");
                }
                
            }
            else{
            $this->session->set_userdata('userData','');
            redirect("/WelcomePage/index");
        }
            
        }else{
            $this->session->unset_userdata('userData');
            redirect("/WelcomePage/index");
        }
    }
    public function question(){
        $userDatas = $this->session->get_userdata('userData');
        $userData = [];
        if($userDatas !=''){
            
            if(isset($userDatas['userData'])){
                $userData = $userDatas['userData'];
                if($userData !=''){
                    $expireTime = $userData['expireTime'];
                    if($expireTime > time()){
                        $question_id = $this->uri->segment(3);
                        if($question_id !=''){
                            $question['question'] = $this->QuizModel->getNextQuestion($question_id);
                            if($question['question'] !=''){
                                $this->load->view('header');
                                $this->load->view('quizPage',$question);
                                $this->load->view('footer');
                            }else{
                                $this->session->unset_userdata('userData');
                                $this->session->set_flashdata('message','Quiz Ended');
                                redirect("/WelcomePage/index","refresh");
                            }
                            
                        }
                        
                        
                    }else{
                        $this->session->unset_userdata('userData');
                        $this->session->set_flashdata('message','Quiz Ended');
                        redirect("/WelcomePage/index","refresh");
                    }
                    
                }else{
                    $this->session->unset_userdata('userData');
                    redirect("/WelcomePage/index");
                }
                
            }
            else{
            $this->session->set_userdata('userData','');
            redirect("/WelcomePage/index");
        }
            
        }else{
            $this->session->unset_userdata('userData');
            redirect("/WelcomePage/index");
        }
        
    }
    public function pdf(){
        $this->load->helper('pdf_helper');
        $marks['userMarks'] = $this->QuizModel->getMarks();
        $this->load->view('pdfreport', $marks);
    }
}

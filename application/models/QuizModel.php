<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuizModel extends CI_Model {

    public function getFirstQuestion(){
        
        $query=$this->db->query("SELECT id,question_name,answer1,answer2,answer3,answer4 FROM questions ORDER BY id ASC LIMIT 1");
        if ($query->num_rows() > 0)
		{
            return $query->row();
		}
    }
    public function postAnswer($payload){
        $userID = $payload['userID'];
        $question_id = $payload['question_id'];
        $answer = $payload['answer'];
        $query=$this->db->query("SELECT id,question_name,answer,answer1,answer2,answer3,answer4 FROM questions WHERE answer = '$answer' AND id='$question_id'");
        if ($query->num_rows() > 0)
		{
            $checkDuplicate = $this->db->query("SELECT * FROM user_question_answers WHERE user_id = '$userID' AND question_id = '$question_id'");
            if($checkDuplicate->num_rows() ==0){
                $update = $this->db->query("UPDATE tbl_users SET marks=marks+1 WHERE user_id='$userID'");
                if($update){
                    $insertQuery = $this->db->query("INSERT INTO user_question_answers(user_id,question_id,answer) VALUES('$userID','$question_id','$answer')");
                    return $insertQuery;
                }
                return $update;
            }else{
                return 1;
            }

            
		}else{
            return 1;
        }
    }
    public function getNextQuestion($prevQuestion){
        $query=$this->db->query("SELECT id,question_name,answer1,answer2,answer3,answer4 FROM questions WHERE id = (SELECT min(id) from questions where id > $prevQuestion LIMIT 1) ORDER BY id ASC LIMIT 1");
        if ($query->num_rows() > 0)
		{
            return $query->row();
		}else{
            return 0;
        }
    }

    public function getMarks(){
        $query=$this->db->query("SELECT * FROM tbl_users");
        if ($query->num_rows() > 0)
		{
            return $query->result();
		}else{
            return 0;
        }
    }
    
}
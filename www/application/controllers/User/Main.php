<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author zymud
 * @copyright 2012
 */

class Main extends CI_Controller {
    
    
    function __construct(){
        parent::__construct();
        $this->load->library('QuestionAdmin/lib_Question','','lib_Question');
        $this->load->library('session');
        //$this->load->library('QuestionAdmin/lib_Answer', '', 'lib_Answer');
    }
    
    function index() {
        if (!empty($_GET['qstn'])) {
            $id = $_GET['qstn'];
        } else {
            $id = 1;
        }
        
        $ansid = array();
        if (!empty($_GET['ansid'])) {
            $ansid = $this->session->userdata('mydata');
            $ansid[] = $_GET['ansid'];
            $this->session->set_userdata('mydata',$ansid);
        } else {          
            $this->session->set_userdata('mydata',$ansid);
        }
        
        $this->logicOperations($ansid);
        
        $data = array();
        $q = $this->getQuestionData($id);
        $answers = $this->getAnswersData($id);
        
        $data['question'] = $q;
        $data['answers'] = $answers;
        
        $this->load->view('User/Main', $data);
    }
    
    function getQuestionData ($id) {
        $this->load->model('QuestionAdmin/mdl_General','gnrl');
        $this->load->model('QuestionAdmin/mdl_Question','qstn');
        $row = $this->qstn->get($id);
        return $row['Question_Text'];
    }
    
    function getAnswersData ($id) {
        return $this->lib_Question->getAnswers ($id);
    }
    
    function logicOperations($ansId) {
        //Add your code here
    }
    
}

?>
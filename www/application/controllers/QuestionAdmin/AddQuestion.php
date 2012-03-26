<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author zymud
 * @copyright 2012
 */

class AddQuestion extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->library('QuestionAdmin/lib_Question','','lib_Question');
        $this->load->library('QuestionAdmin/lib_Answer', '', 'lib_Answer');
    }
    
    public function index(){
        $this->load->library('QuestionAdmin/lib_Question','','lib_Question');
        $this->load->library('QuestionAdmin/lib_Answer', '', 'lib_Answer');
        //$this->load->model('QuestionAdmin/mdl_General','mdl_q');
        $crit_arr = $this->lib_Question->getCriteria();
        $cond_arr = $this->lib_Question->getCondition();
        $data = array ('cond' => $cond_arr, 'crit' => $crit_arr);
        $this->load->view('QuestionAdmin/AddQuestion', $data);
    }
    
    public function add(){
        $qstnTxt = $_POST['qstnTxt'];
        $answers = array();
        
        foreach ($_POST as $key => $value){
            $q1 = strpos($key,'ans');
            if ($q1 == 2){
                $str1 = str_replace('idans','',$key);
                $id = str_replace('Txt','',$str1);
                $ans = array();
                $ans['Txt'] = $value;
                $ans['Cond'] = $this->findCName($id.'Cond');
                $ans['TxtCond'] = $this->findCName($id.'TxtCond');
                $ans['Crit'] = $this->findCName($id.'Crit');
                $ans['TxtCrit'] = $this->findCName($id.'TxtCrit');
                $ans['Answer_Type'] = 'common';
                $answers[] = $ans;
            }        
        }

        $this->lib_Answer->addQuestionAndAnswers($qstnTxt, $answers);
        $data = array("qstnAdd" => 'Question succesfully added');
        $this->load->view('Develop',$data);
    }
    
    
    private function findCName ($name) {
        $rez = array();
        foreach ($_POST as $key => $value){
            $find = $name;
            $q = strpos($key,$name);
            //echo 'id='.$name.'q='.$q.'<br>';
            if ($q > 0){
                $rez[] = $value;
            } 
        }
        return $rez;
    }
    
}

?>
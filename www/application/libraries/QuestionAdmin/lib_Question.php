<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author zymud
 * @copyright 2012
 */

class lib_Question  {
    
    function __construct() {
        $this->loadModels();
    }
    
    private function loadModels () {
        $CI = &get_instance();
        $CI->load->database();
    }
    
    public function getCriteria  () {
        $CI = &get_instance();
        $CI->db->select('wComp_Parametr_id_Parametr,Criteria_Name');
        $query = $CI->db->get('Criteria');
        //print_r($query->result_array());
        return $query->result_array();
    }
    
    public function getCondition () {
        $CI = &get_instance();
        $CI->db->select('wComp_AnswerChange_idSomeChange, Condition_Name');
        $query = $CI->db->get('Condition');
        return $query->result_array();
    }
    
    public function getQuestionsAndAnswers () {
        $CI = &get_instance();
        $CI->load->model('QuestionAdmin/mdl_General','gnrl');
        $CI->load->model('QuestionAdmin/mdl_Question','qstn');
        $CI->load->model('QuestionAdmin/mdl_Answer','ans');
        $CI->load->model('QuestionAdmin/mdl_AnswerChange','ansc');
        $data = array ();//returned array of questions and answers
        $qstnArr = $CI->qstn->getAll();
        $data['qstn'] = $qstnArr;
        $ansData = array();//array of all answers
        foreach ($qstnArr as $q) {
            $ansArr = $CI->ans->getAllForQuestion($q['id_Question']);//all answers for question q
            $oneAnswerData = array();//all questions for question q
            foreach ($ansArr as $a) {
                $answer = array();//one answer with his cond and crit
                $answer['Txt'] = $a['Answer_Text'];
                $anscArr = $CI->ansc->getAllForAnswer($a['id_Answer']);//all answer changes
                foreach ($anscArr as $ac) {
                    $answer[] = $ac['AnswerChange_TextChange'].'  cnd/crt:'.$ac['par'];//answer changes and their cond or crit
                }
                $oneAnswerData[] = $answer;
            } 
            $ansData[] = $oneAnswerData;
        }
        $data['answers'] = $ansData;
        return $data;
    }
    
    public function getAnswers ($id) {
        $CI = &get_instance();
        $CI->db->where('wComp_id_ThisQuestion',$id);
        $query = $CI->db->get('Answer');
        return $query->result_array();
    }
    
    public function getAnswerChanges ($id) {
        
    }

}

?>
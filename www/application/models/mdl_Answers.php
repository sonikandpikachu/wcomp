<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author zymud
 * @copyright 2012
 */

class mdl_Answers extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    private function __loadModels(){
        $this->load->model('mdl_General','qmdl');
        $this->qmdl->table_name = 'Question';
        $this->qmdl->table_id_name = 'id_Question';
        
        $this->load->model('mdl_General','amdl');
        $this->qmdl->table_name = 'Answer';
        $this->qmdl->table_id_name = 'id_Answer';
        
        $this->load->model('mdl_General','acmdl');
        $this->qmdl->table_name = 'AnswerChange';
        $this->qmdl->table_id_name = 'id_AnswerChange';
        
        $this->load->model('mdl_General','crmdl');
        $this->qmdl->table_name = 'Criteria';
        $this->qmdl->table_id_name = 'id_Criteria';
        
        $this->load->model('mdl_General','conmdl');
        $this->qmdl->table_name = 'Condition';
        $this->qmdl->table_id_name = 'id_Condition';
    }
    
    function getNextQuestionText ($id_answer) {
        $row = $this->amdl->getRowById($id_answer);
        $id_question = $row['wComp_id_NextQuestion'];
        $qrow = $this->qmdl->getRowById($id_question);
        return $qrow['Question_Text'];
    }
    
    function getNextAnswersText ($id_question) {
        $this->db->where('wComp_id_ThisQuestion',$id_question);
        $query = $this->db->get('Answer');
        $result = $query->result_array();
        $data = array();
        $i = 0;
        foreach($result as $row) {
            $data[$i] = $row['Answer_Text'];
            $i++;
        }
        return $data;
    }
    
    
    
}

?>
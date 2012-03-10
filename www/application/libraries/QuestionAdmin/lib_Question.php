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

}

?>
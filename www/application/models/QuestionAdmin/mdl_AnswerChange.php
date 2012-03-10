<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author zymud
 * @copyright 2012
 */

class mdl_AnswerChange extends mdl_General {
    
    function __construct() {
        $this->tableId = 'id_AnswerChange';
        $this->tableName = 'AnswerChange';
    }
    
    /**
     * @return resultArray - all answer changes for id answer 
    */
    function getAllForAnswer($id) {
        $this->load->model('QuestionAdmin/mdl_Criteria','crt');
        $this->load->model('QuestionAdmin/mdl_Condition','cnd');
        
        $this->db->where('wComp_Answer_id_Answer',$id);
        $query = $this->db->get($this->tableName);
        $res = $query->result_array();
        for ($i = 0; $i < count($res); $i++) {
            $cnd = $this->cnd->getAllForAnswerChange($res[$i]['id_AnswerChange']);
            $crt = $this->crt->getAllForAnswerChange($res[$i]['id_AnswerChange']);
            if (!empty($crt)) {
                $res[$i]['par'] =  $crt['Criteria_Name'].'('.$crt['Criteria_DefaultValue'].')';
            }
            if (!empty($cnd)) {
                $res[$i]['par'] =  $cnd['Condition_Name'];
            }
            if (empty($cnd) && empty($crt)) {
                $res[$i]['par'] =  'Параметров нет, возможно ошибка!';
            }
        }
        return $res;
    }
    
} 

?>
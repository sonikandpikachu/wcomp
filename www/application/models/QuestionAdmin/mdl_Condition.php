<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author zymud
 * @copyright 2012
 */

class mdl_Condition extends mdl_General {
    
    function __construct() {
        $this->tableId = 'id_Condition';
        $this->tableName = 'Condition';
    }
    
    /**
     * @return resultRow - condition for id answer change 
    */
    function getAllForAnswerChange($id) {
        $this->db->where('wComp_AnswerChange_idSomeChange',$id);
        $query = $this->db->get($this->tableName);
        return $query->row_array();
    }
    
}

?>
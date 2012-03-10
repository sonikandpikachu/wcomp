<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author zymud
 * @copyright 2012
 */

class mdl_Criteria extends mdl_General {
    
    function __construct() {
        $this->tableId = 'id_Criteria';
        $this->tableName = 'Criteria';
    }
    
    /**
     * @return resultRow - criteria for id answer change 
    */
    function getAllForAnswerChange($id) {
        $this->db->where('wComp_Parametr_id_Parametr',$id);
        $query = $this->db->get($this->tableName);
        return $query->row_array();
    }
    
}

?>
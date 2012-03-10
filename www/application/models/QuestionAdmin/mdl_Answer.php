<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author zymud
 * @copyright 2012
 */

class mdl_Answer extends mdl_General {
    
    function __construct() {
        $this->tableId = 'id_Answer';
        $this->tableName = 'Answer';
    }
    
    /**
     * @return resultArray - all answers for id question 
    */
    function getAllForQuestion($id) {
        $this->db->where('wComp_id_ThisQuestion',$id);
        $query = $this->db->get($this->tableName);
        return $query->result_array();
    }
    
} 

?>
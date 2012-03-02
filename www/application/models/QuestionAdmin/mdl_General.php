<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author zymud
 * @copyright 2012
 */

class mdl_General extends CI_Model {
    
    var $tableName;
    var $tableId;
    
    function __construct(){
        parent::__construct();
    }
    
    function insert ($data) {
        $this->db->insert($this->tableName, $data); 
        return $this->db->insert_id();
    }
    
    function update($id, $data) {
        $this->db->where($this->tableId, $id);
        $this->db->update($this->tableName, $data); 
    }
    
    function delete ($id) {
        $this->db->where($this->tableId, $id);
        $this->db->delete($this->tableName); 
    }
    
    function get($id) {
        $this->db->where($this->tableId, $id);
        $query = $this->db->$get($this->tableName);
        return $query->row_array();
    }
    
    function getAll () {
        $query = $this->db->$get($this->tableName);
        return $query->result_array();
    }
}

?>
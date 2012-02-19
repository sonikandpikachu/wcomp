<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author zymud
 * @copyright 2012
 */

class mdl_General extends CI_Model {
    
    var $table_name = '';
    var $table_id_name = '';
    
    function __construct() {
        parent::__construct();
    }
    
    /**
     * ¬озвращает р€д из таблицы по заданому ид
     */
    public function getRowById($id) {
        $this->db->where($this->table_id_name,$id);
        $query = $this->db->get($this->table_name);
        $row = $query->row_array();
        return $row;
    }
    
    
    
}

?>
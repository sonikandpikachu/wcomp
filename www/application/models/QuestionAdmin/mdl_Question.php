<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author zymud
 * @copyright 2012
 */

class mdl_Question extends mdl_General {
    
    function __construct() {
        $this->tableId = 'id_Question';
        $this->tableName = 'Question';
    }
    
} 

?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author zymud
 * @copyright 2012
 */

class Develop extends CI_Controller {
    
    function __construct(){
        parent::__construct();
    }
    
    function index(){
        $this->load->view('Develop');
    }
    
    function test(){
        echo "hkk";
    }
    
}

?>
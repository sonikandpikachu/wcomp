<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author zymud
 * @copyright 2012
 */

class ShowQuestion extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->library('QuestionAdmin/lib_Question','','lib_Question');
        $this->load->library('QuestionAdmin/lib_Answer', '', 'lib_Answer');
    }
    
    function index () {
        $data = $this->lib_Question->getQuestionsAndAnswers();
        //print_r($data);
        $this->load->view('QuestionAdmin/ShowQuestion', $data);
    }
}

?>
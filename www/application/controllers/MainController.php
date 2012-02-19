<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author zymud
 * @copyright 2012
 */

  class MainController extends CI_Controller{
    
    public function index() {
        $this->load->model('mdl_General','gmdl',true);
        $this->gmdl->table_id_name = 'id_Question';
        $this->gmdl->table_name = 'Question';
        $row = $this->gmdl->getRowById(1);
        
        $data = array();
        $data['question'] = $row['Question_Text'];
        
        $answers = array();
        $answers[0] = 'ans1';
        $answers[1] = 'ans2';
        $data['answers'] = $answers;
        $this->load->view('Main',$data);
    }
    
    public function test() {
        $this->db->select();
    }
    
  }

?>
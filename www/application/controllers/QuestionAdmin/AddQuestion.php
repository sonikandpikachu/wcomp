<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author zymud
 * @copyright 2012
 */

class AddQuestion extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        header("Content-type: text/html; charset=windows-1251");
    }
    
    public function index(){
        $this->load->view('QuestionAdmin/AddQuestion');
    }
    
    public function add(){
        $qstnTxt = $_POST['qstnTxt'];
        $answers = array();
        
        print_r($_POST);
        echo'<br>';
        foreach ($_POST as $key => $value){
            $q1 = strpos($key,'ans');
            if ($q1 == 2){
                $str1 = str_replace('idans','',$key);
                $id = str_replace('Txt','',$str1);
                $ans = array();
                $ans['Txt'] = $value;
                echo 'anstxt = '.$value;
                $ans['Cond'] = $this->findCName($id.'Cond');
                $ans['TxtCond'] = $this->findCName($id.'TxtCond');
                $ans['Crit'] = $this->findCName($id.'Crit');
                $ans['TxtCrit'] = $this->findCName($id.'TxtCrit');
                echo('<br>Answer'.$id.':<br>');
                print_r($ans);
            } 
        
        }
    }
    
    private function findCName ($name) {
        $rez = array();
        foreach ($_POST as $key => $value){
            $find = $name;
            $q = strpos($key,$name);
            //echo 'id='.$name.'q='.$q.'<br>';
            if ($q > 0){
                $rez[] = $value;
            } 
        }
        return $rez;
    }
    
}

?>
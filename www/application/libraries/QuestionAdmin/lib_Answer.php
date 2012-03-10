<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author zymud
 * @copyright 2012
 */

class lib_Answer {
    
    function __construct() {
        $this->loadDatabase();
    }
    
    private function loadDatabase () {
        $CI = &get_instance();
        $CI->load->database();
    }
    
    /**
     * @param $ansArr: 'Answer_Type' - text of the answer
     *                 'Answer_Text' - type of the answer
     *                 'wComp_id_ThisQuetion' - this answer question id
     *        $chngArr: array of arrays, which have this fields:
     *                 'AnswerChange_TextChange' - text of changes
     *                 'wComp_Parametr_id_Parametr' - this answer change parametr id  
     * 
     * @return id of added answer
     */
    function addAnswerWithChanges ($ansArr, $chngArr) {
        $CI = &get_instance();
        $CI->load->model('QuestionAdmin/mdl_Answer','mdl_ans');//answer model
          $idAns = $CI->mdl_ans->insert($ansArr);
          foreach ($chngArr as $el) {
            $el['wComp_Answer_id_Answer'] = $idAns;
            $CI->mdl_ac->insert($el);
          }
    }
    /**
     * @param $qstnTxt - text of the questions
     *        $answers - array of arrays with fields:
     *          'type' - type of the question
     *          'Txt' - text of the answer
     *          'Cond' - array of condition parametr id
     *          'TxtCond' - array of answer change for conditions
     *          'Crit' - array of criterias parametr id
     *          'TxtCrit' - array of answer change for criterias
     */ 
    function addQuestionAndAnswers ($qstnTxt, $answers) {
        $CI = &get_instance();
        $CI->load->model('QuestionAdmin/mdl_General','mdl_gnrl');
        $CI->load->model('QuestionAdmin/mdl_Question','mdl_q');//question model
        $CI->load->model('QuestionAdmin/mdl_Answer','mdl_ans');//answer model
        $CI->load->model('QuestionAdmin/mdl_AnswerChange','mdl_ac');//answer change model
        //question
        $qstnArr = array();
        $qstnArr['Question_Text'] = $qstnTxt;
        $idQstn = $CI->mdl_q->insert($qstnArr);
        foreach ($answers as $ans) {
            //answer:
            $ansArr = array();
            $ansArr['Answer_Type'] = $ans['Answer_Type'];
            $ansArr['Answer_Text'] = $ans['Txt'];
            $ansArr['wComp_id_ThisQuestion'] = $idQstn;
            
            //answer change:
            $chngArr = array();
            //answer change conditions:
            $cond = $ans['Cond'];
            $condtxt = $ans['TxtCond'];
            $i = 0;
            foreach ($cond as $c){
                $chng = array();
                $chng['AnswerChange_TextChange'] = $condtxt[$i];
                $chng['wComp_Parametr_id_Parametr'] = $c;
                $i++;
                $chngArr[] = $chng;
            }
            //answer change criteria:
            $crit = $ans['Crit'];
            $crittxt = $ans['TxtCrit'];
            $i = 0;
            foreach ($crit as $c){
                $chng = array();
                $chng['AnswerChange_TextChange'] = $crittxt[$i];
                $chng['wComp_Parametr_id_Parametr'] = $c;
                $i++;
                $chngArr[] = $chng;
            }
            
            //adding answer with criterias and conditions:
            $this->addAnswerWithChanges ($ansArr, $chngArr);
        }
    }
    
    
    
    
    
}

?>